<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Child::all();

        return response()->json([
            'success' => true,
            'message' => 'Records found!!',
            'status_code' => Response::HTTP_OK,
            'data' => $children
        ]);
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
        $child = Child::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'class' => $request->class
        ]);

        if (!$child) {
            return response()->json([
                'success' => true,
                'message' => 'An error occurred while processing. Please try again!',
                'status_code' => Response::HTTP_REQUEST_TIMEOUT,
                
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Parent details created succcessfully!!!',
                'status_code' => Response::HTTP_CREATED,
                'data' => $child,
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
        $child = Child::with('parent')->find($id);

        if (!$child) {
            return response()->json([
                'success' => false,
                'message' => "Child details not found!!",
                'status_code' => Response::HTTP_NOT_FOUND,
                
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => "Child details found",
                'status_code' => Response::HTTP_OK,
                'data' => $child
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
        $child = Child::find($id);

        if (!$child) {
            return response()->json([
                'success' => true,
                'message' => "Driver details not found",
                'status_code' => Response::HTTP_OK,
                'data' => $child
            ]);
        } else {
            if ($child->update($request->all())) {
                return response()->json([
                    'success' => true,
                    'message' => "Parents details updated successfully!!",
                    'status_code' => Response::HTTP_OK,
                    'data' => $child,
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
        $child = Child::find($id);

        if (!$child) {
            return response()->json([
                'success' => true,
                'message' => "Parent details not found",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        } else {
            if ($child->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => "Parent details deleted successfully!!",
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

