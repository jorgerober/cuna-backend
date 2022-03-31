<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Seccion;
use App\Models\Sg_Ut_Oct;
use App\Models\TipoServicio;
use App\Models\Ubigeo;
use App\Models\UnidadTerritorial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SgUtOctController extends Controller
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
    public function getComiteGestiones(int $unidadTerritorial, string $tipo): JsonResponse
    {

        $comiteGestiones = Ubigeo::select('id','comiteGestion')
            ->where('unidad_territorial_id',$unidadTerritorial)
            ->where('tipo_servicio_id',$tipo)
            ->get();
        return response()->json([
            "comiteGestiones" => $comiteGestiones
        ]);
    }

  public function getSeccionesPreguntas(): JsonResponse
    {

        $seccionesPreguntas = Seccion::with('preguntas.tipo.respuestas')
            ->where('ficha_formato_id',1)
            ->get();
        return response()->json([
            "seccionesPreguntas" => $seccionesPreguntas
        ]);
    }

    public function listarTipoServicios(): JsonResponse
    {

        $tipoServicios = TipoServicio::select('id', 'descripcion')
            ->get();

        return response()->json([
            "tipoServicios" => $tipoServicios
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
