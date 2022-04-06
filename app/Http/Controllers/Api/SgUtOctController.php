<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seccion;
use App\Models\SgUtOct;
use App\Models\SgUtOctDetalle;
use App\Models\TipoServicio;
use App\Models\Ubigeo;
use App\Models\UnidadTerritorial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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

    public function store(): JsonResponse
    {

        try {
            DB::beginTransaction();

            $respuestas = request('respuestas');


            $ficha = SgUtOct::create([
                'fechaRegistro' => Carbon::now(),
                'ubigeo_id' => request('idUbigeo'),
                'personal_id' => request('idPersona')
            ]);

            foreach ($respuestas as $respuesta) {
                SgUtOctDetalle::create([
                    'SG_UT_OCT_id' => $ficha->id,
                    'pregunta_id' => $respuesta['idPregunta'],
                    'respuesta_id' => $respuesta['idRespuesta'],
                    'comentarioEvidencias' => 'comentario'
                ]);
            }

            DB::commit();

            return response()->json(["success" => true], 201);
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json($e->getMessage());
        }


    }



}
