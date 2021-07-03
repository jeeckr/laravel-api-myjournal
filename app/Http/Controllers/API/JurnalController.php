<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Http\Resources\Jurnal as JurnalResource;
use App\Models\Laporan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnal = Jurnal::all();

        return Response::json($jurnal, 200);
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
        $jurnal = Jurnal::create([
            'judul' => $request->judul,
            'tanggal' => date("Y-m-d")
        ]);

        return Response::json($jurnal, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurnal =  Jurnal::findOrFail($id);
        $laporan = $jurnal->laporan;

        return Response::json($jurnal, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->update([
            'judul' => $request->judul,
            'tanggal' => $jurnal->tanggal
        ]);

        return Response::json($jurnal, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->delete();

        return Response::json($jurnal, 204);
    }

    public function generate_pdf($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $laporan = Laporan::where('id_jurnal', $jurnal->id)->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf_view', compact('jurnal', 'laporan'));
        $pdf->setPaper('a4', 'portrait');

        $fileName = $jurnal->judul;
        $pdf->stream($fileName . '.pdf');

        $content = $pdf->download();
        Storage::put('jurnal/' . $fileName . '.pdf', $content);

        // membuat url file
        $url_file = asset('storage/jurnal/' . $fileName . '.pdf');

        return Response::json($url_file, 200);
    }
}
