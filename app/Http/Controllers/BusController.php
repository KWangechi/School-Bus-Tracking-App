<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all();

        if(!$buses){
            return response()->json([
                'success' => false,
                'message' => "No bus records found!",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        }
        else{
            return Response()->json([
                'success' => true,
                'message' => "Bus records found",
                'status_code' => Response::HTTP_OK,
                'data' => $buses
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
        $bus = Bus::create([
            'number_plate' => $request->number_plate,
            'date_registered' => date($request->date_registered),
            'designated_route' => $request->designated_route,
        ]);

        if(!$bus){
            return response()->json([
                'success' => false,
                'message' => "An error occurred. Please try again!!!",
                'status_code' => Response::HTTP_OK,
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => "Bus created successfully!!",
                'status_code' => Response::HTTP_OK,
                'data' => $bus
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
        $bus = Bus::find($id);

        if(!$bus){
            return response()->json([
                'success' => false,
                'message' => "Bus details not found!!",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => $bus
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => "Bus details found",
                'status_code' => Response::HTTP_OK,
                'data' => $bus
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
        $bus = Bus::find($id);

        if(!$bus) {
            return response()->json([
                'success' => false,
                'message' => "Bus details not found",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        }
        else{
            if($bus->update($request->all())){
                return response()->json([
                    'success' => true,
                    'message' => "Bus details updated successfully!!",
                    'status_code' => Response::HTTP_OK,
                    'data' => $bus,
                ]);
                
            }
            else{
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
        $bus = Bus::find($id);

        if(!$bus) {
            return response()->json([
                'success' => true,
                'message' => "Bus details not found",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        }
        else{
            if($bus->delete()){
                return response()->json([
                    'success' => true,
                    'message' => "Bus details deleted successfully!!",
                    'status_code' => Response::HTTP_OK,
                    
                ]);
                
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => "Deletion not successful. Please try again!!",
                    'status_code' => Response::HTTP_OK,
                ]);
            }

            
        }
    }
}
