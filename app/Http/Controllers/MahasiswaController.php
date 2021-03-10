<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use DataTables;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Str;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::orderBy('created_at','desc')->get();
        return view('mahasiswa.index',compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveFile($nim,$photos)
    {
        $setName = $nim.'-'.time().'.'.$photos->getClientOriginalExtension();
       $path = $photos->storeAs('profile-mahasiswa',$setName);
        return $path;
    }
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string',
            'jurusan_id' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'thn_masuk' => 'required|integer',
            'photos' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        try {
            if ($request->hasfile('photos')) {
                $photo = $this->saveFile($request->nim,$request->file('photos'));
            }
        Mahasiswa::create($this->MahasiswaStore($photo));
        return redirect()->route('mahasiswa.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show',compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswas = Mahasiswa::find($id);
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit',compact('mahasiswas','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|exists:mahasiswas,nim',
            'nama' => 'required|string',
            'jurusan_id' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'thn_masuk' => 'required|integer',
            'photos' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        try {

       $mahasiswa = Mahasiswa::findOrFail($id);
       $photos = $mahasiswa->photos;
       if ($request->hasfile('photos')) {
           Storage::delete($photos);
        $photo = $this->saveFile($request->nim,$request->file('photos'));
       }
       $mahasiswa->update($this->MahasiswaStore($photo));
        return redirect()->route('mahasiswa.index');
        } catch (Exception $e) {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        Storage::delete($mahasiswa->photos);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }

    public function MahasiswaStore($photo)
    {
        return[
            'nim' => request('nim'),
            'nama' => request('nama'),
            'jurusan_id' => request('jurusan_id'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'tempat_lahir' => request('tempat_lahir'),
            'tgl_lahir' => request('tgl_lahir'),
            'thn_masuk' => request('thn_masuk'),
            'photos' => $photo
        ];
    }
}
