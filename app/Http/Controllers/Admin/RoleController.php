<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();

        return response()->json([
            'success' => true,
            'message' => 'Roles found!!',
            'status_code' => Response::HTTP_FOUND,
            'data' => $roles,
        ]);
    }

}
