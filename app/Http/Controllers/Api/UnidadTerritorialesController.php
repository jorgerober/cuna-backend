<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\UnidadTerritorial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UnidadTerritorialesController extends Controller
{
    public function index(): JsonResponse
    {
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('itemsPerPage');
            $unidadTerritoriales = UnidadTerritorial::select();
            return response()->json(
                [
                    "success"               => true,
                    "data"   => $unidadTerritoriales->paginate($itemsPerPage != 'undefined' ? $itemsPerPage : 10),

                ]
            );
        }
        abort(401);
    }

    public function store(): JsonResponse
    {
       try{
            DB::beginTransaction();

                UnidadTerritorial::create([

                    'descripcion'         => request('descripcion'),
                    'fechaAsignacion'     => Carbon::now(),
                    'fechaInicio'         => Carbon::now()->toDateString()

                ]);

            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json($e->getMessage());
        }

        return response()->json(["message" => "Unidad Territorial Asignada"],201);
    }


    public function update(int $id): JsonResponse
    {
        $unidadTerritrial = UnidadTerritorial::findOrFail($id);


        if (!$unidadTerritrial) {
            return response()->json(["message" => "no encontrado"], 404);
        }

        try{
            DB::beginTransaction();

            $unidadTerritrial->fill([
                'descripcion'      => request('descripcion'),

            ])->save();
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json($e);
        }

        return response()->json(["message" => "Operación exitosa"],201);
    }
    public function destroy(int $id): JsonResponse
    {
        $unidadTerritorial = UnidadTerritorial::findOrFail($id);
        if (!$unidadTerritorial) {
            return response()->json(["message" => "Persona no encontrada"], 404);
        }
        $unidadTerritorial->delete();
        return response()->json(["message" => "Unidad Territorial eliminada"]);
    }

}
