<?php

namespace App\Http\Controllers\Driver;

use App\Models\Driver;
use App\Models\Guardian;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\TripStarted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
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
        $driver = Driver::where('user_id', auth()->user()->id)->first();

        // dd($driver);

        if (auth()->user()->role_id == User::role_driver) {
            return response()->json([
                'success' => true,
                'message' => "Driver records found",
                'status_code' => Response::HTTP_OK,
                'data' => $driver
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "You are not authorized to see this page!!",
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

        if (auth()->user()->role_id == User::role_driver) {
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
        
        return response()->json([
                'success' => false,
                'message' => "You are not authorised to register as a driver!!!",
                'status_code' => Response::HTTP_FORBIDDEN,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $driver = auth()->user()->drivers->find($id);
        
    //     if (!$driver) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => "ID doesn't exist!!",
    //             'status_code' => Response::HTTP_NOT_FOUND,
    //             'data' => $driver
    //         ]);
    //     } else {
    //         if ($driver->user->role_id == User::role_driver) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => "Driver details found",
    //                 'status_code' => Response::HTTP_OK,
    //                 'data' => $driver
    //             ]);
    //         } else {
    //             return response()->json([
    //     'success' => false,
    //     'message' => "You are not authorized to see this page!!",
    //     'status_code' => Response::HTTP_FORBIDDEN,
    // ]);
    //         }
    //     }
    // }

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
        $driver = Driver::where('user_id', auth()->user()->id)->find($id);
        
        if (!$driver) {
            return response()->json([
                    'success' => true,
                    'message' => "Driver details not found",
                    'status_code' => Response::HTTP_OK,
                    'data' => $driver
                ]);
        } else {
            if ($driver->user->role_id == User::role_driver) {
                $driver->update($request->all());
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
        $driver = Driver::where('user_id', auth()->user()->id)->find($id);

        if (!$driver) {
            return response()->json([
                'success' => true,
                'message' => "Driver details not found",
                'status_code' => Response::HTTP_NOT_FOUND,
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

public function startTrip(){
    $users = User::all();

        $driver = Driver::where('user_id', auth()->user()->id)->first();
    $newTrip = [
        'name' => 'Departure from school!!',
        'body' => 'This is to notify you that the trip has started',
        'thanks' => 'Thank you',
        'tripText' => 'Check out the map to track your child!',
        'tripUrl' => 'http://localhost:8000/map',

    ];

    dd(Notification::send($users, new TripStarted($newTrip)));
    
}

public function showNotifications(){
    $driver = Driver::where('user_id', auth()->user()->id)->first();

    $notifications = $driver->user->unreadNotifications;

    if(!$notifications){
        return response()->json([
            'success' => false,
            'message' => "You currently don't have notifications",
            'status_code' => Response::HTTP_NOT_FOUND
        ]);
    }
    else{
        return response()->json([
            'success' => true,
            'message' => "Notifications found!!!",
            'status_code' => Response::HTTP_OK,
            'data' => $notifications
        ]);
        
    }
    
}

public function markNotification(Request $request){
    $driver = Driver::where('user_id', auth()->user()->id)->first();

    $driver->user->unreadNotifications->when($request->input('id'), function ($query) use ($request){
        return $query->where('id', $request->input('id'));
    })->markAsRead();


    return response()->json([
        'success' => true,
        'message' => 'Notification has been marked as read',
        'status_code' => Response::HTTP_OK,

    ]);
    
}
}
