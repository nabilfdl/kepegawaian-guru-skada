<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->toDateString();

        // Data Guru yang Berulang Tahun Hari Ini
        $birthdayUsers = User::whereDate('birth_date', $today)
            ->with('subject')
            ->get();

        // Hitung total guru
        $totalTeachers = User::whereNotNull('position')->count();

        // Hitung guru aktif dan nonaktif
        $activeTeachers = User::where('status', 'Aktif')->count();
        $inactiveTeachers = User::where('status', 'Nonaktif')->count();

        // Hitung jumlah berdasarkan golongan (position)
        $groupByPosition = User::select('position', DB::raw('count(*) as total'))
            ->whereNotNull('position')
            ->groupBy('position')
            ->pluck('total', 'position')
            ->toArray();

        // Hitung jumlah berdasarkan jenis kelamin (sex)
        $genderStats = User::select('sex', DB::raw('count(*) as total'))
            ->whereNotNull('sex')
            ->groupBy('sex')
            ->pluck('total', 'sex')
            ->toArray();

        return view('dashboard', compact(
            'birthdayUsers',
            'totalTeachers',
            'activeTeachers',
            'inactiveTeachers',
            'groupByPosition',
            'genderStats'
        ));
    }
}
