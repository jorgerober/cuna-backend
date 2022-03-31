<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Entity;
use App\Models\Personal;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
{
    private function getPersonId()
    {
        return auth()->user()->personal->id;
    }

    public function index(): JsonResponse
    {
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('itemsPerPage');
            $persons = Personal::filtered();
            return response()->json(
                [
                    "success" => true,
                    "data"    => $persons->paginate($itemsPerPage != 'undefined' ? $itemsPerPage : 10),
                ]
            );
        }
        abort(401);
    }

    private function validation($request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request, [
            'nomApe' => 'required',
            'dni'       => 'required|max:8|unique:persons,dni, '.$request['person_id'].',id'
        ],
        [
            'nomApe.required'    => 'El nombre es obligatorio',
            'dni.required'       => 'El dni es obligatorio',
            'dni.numeric'        => 'El dni debe de contener caracteres numéricos',
            'dni.max'            => 'El dni debe de contener 8 dígitos exactamente',
            'dni.unique'         => 'El dni ya existe',
        ]
        );
    }

    public function store(): JsonResponse
    {
        $this->validation(request()->input());

        if ($this->validation(request()->input())->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $this->validation(request()->input())->getMessageBag()->toArray()
            ), 422);
        }

        $person = Person::create([
            'nomApe'      => request('firstName'),
            'dni'            => request('dni'),
            'celular'          => request('phone'),
            'correo'          => request('email'),
            'condition'      => '1',
         ]);


        return response()->json(compact('person'),201);
    }

    public function update(int $id): JsonResponse
    {
        $person = Person::findOrFail($id);

        if (!$person) {
            return response()->json(["message" => "Area no encontrada"], 404);
        }
        $this->validation(request()->input());

        if ($this->validation(request()->input())->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $this->validation(request()->input())->getMessageBag()->toArray()
            ), 422);
        }

        $person->fill([
            'firstName'      => request('firstName'),
            'lastName'       => request('lastName'),
            'dni'            => request('dni'),
            'ruc'            => request('ruc'),
            'phone'          => request('phone'),
            'email'          => request('email'),
            'created_by'     => $this->getPersonId(),
            'condition'      => '1',
            'person_type_id' => request('person_type_id')
        ])->save();

        return response()->json(compact('person'),201);
    }

    public function destroy(int $id): JsonResponse
    {
        $personal = Personal::findOrFail($id);
        if (!$personal) {
            return response()->json(["message" => "Persona no encontrada"], 404);
        }
        $personal->delete();
        return response()->json(["message" => "Persona eliminada"]);
    }
}
