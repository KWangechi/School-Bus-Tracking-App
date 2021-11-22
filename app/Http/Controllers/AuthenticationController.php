<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function users()
    {
        $users = User::all();

        if (empty($users)) {
            return response()->json([
                'success' => false,
                'message' => 'No users found!!',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);
        } else {
            return response()->json([
            'success' => true,
            'message' => 'Users found!!!',
            'status_code' => Response::HTTP_OK,
            'data' => $users
        ]);
        }
    }

    public function register(Request $request)
    {
        $user = User::create([
        'role_id' => $request->role_id,
        'name' => $request->name,
        'phone_number' => $request->phone_number,
        'email'=> $request->email,
        'password'=> bcrypt($request->password),
        ]);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "Registration unsuccessful. Please try again!",
                'status_code' => Response::HTTP_FORBIDDEN,
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Registration Successful!!',
                'status_code'=> Response::HTTP_CREATED,
                'data' => $user,
                'access_token' => $user->createToken('personal_token')->plainTextToken
            ]);
        }
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
            'message'=> "Credentials don't exist!!!",
        'status_code' => Response::HTTP_UNAUTHORIZED,
                ]);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        return response()->json([
                'success' => true,
                'message' => 'Login Successfull!',
                'status_code' => Response::HTTP_OK,
                'data' => $user,
                'access_token' => $user->createToken('personal_token')->plainTextToken

            ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => "Sign out successful!!",
            'status_code' => Response::HTTP_OK
        ]);
    }
}
