<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChuyenMucRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChuyenMucController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 74;
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
        
        $noi_dung   = '%' . $request->noi_dung_tim . '%';

        $data   = ChuyenMuc::where('ten_chuyen_muc', 'like', $noi_dung)
                           ->orWhere('slug_chuyen_muc', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getdataChiTietClient($id)
    {
        $chuyenMuc = ChuyenMuc::where('id', $id)->first();

        return response()->json([
            'chuyen_muc'   => $chuyenMuc,
        ]);
    }

    public function getData()
    {
        $id_chuc_nang   = 69;
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
        
        $data = ChuyenMuc::all();
        return response()->json([
            'chuyen_muc'  =>  $data
        ]);
    }
    public function getdataClient()
    {
        $data = ChuyenMuc::where('tinh_trang', 1)
                        ->select('chuyen_mucs.*')
                        ->get(); // get là ra 1 danh sách;

        return response()->json([
            'chuyen_muc'  =>  $data
        ]);
    }

    public function store(ChuyenMucRequest $request)
    {
        $id_chuc_nang   = 70;
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
        
        $data   =   $request->all();
        ChuyenMuc::create($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới chuyên mục thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 71;
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
        
        ChuyenMuc::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá chuyên mục thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 72;
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
        
        $data   = $request->all();
        ChuyenMuc::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật chuyên mục thành công!'
        ]);
    }

    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 73;
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
        
        $chuyenMuc = ChuyenMuc::find($request->id);
        if($chuyenMuc) {
            if($chuyenMuc->tinh_trang == 1) {
                $chuyenMuc->tinh_trang = 0;
            } else {
                $chuyenMuc->tinh_trang = 1;
            }
            $chuyenMuc->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái chuyên mục thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
