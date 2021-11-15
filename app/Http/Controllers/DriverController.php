<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = User::where('role_id', User::role_driver)->get();

        if (empty($drivers)) {
            return response()->json([
                'success' => false,
                'message' => "No driver records found!",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => "Driver records found",
                'status_code' => Response::HTTP_OK,
                'data' => $drivers
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = User::create([
            'role_id' => User::role_driver,
            'bus_id' => $request->bus_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'date_registered' => date($request->date_registered)
        ]);

        

        if (!$driver) {
            return response()->json([
                'success' => false,
                'message' => "An error occurred. Please try again!!!",
                'status_code' => Response::HTTP_OK,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => "Driver created successfully!!",
                'status_code' => Response::HTTP_OK,
                'data' => $driver
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = User::find($id);

        if (!$driver) {
            return response()->json([
                'success' => false,
                'message' => "Driver details not found!!",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => $driver
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => "Driver details found",
                'status_code' => Response::HTTP_OK,
                'data' => $driver
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = User::find($id);

        if (!$driver) {
            return response()->json([
                'success' => true,
                'message' => "Driver details not found",
                'status_code' => Response::HTTP_OK,
                'data' => $driver
            ]);
        } else {
            if ($driver->update($request->all())) {
                return response()->json([
                    'success' => true,
                    'message' => "Driver details updated successfully!!",
                    'status_code' => Response::HTTP_OK,
                    'data' => $driver,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Update not successful. Please try again!!",
                    'status_code' => Response::HTTP_OK,
                    'data' => [],
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = User::find($id);

        if (!$driver) {
            return response()->json([
                'success' => true,
                'message' => "Driver details not found",
                'status_code' => Response::HTTP_OK,
                'data' => $driver
            ]);
        } else {
            if ($driver->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => "Driver details deleted successfully!!",
                    'status_code' => Response::HTTP_OK,
                    
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Deletion not successful. Please try again!!",
                    'status_code' => Response::HTTP_OK,
                ]);
            }
        }
    }
}
