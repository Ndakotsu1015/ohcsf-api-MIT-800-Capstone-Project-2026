<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\LoginSuccess;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Traits\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    use JsonResponse;

    public function login(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:6'
            ]);


            if (auth()->attempt($request->only('email', 'password'))) {
                $user = User::where('id', auth()->user()->id)->first();

                if (!$user->email_verified) {
                    return $this->error('Your account is not verified. Please check your email', 401);
                }

                if (!$user->is_active) {
                    return $this->error('Your account is disabled. Please contact the administrators', 401);
                }

                try {
                    $user->notify(new LoginSuccess($user));
                } catch (Exception $e) {
                    Log::alert($e);
                }

                return response()->json(
                    [
                        'access_token' => $user->createToken('access_token')->plainTextToken,
                        'token_type' => 'Bearer',
                        'user' => new UserResource($user)
                    ],
                    200
                );
            }

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        });
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->success(null);
    }
}
