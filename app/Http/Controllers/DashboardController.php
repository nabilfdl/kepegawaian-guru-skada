<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('m-d'); // Format MM-DD untuk pencocokan bulan & hari

        // Ambil user yang lahir di tanggal hari ini
        $birthdayUsers = User::whereRaw("DATE_FORMAT(birth_date, '%m-%d') = ?", [$today])
            ->with('subject')
            ->get();

        // Hitung total guru
        $totalTeachers = User::whereNotNull('position')->count();

        // Hitung guru aktif dan nonaktif
        $activeTeachers = User::where('status', 'Aktif')->count();
        $inactiveTeachers = User::where('status', 'Purna Tugas')->count();

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
