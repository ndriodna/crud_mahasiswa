<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();
        $jurusan = Jurusan::all();
        return view('dashboard',compact('dosen','mahasiswa','jurusan'));
    }
}
