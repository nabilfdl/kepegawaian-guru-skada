<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\UserEditVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserEditVerificationController extends Controller
{
    public function index()
    {
        $pending_edit_data = UserEditVerification::where('acceptance_status', 'Dalam Proses')
            ->get();

        $acceptance_edit_data = UserEditVerification::whereIn('acceptance_status', ['Diverifikasi', 'Ditolak'])
            ->get();

        $subjects = Subject::all();
        return view('verifikasi_data.index', compact('subjects', 'pending_edit_data', 'acceptance_edit_data'));
    }

    public function show(UserEditVerification $verification)
    {
        // Example: Show just this pending data
        return view('verifikasi_data.show', [
            'user' => $verification // So Blade can use $user->name, etc.
        ]);
    }

    public function store_accepted(UserEditVerification $verification){
        // Example: Accept this pending data
        $verification->acceptance_status = 'Diverifikasi';
        $verification->save();

        // Find the user with the matching NIP.
        // This assumes that the 'nip' field is unique for each user.
        $user = User::where('nip', $verification->nip)->first();
        
        // If the user doesn't exist, you may want to handle that case:
        if (!$user) {
            abort(404, "User with NIP {$verification->nip} not found.");
        }
        
        $user->update([
            'nip' => $verification->nip,
            'name' => $verification->name,
            'religion' => $verification->religion,
            'phone' => $verification->phone,
            'email' => $verification->email,
            'birth_place' => $verification->birth_place,
            'birth_date' => $verification->birth_date,
            'role' => $verification->role,
            'sex' => $verification->sex,
            'marital_status' => $verification->marital_status,
            'address' => $verification->address,
            'subject_id' => $verification->subject_id,
            'status' => $verification->status,
            // Only update the password if a new one is provided
            'password' => $verification->password ? Hash::make($verification->password) : $user->password,
            'pfp' => $verification->pfp,
        ]);

        return redirect()->route('verifikasi_data');
    }

    public function store_denied(UserEditVerification $verification)
    {
        $verification->acceptance_status = 'Ditolak';
        $verification->save();

        return redirect()->route('verifikasi_data');
    }
}
