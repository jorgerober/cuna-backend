<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AreaAssignment;
use App\Models\AsignacionCargo;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login() {
        request()->validate([
            'name'        => 'required',
            'password'    => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('name', request()->name)->first();

        if (!$user || !Hash::check(request()->password, $user->password)) {
            throw ValidationException::withMessages([
                'name' => ['Credenciales incorrectas'],
            ]);
        }

        return $user->createToken(request()->device_name)->plainTextToken;
    }

    public function getUser(): JsonResponse
    {
        $assignment = AsignacionCargo::where('personal_id', auth()->user()->personal->id)
            ->with(['rol', 'personal'])
            ->get();

        return response()->json([
            "assignment" => $assignment,
        ]);
    }

    public function logout(): JsonResponse
    {
        $user = auth()->user();
        foreach ($user->tokens as $token) {
            $token->delete();
        }
        return response()->json('User logout...', 200);
    }


}
