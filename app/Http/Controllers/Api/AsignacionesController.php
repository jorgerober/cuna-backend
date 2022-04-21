<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AsignacionCargo;
use App\Models\Cargo;
use App\Models\Estado;
use App\Models\Personal;
use App\Models\Rol;
use App\Models\TipoServicio;
use App\Models\UnidadTerritorial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AsignacionesController extends Controller
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

    public function getRoles(): JsonResponse
    {

        $roles = Rol::select('id', 'descripcion')
            ->get();
        return response()->json([
            "roles" => $roles
        ]);
    }

    public function getCargos(): JsonResponse
    {

        $cargos = Cargo::select('id', 'descripcion')
            ->get();

        return response()->json([
            "cargos" => $cargos
        ]);
    }
    public function getEstados(): JsonResponse
    {

        $estados = Estado::select('id', 'descripcion')
            ->get();

        return response()->json([
            "estados" => $estados
        ]);
    }
    public function getServicios(): JsonResponse
    {

        $tipoServicios = TipoServicio::select('id', 'descripcion')
            ->get();

        return response()->json([
            "tipoServicios" => $tipoServicios
        ]);
    }


    public function index(): JsonResponse
    {
        if (request()->wantsJson()) {
            $itemsPerPage = (int) request('itemsPerPage');
            $asignaciones = AsignacionCargo::filtered();
            return response()->json(
                [
                    "success"            => true,
                    "data"               => $asignaciones->paginate($itemsPerPage != 'undefined' ? $itemsPerPage : 10),
                    'unidadTerritoriales' => UnidadTerritorial::select('id', 'descripcion')->get(),
                    'roles'              => Rol::select('id', 'descripcion')->get(),
                    'estados'            => Estado::select('id', 'descripcion')->get(),
                    'cargos'             => Cargo::select('id', 'descripcion')->get(),
                    'personales'         => Personal::select('id', 'DNI','nomApe','celular')->get()
                ]
            );
        }
        abort(401);
    }

    private function getPersonId()
    {
        return auth()->user()->personal->id;
    }

    public function filterAssignments( int $id): JsonResponse
    {
        $filters = AsignacionCargo::select('id', 'role_id', 'ubigeo_id', 'person_id', 'assignment_state_id')
            ->with(['role', 'state', 'person', 'area.entity'])
            ->whereHas('area', function($query) use ($id) {
                $query->where('entity_id', $id);
            })
            ->where('condition', '1')
            ->paginate(10);
        return response()->json([
            "data" => $filters
        ]);
    }



    public function filterPersons(): JsonResponse
    {
        $search = request('search') ?? null;
        $filters = Person::select('id', 'dni', 'email', 'firstName', 'lastName', 'direction', 'phone')
            ->where('dni', $search)
            ->get();
        return response()->json([
            "data" => $filters
        ]);
    }

    public function filterPersonLegal(): JsonResponse
    {
        $search = request('search') ?? null;
        $filters = Person::select('id', 'dni', 'firstName', 'lastName', 'ruc', 'businessName', 'phone', 'direction', 'email')
            ->where('ruc', $search)
            ->get();
        return response()->json([
            "data" => $filters
        ]);
    }

    public function listAreas($id): JsonResponse
    {
        if ($id == 0) {
            return response()->json([
                'areas' => Area::select('id', 'name')->get(),
            ]);
        }else {
            return response()->json([
                'areas' => Area::select('id', 'name')->where('entity_id', $id)->get(),
            ]);
        }
    }



    private function validation($request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request, [
            'firstName'           => 'required',
            'lastName'            => 'required',
            'dni'                 => ['required', 'max:8'],
            'entity_id'           => 'required|integer|not_in:0',
            'area_id'             => 'required|integer|not_in:0',
            'role_id'             => 'required|integer|not_in:0',
            'assignment_state_id' => 'required|integer|not_in:0',
        ],
        [
            'firstName.required' => 'El nombre es obligatorio',
            'lastName.required'  => 'Debe de elegir un tipo de area',
            'dni.required'       => 'El dni es obligatorio',
            'dni.numeric'        => 'El dni debe de contener caracteres numéricos',
            'dni.max'            => 'El dni debe de contener 8 dígitos exactamente',
            'entity_id.not_in'   => 'Debe de elegir un tipo de entidad',
            'area_id.not_in'     => 'Debe de elegir una area',
            'role_id.not_in'     => 'Debe de elegir un rol'
        ]
        );
    }

    private function validationRule($request, $person): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request, [
            'firstName'           => 'required',
            'lastName'            => 'required',
            'dni'                 => ['required', 'max:8', Rule::unique('persons')->ignore($person)],
            'entity_id'           => 'required|integer|not_in:0',
            'area_id'             => 'required|integer|not_in:0',
            'role_id'             => 'required|integer|not_in:0',
            'assignment_state_id' => 'required|integer|not_in:0',
        ],
        [
            'firstName.required'         => 'El nombre es obligatorio',
            'lastName.required'          => 'Debe de elegir un tipo de area',
            'dni.required'               => 'El dni es obligatorio',
            'dni.numeric'                => 'El dni debe de contener caracteres numéricos',
            'dni.max'                    => 'El dni debe de contener 8 dígitos exactamente',
            'dni.unique'                 => 'El dni ya existe',
            'entity_id.not_in'           => 'Debe de elegir un tipo de entidad',
            'area_id.not_in'             => 'Debe de elegir una area',
            'role_id.not_in'             => 'Debe de elegir un rol',
            'assignment_state_id.not_in' => 'Debe de elegir un rol'
        ]
        );
    }

    public function store(): JsonResponse
    {
        /*if (request()->filled('id')) {
            $personal = Personal::findOrFail(request('id'));

            $this->validationRule(request()->input(), $personal);

            if ($this->validationRule(request()->input(), $personal)->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $this->validationRule(request()->input(), $personal)->getMessageBag()->toArray()
                ), 422);
            }
        } else {
            $this->validation(request()->input());

            if ($this->validation(request()->input())->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $this->validation(request()->input())->getMessageBag()->toArray()
                ), 422);
            }
        }*/

        try{
            DB::beginTransaction();

            if (request()->filled('id')) {
                AsignacionCargo::create([
                    'rol_id'                => request('rol_id'),
                    'cargo_id'              => request('cargo_id'),
                    'personal_id'           => request('id'),
                    'unidad_territorial_id' => request('unidad_territorial_id'),
                    'estado_id'             => request('estado_id'),
                    'tipoContrato'          => 'CAS',
                    'fechaAsignacion'       => Carbon::now(),
                    'fechaInicio'           => Carbon::now()->toDateString()


                ]);
            }else {
                $personal = Personal::create([
                    'nomApe'      => request('nomApe'),
                    'DNI'         => request('dni'),
                    'celular'     => request('celular'),
                    'correo'      => request('correo'),
                    'genero'      => 'M',

                ]);

                User::create([
                    'name'       => request('dni'),
                    'password'   => Hash::make(request('password')),
                    'created_by' => $this->getPersonId(),
                    'condition'  => '1',
                    'personal_id'  => $personal->id
                ]);

                AsignacionCargo::create([
                    'rol_id'                => request('rol_id'),
                    'cargo_id'              => request('cargo_id'),
                    'personal_id'           => $personal->id,
                    'unidad_territorial_id' => request('unidad_territorial_id'),
                    'estado_id'             => request('estado_id'),
                    'tipoContrato'          => 'CAS',
                    'fechaAsignacion'       => Carbon::now(),
                    'fechaInicio'         => Carbon::now()->toDateString()
                ]);
            }

            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json($e->getMessage());
        }

        return response()->json(["message" => "Persona asignada"],201);
    }

    public function update(int $id): JsonResponse
    {
        $asignacion = AsignacionCargo::findOrFail($id);

        $personal = Personal::findOrFail($asignacion->personal_id);

        if (!$asignacion) {
            return response()->json(["message" => "Personal no encontrado"], 404);
        }
        /* $this->validationRule(request()->input(), $person);

       if ($this->validationRule(request()->input(), $person)->fails()) {
             return response()->json(array(
                 'success' => false,
                 'errors' => $this->validationRule(request()->input(), $person)->getMessageBag()->toArray()
             ), 422);
         }*/

        try{
            DB::beginTransaction();

            $personal->fill([
                'nomApe'      => request('nomApe'),
                'DNI'         => request('dni'),
                'celular'     => request('celular'),
                'correo'      => request('correo'),
                'genero'      => 'M',
            ])->save();

            $user_id = User::where('personal_id', request('id'))->value('id');

            $user = User::findOrFail($user_id);

            $user->fill([
                'password'   => Hash::make(request('password')),
                'name'       => request('dni'),
            ])->save();

            $asignacion->fill([
                'rol_id'                => request('rol_id'),
                'cargo_id'              => request('cargo_id'),
                'personal_id'           => $personal->id,
                'unidad_territorial_id' => request('unidad_territorial_id'),
                'estado_id'             => request('estado_id'),
                'tipoContrato'          => 'CAS',
                'updated_at'            => Carbon::now(),

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
        $asignacion = AsignacionCargo::findOrFail($id);

        $personal = Personal::findOrFail($asignacion->personal_id);

        $user = User::findOrFail($personal->personal_id);

        if (!$asignacion && !$personal) {
            return response()->json(["message" => "Persona no encontrada"], 404);
        }
        $asignacion->delete();
        $personal->delete();
        $user->delete();
        return response()->json(["message" => "Persona eliminada"]);
    }
}
