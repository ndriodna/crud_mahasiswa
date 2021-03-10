<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index',compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }


    public function saveFile($nidn, $photos)
    {
        $setName = $nidn.'-'.time().'.'.$photos->getClientOriginalExtension();
        $path = $photos->storeAs('profile-dosen',$setName);
        return $path;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required|string|max:250',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'photos' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        try {
            if ($request->hasFile('photos')) {
                $photos = $this->saveFile($request->nidn,$request->file('photos'));
            }
        Dosen::create($this->dosenStore($photos));
        return redirect(route('dosen.index'));
        } catch (Exception $e) {
            return redirect(back()->with(['error',$getMessage]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show',compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit',compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required|string|max:250',
            'jenis_kelamin' => 'in:L,P',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'photos' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
         try {
            $dosen = Dosen::findOrFail($id);
            $photo =  $dosen->photos;
            if ($request->hasFile('photos')) {
                Storage::delete($photo);
                $photos = $this->saveFile($request->nidn,$request->file('photos'));
            }
        $dosen->update($this->dosenStore($photos));
        return redirect(route('dosen.index'));
        } catch (Exception $e) {
            return redirect(back()->with(['error',$getMessage]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        Storage::delete($dosen->photos);
        $dosen->delete();
        return redirect()->route('dosen.index');
    }

    public function dosenStore($photos)
    {
        return [
            'nidn' => request('nidn'),
            'nama' => request('nama'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'tempat_lahir' => request('tempat_lahir'),
            'tgl_lahir' => request('tgl_lahir'),
            'photos' => $photos,
        ];
    }
}
