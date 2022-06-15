<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakelas = Kelas::latest()->paginate(5);
        return view ('kelass.index',compact('datakelas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kelas' => 'required',
            'nama_walas' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelass.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas $kelass
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelass)
    {
        return view('kelass.show', compact('kelass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelass)
    {
        return view('kelass.edit', compact('kelass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas $kelass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelass)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'nama_walas' => 'required',
        ]);

        $kelass->update($request->all());

        return redirect()->route('kelass.index')->with('success','Siswa Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas $kelass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelass)
    {
        $kelass->delete();

        return redirect()->route('kelass.index')->with('success','Siswa Berhasil di Hapus');
    }
}