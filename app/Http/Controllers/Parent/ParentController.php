<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Models\User;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent = Guardian::where('user_id', auth()->user()->id)->get();

        if (empty($parent)) {
            return response()->json([
                'success' => false,
                'message' => 'Parent records not found!',
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Parent records found!',
                'status_code' => Response::HTTP_OK,
                'data' => $parent,
            ]);
        }
    }

    public function view()
    {
        $parents = Guardian::all();

        return view('parent.index', compact('parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parent = Guardian::create([
            'user_id' => auth()->user()->id,
            'home_address' => $request->home_address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'number_of_children' => $request->number_of_children
        ]);

        if (!$parent) {
            return response()->json([
                'success' => true,
                'message' => 'An error occurred while processing. Please try again!',
                'status_code' => Response::HTTP_REQUEST_TIMEOUT,
                'data' => $parent,
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Parent details created succcessfully!!!',
                'status_code' => Response::HTTP_CREATED,
                'data' => $parent,
            ]);
        }
    }


    public function show($id)
    {
        $parent = Guardian::where('user_id', auth()->user()->id)->find($id);
    
        if (!$parent) {
            return response()->json([
                        'success' => false,
                        'message' => "ID doesn't exist!!",
                        'status_code' => Response::HTTP_NOT_FOUND,
                    ]);
        } else {
            if ($parent->user->role_id == User::role_parent) {
                return response()->json([
                            'success' => true,
                            'message' => "Parent details found",
                            'status_code' => Response::HTTP_OK,
                            'data' => $parent
                        ]);
            } else {
                return response()->json([
                'success' => false,
                'message' => "You are not authorized to see this page!!",
                'status_code' => Response::HTTP_FORBIDDEN,
            ]);
            }
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $parent = Guardian::where('user_id', auth()->user()->id)->find($id);

        if (!$parent) {
            return response()->json([
                'success' => false,
                'message' => "Parent details not found",
                'status_code' => Response::HTTP_OK,
                'data' => $parent
            ]);
        } else {
            if ($parent->update($request->all())) {
                return response()->json([
                    'success' => true,
                    'message' => "Parent details updated successfully!!",
                    'status_code' => Response::HTTP_OK,
                    'data' => $parent,
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
        $parent = Guardian::where('user_id', auth()->user()->id)->find($id);

        if (!$parent) {
            return response()->json([
                'success' => true,
                'message' => "Parent details not found",
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => []
            ]);
        } else {
            if ($parent->delete()) {
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
