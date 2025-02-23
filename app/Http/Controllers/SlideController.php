<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSlideRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 30;
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

        $data   = Slide::where('link_hinh_anh', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $id_chuc_nang   = 25;
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

        $data   =   Slide::all();

        return response()->json([
            'slide'  =>  $data
        ]);
    }

    public function store(createSlideRequest $request)
    {
        $id_chuc_nang   = 26;
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
        Slide::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới slide thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 27;
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

        Slide::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá slide thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 28;
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

        Slide::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật slide thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 29;
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

        $slide = Slide::find($request->id);
        if($slide) {
            if($slide->tinh_trang == 1) {
                $slide->tinh_trang = 0;
            } else {
                $slide->tinh_trang = 1;
            }
            $slide->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái slide thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
