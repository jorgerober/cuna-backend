<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Seccion;
use App\Models\SeguimientoScd;
use App\Models\SeguimientoScdDetalle;
use App\Models\SgUtOct;
use App\Models\SgUtOctDetalle;
use App\Models\TipoServicio;
use App\Models\Ubigeo;
use App\Models\UnidadTerritorial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SeguimientoScdController extends Controller
{
    public function index(): JsonResponse
    {
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('itemsPerPage');
            $fichaSeguimientoSaf = SeguimientoScd::filtered();
            return response()->json(
                [
                    "success"               => true,
                    "data"                  => $fichaSeguimientoSaf->paginate($itemsPerPage != 'undefined' ? $itemsPerPage : 10),
                    'unidadTerritorials'    => UnidadTerritorial::select('id', 'descripcion')->get(),
                    'ubigeos'               => Ubigeo::select('id', 'comiteGestion')->get(),
                    'personales'            => Personal::select('id', 'DNI','nomApe','celular')->get()
                ]
            );
        }
        abort(401);
    }
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
            ->where('ficha_formato_id',8)
            ->get();
        return response()->json([
            "seccionesPreguntas" => $seccionesPreguntas
        ]);
    }

    public function listarTipoServicios(): JsonResponse
    {

        $tipoServicios = TipoServicio::select('id', 'descripcion')
            ->where('id',2)
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


            $ficha = SeguimientoScd::create([
                'fechaRegistro'     => Carbon::now(),
                'fechaReactivacion' => request('fechaReactivacion'),
                'servicio'          => request('servicio'),
                'numeroUsuario'     => request('numeroUsuario'),
                'numeroMadre'       => request('numeroMadre'),
                'local'             => request('local'),
                'aspecto'           => request('aspecto'),
                'accion'            => request('accion'),
                'accionImplementa'  => request('accionImplementa'),
                'refrigerioManana'  => request('refrigerioManana'),
                'motivo1'           => request('motivo1'),
                'refrigerioAlmuerzo'=> request('refrigerioAlmuerzo'),
                'motivo2'           => request('motivo2'),
                'refrigerioTarde'   => request('refrigerioTarde'),
                'motivo3'           => request('motivo3'),
                'ubigeo_id'         => request('idUbigeo'),
                'personal_id'       => request('idPersona')
            ]);

            foreach ($respuestas as $respuesta) {
                SeguimientoScdDetalle::create([
                    'seguimiento_scd_id' => $ficha->id,
                    'pregunta_id' => $respuesta['idPregunta'],
                    'respuesta_id' => $respuesta['idRespuesta'],
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
