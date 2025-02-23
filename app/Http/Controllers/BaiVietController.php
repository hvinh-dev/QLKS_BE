<?php

namespace App\Http\Controllers;

use App\Http\Requests\createBaiVietRequest;
use App\Models\BaiViet;
use App\Models\ChiTietPhanQuyen;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaiVietController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 53;
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

        $data   = BaiViet::where('ten_bai_viet', 'like', $noi_dung)
                           ->orWhere('mo_ta_ngan', 'like', $noi_dung)
                           ->orWhere('mo_ta_chi_tiet', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getdataChiTietClient($id)
    {
        $baiViet = BaiViet::where('id', $id)->first();

        return response()->json([
            'bai_viet'   => $baiViet,
        ]);
    }

    public function getData()
    {
        $id_chuc_nang   = 48;
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
        
        $data = BaiViet::join('chuyen_mucs', 'chuyen_mucs.id', 'bai_viets.id_chuyen_muc')
                       ->select('bai_viets.*', 'chuyen_mucs.ten_chuyen_muc')
                       ->get();
        return response()->json([
            'bai_viet'  =>  $data
        ]);
    }
    public function getdataClient($slug_chuyen_muc)
    {
        $chuyenMuc = ChuyenMuc::where('slug_chuyen_muc', $slug_chuyen_muc)->first();
        $data = BaiViet::where('tinh_trang', 1)
                        ->where('id_chuyen_muc', $chuyenMuc->id)
                        ->select('bai_viets.*')
                        ->get(); // get là ra 1 danh sách;

        return response()->json([
            'bai_viet'  =>  $data
        ]);
    }

    public function store(createBaiVietRequest $request)
    {
        $id_chuc_nang   = 49;
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
        BaiViet::create($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới bài viết thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 50;
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
        
        BaiViet::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá bài viết thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 51;
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
        BaiViet::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật bài viết thành công!'
        ]);
    }

    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 52;
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
        
        $bai_viet = BaiViet::find($request->id);
        if($bai_viet) {
            if($bai_viet->tinh_trang == 1) {
                $bai_viet->tinh_trang = 0;
            } else {
                $bai_viet->tinh_trang = 1;
            }
            $bai_viet->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái bài viết thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
