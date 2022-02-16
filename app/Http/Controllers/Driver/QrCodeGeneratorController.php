<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
// use Symfony\Component\HttpFoundation\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGeneratorController extends Controller
{
    public function createCode(){
        $parent = Guardian::first();
        $child = Child::first();

        $newCode = QrCode::size(500)
            ->format('svg')
            ->generate(
                'Rachel Karanja',
                // 'parent_details' => $parent->user->name
            );
            
        return response()->json([
            'success' => true,
            'message' => 'Code successfully created',
            'status_code' => 200,
            'data' => $newCode
        ]);
    }
}
 