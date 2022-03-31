<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Seccion;
use App\Models\Sg_Ut_Oct;
use App\Models\UnidadTerritorial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SgSafController extends Controller
{

    public function getUnidadTerritoriales(): JsonResponse
    {

        $unidadTerritoriales = UnidadTerritorial::select('id','descripcion')
            ->groupBy('id','descripcion')
            ->orderBy('descripcion', 'ASC')
            ->get();
        return response()->json([
            "unidadTerritoriales" => $unidadTerritoriales
        ]);
    }

    public function getSeccionesPreguntas(): JsonResponse
    {

        $seccionesPreguntas = Seccion::with('preguntas.tipo.respuestas')->where('ficha_formato_id',2)->get();
        return response()->json([
            "seccionesPreguntas" => $seccionesPreguntas
        ]);
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sg_Ut_Oct  $sg_Ut_Oct
     * @return \Illuminate\Http\Response
     */
    public function show(Sg_Ut_Oct $sg_Ut_Oct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sg_Ut_Oct  $sg_Ut_Oct
     * @return \Illuminate\Http\Response
     */
    public function edit(Sg_Ut_Oct $sg_Ut_Oct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sg_Ut_Oct  $sg_Ut_Oct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sg_Ut_Oct $sg_Ut_Oct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sg_Ut_Oct  $sg_Ut_Oct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sg_Ut_Oct $sg_Ut_Oct)
    {
        //
    }
}
