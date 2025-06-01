<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang memerlukan login
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource user
    Route::resource('users', UserController::class);

    // Points
    Route::get('/points', [PointController::class, 'index'])->name('points.index');
    Route::post('/points/exchange', [PointController::class, 'exchange'])->name('points.exchange');
    Route::get('/points/history', [PointController::class, 'history'])->name('points.history');

    // Redeem
    Route::get('/points/redeem', [PointController::class, 'redeemView'])->name('points.redeem-view');
    Route::post('/points/redeem/process', [PointController::class, 'processRedeem'])->name('points.processRedeem');
    Route::delete('/points/redeem/{id}', [PointController::class, 'destroy'])->name('points.redeem.destroy');

    // Redeem jenis hadiah
    Route::get('/points/redeem/digital-coupon', [PointController::class, 'redeemDigitalCoupon'])->name('points.redeem.digital');
    Route::get('/points/redeem/merchandise', [PointController::class, 'redeemMerchandise'])->name('points.redeem.merchandise');
    Route::get('/points/redeem/exclusive', [PointController::class, 'redeemExclusive'])->name('points.redeem.exclusive');
    // Halaman form input data untuk redeem digital coupon dengan kode kupon
    Route::get('/points/redeem/digital-coupon/form', [PointController::class, 'redeemDigitalCouponForm'])->name('points.redeem.digital-coupon.form');
    // Proses redeem dengan data pengiriman (nama, alamat, no hp)
    Route::post('/points/redeem/digital-coupon/confirm', [PointController::class, 'processRedeemWithDetails'])->name('points.redeem.digital-coupon.confirm');
    Route::get('/points/redeem/merchandise/form', [PointController::class, 'redeemMerchandiseForm'])->name('points.redeem.merchandise.form');
    // Route proses redeem merchandise dengan data
    Route::post('/points/redeem/merchandise/confirm', [PointController::class, 'processRedeemWithDetailsMerchandise'])->name('points.redeem.merchandise.confirm');
    Route::get('/points/redeem/exclusive/form', [PointController::class, 'redeemExclusiveForm'])->name('points.redeem.exclusive.form');
    // Route proses redeem exclusive dengan data
    Route::post('/points/redeem/exclusive/confirm', [PointController::class, 'processRedeemWithDetailsExclusive'])->name('points.redeem.exclusive.confirm');
    Route::get('/points/redeem/giftcard/form', [PointController::class, 'redeemGiftcardForm'])->name('points.redeem.giftcard.form');

    // Proses redeem giftcard dengan data
    Route::post('/points/redeem/giftcard/confirm', [PointController::class, 'processRedeemWithDetailsGiftcard'])->name('points.redeem.giftcard.confirm');

    // Rewards management
    Route::get('/rewards', [RewardController::class, 'index'])->name('rewards.index');
    Route::get('/rewards/create', [RewardController::class, 'create'])->name('rewards.create');
    Route::post('/rewards', [RewardController::class, 'store'])->name('rewards.store');
    Route::get('/rewards/{reward}/edit', [RewardController::class, 'edit'])->name('rewards.edit');
    Route::put('/rewards/{reward}', [RewardController::class, 'update'])->name('rewards.update');
    Route::delete('/rewards/{reward}', [RewardController::class, 'destroy'])->name('rewards.destroy');
});

require __DIR__.'/auth.php';
