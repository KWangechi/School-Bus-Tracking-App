<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role_id == User::role_admin){
            $drivers = Driver::all();
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
        else{
            return response()->json([
                'success' => false,
                'message' => "You are not authorised to see this page!!",
                'status_code' => Response::HTTP_FORBIDDEN,
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
        $driver = Driver::create([
            'user_id' => auth()->user()->id,
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
        //$driver = Driver::with('user')->find($id);
        $driver = Driver::find($id);
        
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
        $driver = Driver::find($id);

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
        $driver = Driver::find($id);

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
