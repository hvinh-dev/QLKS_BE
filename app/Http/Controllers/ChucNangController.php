<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\ChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChucNangController extends Controller
{
    public function getData()
    {
        $id_chuc_nang   = 41;
        $user   =  Auth::guard('sanctum')->user();
        $check  =   ChiTietPhanQuyen::where('id_quyen', $user->id_chuc_vu)
                                    ->where('id_chuc_nang', $id_chuc_nang)
                                    ->first();
        if(!$check) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn không đủ quyền truy cập chức năng này!',
            ]);
        }
        
        $data = ChucNang::get();
        
        return response()->json([
            'data' => $data
        ]);
    }
}
