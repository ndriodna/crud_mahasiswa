<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
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
        $mahasiswa = Mahasiswa::all();
        $jurusan = Jurusan::all();
        return view('dashboard',compact('mahasiswa','jurusan'));
    }
}
