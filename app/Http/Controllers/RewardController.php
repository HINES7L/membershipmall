<?php

use App\Models\Reward;
use Illuminate\Http\Request;

public function index()
{
    abort_unless(auth()->id() === 1, 403); // hanya user id 1
    $rewards = Reward::all();
    return view('admin.rewards.index', compact('rewards'));
}

public function create()
{
    abort_unless(auth()->id() === 1, 403);
    return view('admin.rewards.create');
}

public function store(Request $request)
{
    abort_unless(auth()->id() === 1, 403);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'point_cost' => 'required|integer|min:1',
    ]);

    Reward::create($request->all());

    return redirect()->route('rewards.index')->with('success', 'Reward berhasil ditambahkan.');
}

public function edit(Reward $reward)
{
    abort_unless(auth()->id() === 1, 403);
    return view('admin.rewards.edit', compact('reward'));
}

public function update(Request $request, Reward $reward)
{
    abort_unless(auth()->id() === 1, 403);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'point_cost' => 'required|integer|min:1',
    ]);

    $reward->update($request->all());

    return redirect()->route('rewards.index')->with('success', 'Reward berhasil diperbarui.');
}

public function destroy(Reward $reward)
{
    abort_unless(auth()->id() === 1, 403);
    $reward->delete();

    return redirect()->route('rewards.index')->with('success', 'Reward berhasil dihapus.');
}
