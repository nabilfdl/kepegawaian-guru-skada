<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserEditVerification;
use Illuminate\Support\Facades\Auth;

class EditDataDiriController extends Controller
{
    public function index()
    {
        $pending_edit_data = UserEditVerification::where('nip', Auth::user()->nip)
            ->where('acceptance_status', 'Dalam Proses')
            ->get();

        $acceptance_edit_data = UserEditVerification::where('nip', Auth::user()->nip)
            ->whereIn('acceptance_status', ['Diverifikasi', 'Ditolak'])
            ->get();

        $subjects = Subject::all();
        return view('edit_data_diri.index', compact('subjects', 'pending_edit_data', 'acceptance_edit_data'));
    }

    public function store_edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'sex' => 'required|string',
            'religion' => 'required|string',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'marital_status' => 'required|string',
            'address' => 'required|string|max:255',
            'subject_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        if ($request->pfp) {
            $pfpPath = 'pfp_img/' . $request->pfp;    
        } else {
            $pfpPath = null;
        }

        UserEditVerification::create([
            'nip' => Auth::user()->nip,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'marital_status' => $request->marital_status,
            'address' => $request->address,
            'subject_id' => $request->subject_id,
            'status' => $request->status,
            'acceptance_status' => 'Dalam Proses',
            'created_at' => now(),
            'updated_at' => now(),
            'pfp' => $pfpPath,
        ]);

        return redirect()->route('edit_data_diri.index')->with('success', 'Data has been submitted for verification.');
    }

    public function show(UserEditVerification $verification)
    {
        // Example: Show just this pending data
        return view('edit_data_diri.show', [
            'user' => $verification // So Blade can use $user->name, etc.
        ]);
    }
}
