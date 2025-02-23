<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPhongRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\Phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhongController extends Controller
{
    public function timKiem(Request $request)
    {
        
        $id_chuc_nang   = 18;
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

        $data   = Phong::join('loai_phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                           ->where('ten_phong', 'like', $noi_dung)
                           ->orWhere('gia_mac_dinh', 'like', $noi_dung)
                           ->orWhere('tien_ich_khac', 'like', $noi_dung)
                           ->select('phongs.*', 'loai_phongs.ten_loai_phong')
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $id_chuc_nang   = 13;
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

        $data   =   Phong::join('loai_phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                         ->select('phongs.*', 'loai_phongs.ten_loai_phong')
                         ->get();

        return response()->json([
            'phong'  =>  $data
        ]);
    }

    public function store(createPhongRequest $request)
    {
        $id_chuc_nang   = 14;
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
        Phong::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới phòng thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 15;
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

        Phong::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá phòng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 16;
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

        Phong::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật phòng thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 17;
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

        $phong = Phong::find($request->id);
        if($phong) {
            if($phong->tinh_trang == 1) {
                $phong->tinh_trang = 0;
            } else {
                $phong->tinh_trang = 1;
            }
            $phong->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái phòng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
