<?php

namespace App\Http\Controllers;

use App\Http\Requests\createLoaiPhongRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\LoaiPhong;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoaiPhongController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 3;
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

        $data   = LoaiPhong::where('ten_loai_phong', 'like', $noi_dung)
                           ->orWhere('so_giuong', 'like', $noi_dung)
                           ->orWhere('so_nguoi_lon', 'like', $noi_dung)
                           ->orWhere('so_tre_em', 'like', $noi_dung)
                           ->orWhere('dien_tich', 'like', $noi_dung)
                           ->orWhere('tien_ich', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $id_chuc_nang   = 1;
        $user   =  Auth::guard('sanctum')->user();
        $check  =   ChiTietPhanQuyen::where('id_quyen', $user->id_chuc_vu)
                                    ->where('id_chuc_nang', $id_chuc_nang)
                                    ->first();
        if(!$check && $user->is_master == 0) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn không đủ quyền truy cập chức năng này!',
            ]);
        }

        $data   =   LoaiPhong::all();

        return response()->json([
            'status'      =>  true,
            'loai_phong'  =>  $data
        ]);
    }
    public function getdataClient()
    {
        $data =   LoaiPhong::where('tinh_trang', 1)
                        ->select('loai_phongs.*')
                        ->get(); // get là ra 1 danh sách;


        return response()->json([
            'status'      =>  true,
            'loai_phong'  =>  $data
        ]);
    }

    public function store(createLoaiPhongRequest $request)
    {
        $id_chuc_nang   = 2;
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
        LoaiPhong::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới loại phòng thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 4;
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
        LoaiPhong::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá loại phòng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 5;
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

        LoaiPhong::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật loại phòng thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 6;
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
        $loai_phong = LoaiPhong::find($request->id);
        if($loai_phong) {
            if($loai_phong->tinh_trang == 1) {
                $loai_phong->tinh_trang = 0;
            } else {
                $loai_phong->tinh_trang = 1;
            }
            $loai_phong->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái loại phòng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
