<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $laporan = Laporan::where('id_jurnal', $id)->get();

        return Response::json($laporan, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laporan = Laporan::create([
            'id_jurnal' => $request->id_jurnal,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'waktu' => Carbon::now()->format('H:i'),
            'tanggal' => date("Y-m-d")
        ]);

        return Response::json($laporan, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);

        return Response::json($laporan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'id_jurnal' => $laporan->id_jurnal,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'waktu' => Carbon::now()->format('H:i'),
            'tanggal' => $laporan->tanggal
        ]);

        return Response::json($laporan, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return Response::json($laporan, 204);
    }

    public function get_laporan_by_date($tanggal)
    {
        $laporan = Laporan::where('tanggal', $tanggal)->get();

        return Response::json($laporan, 200);
    }
}
