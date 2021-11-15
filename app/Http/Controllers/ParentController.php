<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = Parent::all();

        if (empty($parents)) {
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
                'data' => $parents,
            ]);
        }
    }

    public function view(){
        $parents = Parent::all();

        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    public function newParent(Request $request){
        $parent = Parent::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            // 'role_id' => $request->role_id,
            // 'chid_id' => $request->child_id,
            'home_address' => $request->home_address,
            'number_of_children' => $request->number_of_children
        ]);

        $parent->save();
        return view('parents.index')->with('status', "Parent successfully created!!");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parent = Parent::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            // 'role_id' => $request->role_id,
            // 'chid_id' => $request->child_id,
            'home_address' => $request->home_address,
            'number_of_children' => $request->number_of_children
        ]);

        if (!$parent) {
            return response()->json([
                'success' => true,
                'message' => 'Parent details created succcessfully!!!',
                'status_code' => Response::HTTP_CREATED,
                'data' => $parent,
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'An error occurred while processing. Please try again!',
                'status_code' => Response::HTTP_REQUEST_TIMEOUT,
                'data' => $parent,
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
        $parent = Parent::find($id);

        if (!$parent) {
            return response()->json([
                'success' => false,
                'message' => 'Parent record does not exist!',
                'status_code' => Response::HTTP_NOT_FOUND,
                'data' => [],
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Parent record found!!!',
                'status_code' => Response::HTTP_FOUND,
                'data' => $parent,
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
        $parent = Parent::find($id);

        if (!$parent) {
            return response()->json([
                'success' => true,
                'message' => "Driver details not found",
                'status_code' => Response::HTTP_OK,
                'data' => $parent
            ]);
        } else {
            if ($parent->update($request->all())) {
                return response()->json([
                    'success' => true,
                    'message' => "Parents details updated successfully!!",
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
        $parent = Parent::find($id);

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
