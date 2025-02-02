<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $subjects = Subject::all();
        return view('data_guru.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|numeric|digits_between:5,20|unique:users,nip',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users,phone',
            'religion' => 'required|in:Islam,Kristen,Hindu,Buddha,Katolik',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'role' => 'required|in:Admin,Operator,User',
            'sex' => 'required|in:Laki-Laki,Perempuan',
            'marital_status' => 'required|in:Belum Kawin,Kawin',
            'address' => 'required|string|max:500',
            'subject_id' => 'required',
            'status' => 'required|in:Aktif,Purna Tugas',
        ]);

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'religion' => $request->religion,
            'phone' => $request->phone,
            'email' => $request->email,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'role' => $request->role,
            'sex' => $request->sex,
            'marital_status' => $request->marital_status,
            'address' => $request->address,
            'subject_id' => $request->subject_id,
            'status' => $request->status,
            'password' => Hash::make($request->password), // Hash the password before storing
            'email_verified_at' => now(), // Automatically verify email
        ]);
    
        return redirect()->route('data_guru.index')->with('success', 'Data guru berhasil ditambahkan.');
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
