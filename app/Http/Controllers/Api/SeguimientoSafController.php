<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Seccion;
use App\Models\SeguimientoSaf;
use App\Models\SeguimientoSafDetalle;
use App\Models\SgUtOct;
use App\Models\SgUtOctDetalle;
use App\Models\TipoServicio;
use App\Models\Ubigeo;
use App\Models\UnidadTerritorial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SeguimientoSafController extends Controller
{
    public function index(): JsonResponse
    {
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('itemsPerPage');
            $fichaSeguimientoSaf = SeguimientoSaf::filtered();
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

        $comiteGestiones = Ubigeo::select('id',
            DB::raw("CONCAT(codigoCg, ' - ', comiteGestion) as comiteGestion"))
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
            ->where('ficha_formato_id',7)
            ->get();
        return response()->json([
            "seccionesPreguntas" => $seccionesPreguntas
        ]);
    }

    public function listarTipoServicios(): JsonResponse
    {

        $tipoServicios = TipoServicio::select('id', 'descripcion')
            ->where('id',1)
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


            $ficha = SeguimientoSaf::create([
                'fechaRegistro'     => Carbon::now(),
                'fechaReactivacion' => request('fechaReactivacion'),
                'servicio'          => request('servicio'),
                'numeroUsuario'     => request('numeroUsuario'),
                'numeroFacilitadora'=> request('numeroFacilitadora'),
                'aspecto'           => request('aspecto'),
                'accion'            => request('accion'),
                'accionImplementa'  => request('accionImplementa'),
                'ubigeo_id'         => request('idUbigeo'),
                'personal_id'       => request('idPersona')
            ]);

            foreach ($respuestas as $respuesta) {
                SeguimientoSafDetalle::create([
                    'seguimiento_saf_id' => $ficha->id,
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
