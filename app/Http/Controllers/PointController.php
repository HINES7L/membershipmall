<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointExchange;
use App\Models\User;
use App\Models\RedeemDetail;

class PointController extends Controller
{
    public function index()
    {
        $rewards = [
            ['icon' => '🚗', 'label' => 'Digital Coupon', 'tag' => '', 'color' => 'bg-pink-600'],
            ['icon' => '☕', 'label' => 'Merchandise', 'tag' => '', 'color' => 'bg-yellow-500'],
            ['icon' => '🎫', 'label' => 'Exclusive Voucher', 'tag' => '', 'color' => 'bg-green-500'],
        ];

        $totalPoints = auth()->user()->points ?? 0;
        $users = User::all();

        return view('points.index', compact('rewards', 'totalPoints', 'users'));
    }

    public function exchange(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reward' => 'required|string',
            'amount' => 'required|integer|min:100000',
        ]);

        $points = floor($request->amount / 100000);

        PointExchange::create([
            'user_id' => $request->user_id,
            'reward' => $request->reward,
            'amount' => $request->amount,
            'points' => $points,
        ]);

        $user = User::findOrFail($request->user_id);
        $user->points = ($user->points ?? 0) + $points;
        $user->save();

        return redirect()->route('points.history')->with(
            'success',
            "You earned {$points} point(s) for Rp" . number_format($request->amount, 0, ',', '.')
        );
    }

    public function history()
    {
        $histories = PointExchange::where('user_id', auth()->id())->latest()->get();
        return view('points.history', compact('histories'));
    }

    public function redeemView()
{
    $user = auth()->user();

    $rewards = [
        ['key' => 'digital-coupon', 'icon' => '🚗', 'label' => 'Digital Coupon', 'point_cost' => 1],
        ['key' => 'merchandise', 'icon' => '☕', 'label' => 'Merchandise', 'point_cost' => 5],
        ['key' => 'exclusive-voucher', 'icon' => '🎫', 'label' => 'Exclusive Voucher', 'point_cost' => 10],
    ];

    $points = $user->points ?? 0;

    if ($user->id == 1) {
        $exchanges = PointExchange::with('user')->latest()->get();
        $redeemDetails = RedeemDetail::with('user')->latest()->get(); // tambah ini
    } else {
        $exchanges = PointExchange::where('user_id', $user->id)->latest()->get();
        $redeemDetails = RedeemDetail::where('user_id', $user->id)->latest()->get(); // tambah ini
    }

    return view('points.admin-redeem', compact('exchanges', 'rewards', 'points', 'redeemDetails'));
}

    public function processRedeem(Request $request)
    {
        $request->validate([
            'reward' => 'required|string',
            'point_cost' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|max:50',
        ]);

        $user = auth()->user();

        if (($user->points ?? 0) < $request->point_cost) {
            return back()->with('error', 'Poin tidak mencukupi.');
        }

        PointExchange::create([
            'user_id' => $user->id,
            'reward' => $request->reward,
            'amount' => 0,
            'points' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
        ]);

        $user->points -= $request->point_cost;
        $user->save();

        return back()->with('success', 'Berhasil menukarkan poin!');
    }

    public function destroy($id)
    {
        $exchange = PointExchange::findOrFail($id);
        $exchange->delete();

        return redirect()->route('points.redeem-view')->with('success', 'Data berhasil dihapus.');
    }

    public function redeemDigitalCoupon()
    {
        return view('points.redeem.digital');
    }

    public function redeemMerchandise()
    {
        return view('points.redeem.merchandise');
    }

    public function redeemExclusive()
    {
        return view('points.redeem.exclusive');
    }

    public function redeemDigitalCouponForm()
    {
        return view('points.redeem.digital-form');
    }

    public function processRedeemWithDetails(Request $request)
    {
        $request->validate([
            'reward' => 'required|string',
            'point_cost' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|max:50',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        if (($user->points ?? 0) < $request->point_cost) {
            return back()->with('error', 'Poin tidak mencukupi.');
        }

        $pointExchange = PointExchange::create([
            'user_id' => $user->id,
            'reward' => $request->reward,
            'amount' => 0,
            'points' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        RedeemDetail::create([
            'point_exchange_id' => $pointExchange->id,
            'user_id' => $user->id,
            'reward' => $request->reward,
            'point_cost' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->points -= $request->point_cost;
        $user->save();

        return redirect()->route('points.redeem-view')->with('success', 'Berhasil menukarkan poin dan data pengiriman telah disimpan!');
    }

    public function redeemMerchandiseForm()
    {
        return view('points.redeem.merchandise-form');
    }

    public function processRedeemWithDetailsMerchandise(Request $request)
    {
        $request->validate([
            'reward' => 'required|string',
            'point_cost' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|max:50',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        if (($user->points ?? 0) < $request->point_cost) {
            return back()->with('error', 'Poin tidak mencukupi.');
        }

        $pointExchange = PointExchange::create([
            'user_id' => $user->id,
            'reward' => $request->reward,
            'amount' => 0,
            'points' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        RedeemDetail::create([
            'point_exchange_id' => $pointExchange->id,
            'user_id' => $user->id,
            'reward' => $request->reward,
            'point_cost' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->points -= $request->point_cost;
        $user->save();

        return redirect()->route('points.redeem-view')->with('success', 'Berhasil menukarkan poin dan data pengiriman telah disimpan!');
    }

    public function redeemExclusiveForm()
    {
        return view('points.redeem.exclusive-form');
    }

    public function processRedeemWithDetailsExclusive(Request $request)
    {
        $request->validate([
            'reward' => 'required|string',
            'point_cost' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|max:50',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        if (($user->points ?? 0) < $request->point_cost) {
            return back()->with('error', 'Poin tidak mencukupi.');
        }

        $pointExchange = PointExchange::create([
            'user_id' => $user->id,
            'reward' => $request->reward,
            'amount' => 0,
            'points' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        RedeemDetail::create([
            'point_exchange_id' => $pointExchange->id,
            'user_id' => $user->id,
            'reward' => $request->reward,
            'point_cost' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->points -= $request->point_cost;
        $user->save();

        return redirect()->route('points.redeem-view')->with('success', 'Berhasil menukarkan poin dan data pengiriman telah disimpan!');
    }

    public function redeemGiftcardForm()
    {
        return view('points.redeem.giftcard-form');
    }

    public function processRedeemWithDetailsGiftcard(Request $request)
    {
        $request->validate([
            'reward' => 'required|string',
            'point_cost' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string|max:50',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        if (($user->points ?? 0) < $request->point_cost) {
            return back()->with('error', 'Poin tidak mencukupi.');
        }

        $pointExchange = PointExchange::create([
            'user_id' => $user->id,
            'reward' => $request->reward,
            'amount' => 0,
            'points' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        RedeemDetail::create([
            'point_exchange_id' => $pointExchange->id,
            'user_id' => $user->id,
            'reward' => $request->reward,
            'point_cost' => $request->point_cost,
            'coupon_code' => $request->coupon_code,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->points -= $request->point_cost;
        $user->save();

        return redirect()->route('points.redeem-view')->with('success', 'Berhasil menukarkan poin dan data pengiriman telah disimpan!');
    }
    
}
