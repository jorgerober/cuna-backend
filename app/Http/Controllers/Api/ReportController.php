<?php

namespace App\Http\Controllers\Api;


use App\Models\SeguimientoSaf;
use App\Models\SeguimientoSafDetalle;
use App\Models\SeguimientoScd;
use App\Models\SeguimientoScdDetalle;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ReportController
{

    public function getReportListaSeguimientoSaf($id): JsonResponse
    {


        $details = SeguimientoSaf::select(
            'seguimiento_safs.id',
            'seguimiento_safs.fechaRegistro',
            'seguimiento_safs.fechaReactivacion',
            'seguimiento_safs.numeroUsuario',
            'seguimiento_safs.numeroFacilitadora',
            DB::raw('unidad_territoriales.descripcion as unidadTerritorial'),
            'ubigeos.codigoCg',
            'ubigeos.comiteGestion',
            'personales.DNI',
            'personales.nomApe'
        )
            ->join('ubigeos','seguimiento_safs.ubigeo_id','=','ubigeos.id')
            ->join('personales','personales.id','=','seguimiento_safs.personal_id')
            ->join('unidad_territoriales','unidad_territoriales.id','=','ubigeos.unidad_territorial_id')
            ->where('seguimiento_safs.personal_id',$id)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json(
            [
                'details'     => $details,
            ]
        );
    }

    public function getReportListaSeguimientoScd($id): JsonResponse
    {


        $details = SeguimientoScd::select(
            'seguimiento_scds.id',
            'seguimiento_scds.fechaRegistro',
            'seguimiento_scds.fechaReactivacion',
            'seguimiento_scds.numeroUsuario',
            'seguimiento_scds.numeroMadre',
            DB::raw('unidad_territoriales.descripcion as unidadTerritorial'),
            'ubigeos.codigoCg',
            'ubigeos.comiteGestion',
            'personales.DNI',
            'personales.nomApe'
        )
            ->join('ubigeos','seguimiento_scds.ubigeo_id','=','ubigeos.id')
            ->join('personales','personales.id','=','seguimiento_scds.personal_id')
            ->join('unidad_territoriales','unidad_territoriales.id','=','ubigeos.unidad_territorial_id')
            ->where('seguimiento_scds.personal_id',$id)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json(
            [
                'details'     => $details,
            ]
        );
    }

    public function getReportFichaSeguimientoSaf($id): JsonResponse
    {


        $ficha = SeguimientoSaf::select(
            'seguimiento_safs.id',
            'seguimiento_safs.fechaRegistro',
            'seguimiento_safs.fechaReactivacion',
            'seguimiento_safs.numeroUsuario',
            'seguimiento_safs.numeroFacilitadora',
            DB::raw('unidad_territoriales.descripcion as unidadTerritorial'),
            'ubigeos.codigoCg',
            'ubigeos.comiteGestion',
            'personales.DNI',
            'personales.nomApe'
        )
            ->join('ubigeos','seguimiento_safs.ubigeo_id','=','ubigeos.id')
            ->join('personales','personales.id','=','seguimiento_safs.personal_id')
            ->join('unidad_territoriales','unidad_territoriales.id','=','ubigeos.unidad_territorial_id')
            ->where('seguimiento_safs.id',$id)
            ->get();

        $details = SeguimientoSafDetalle::select(
            DB::raw('preguntas.numero as numero'),
            DB::raw('preguntas.descripcion as pregunta'),
            DB::raw('respuestas.descripcion as respuesta'),
        )

            ->join('preguntas', 'seguimiento_saf_detalles.pregunta_id', '=', 'preguntas.id')
            ->join('secciones', 'secciones.id', '=', 'preguntas.seccion_id')
            ->join('respuestas', 'respuestas.id', '=', 'seguimiento_saf_detalles.respuesta_id')
            ->where('seguimiento_saf_detalles.seguimiento_saf_id', $id)
            ->orderBy('preguntas.numero', 'ASC')
            ->get();

        return response()->json(
            [
                'details'     => $details,
                'ficha' => $ficha,

            ]
        );
    }


    public function getReportFichaSeguimientoScd($id): JsonResponse
    {


        $ficha = SeguimientoScd::select(
            'seguimiento_scds.id',
            'seguimiento_scds.fechaRegistro',
            'seguimiento_scds.fechaReactivacion',
            'seguimiento_scds.numeroUsuario',
            'seguimiento_scds.numeroMadre',
            DB::raw('unidad_territoriales.descripcion as unidadTerritorial'),
            'ubigeos.codigoCg',
            'ubigeos.comiteGestion',
            'personales.DNI',
            'personales.nomApe'
        )
            ->join('ubigeos','seguimiento_scds.ubigeo_id','=','ubigeos.id')
            ->join('personales','personales.id','=','seguimiento_scds.personal_id')
            ->join('unidad_territoriales','unidad_territoriales.id','=','ubigeos.unidad_territorial_id')
            ->where('seguimiento_scds.id',$id)
            ->get();

        $details = SeguimientoScdDetalle::select(
            DB::raw('preguntas.numero as numero'),
            DB::raw('preguntas.descripcion as pregunta'),
            DB::raw('respuestas.descripcion as respuesta'),
        )

            ->join('preguntas', 'seguimiento_scd_detalles.pregunta_id', '=', 'preguntas.id')
            ->join('secciones', 'secciones.id', '=', 'preguntas.seccion_id')
            ->join('respuestas', 'respuestas.id', '=', 'seguimiento_scd_detalles.respuesta_id')
            ->where('seguimiento_scd_detalles.seguimiento_scd_id', $id)
            ->orderBy('preguntas.numero', 'ASC')
            ->get();

        return response()->json(
            [
                'details'     => $details,
                'ficha' => $ficha,

            ]
        );
    }

}
