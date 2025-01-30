<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = User::with('subject'); // Load the 'subject' relationship

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('name', 'like', "%$search%")
              ->orWhere('nip', 'like', "%$search%")
              ->orWhere('position', 'like', "%$search%")
              ->orWhereHas('subject', function ($q) use ($search) {
                  $q->where('subject_name', 'like', "%$search%");
              });
    }

    $teachers = $query->get(); // Fetch the filtered results

    return view('data_guru.index', compact('teachers'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function statistik()
{
    $sex = User::selectRaw('sex, COUNT(*) as jumlah')
        ->groupBy('sex')
        ->get();

    $status = User::selectRaw('status, COUNT(*) as jumlah')
        ->groupBy('status')
        ->get();

    $position = User::selectRaw('position, COUNT(*) as jumlah')
        ->groupBy('position')
        ->get();

    return view('statistik_guru', compact('sex', 'status', 'position'));
}

}
