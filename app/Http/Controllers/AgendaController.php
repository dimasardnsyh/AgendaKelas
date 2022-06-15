<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataagenda = Agenda::with('guru', 'kelas')->get();
        $dataagenda = Agenda::latest()->paginate(5);
        return view ('agenda.index',compact('dataagenda'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurudata = Guru::all();
        $kelasdata = Kelas::all();
        return view('agenda.create',compact('gurudata','kelasdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Agenda::create($request->all()); 
            if($request->hasFile('dokumentasi')){ 
            $request->file('dokumentasi')->move('storage/dokumentasi-img/', $request->file('dokumentasi')->getClientOriginalName()); 
            $data->dokumentasi = $request->file('dokumentasi')->getClientOriginalName(); 
            $data->save(); 
      }

        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gurudata = Guru::all();
        $kelasdata = Kelas::all();
        $dataagenda = Agenda::with('guru','kelas')->find($id);
        return view('agenda.edit', compact('dataagenda','gurudata','kelasdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {

        
        $agenda->update($request->all());
        

        return redirect()->route('agenda.index')->with('success','Siswa Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success','Siswa Berhasil di Hapus');
    }
}