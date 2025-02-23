<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\ChiTietPhanQuyen;
use App\Models\ChiTietThuePhong;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\LoaiPhong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HoaDonController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 62;
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

        $data   = HoaDon::where('ma_hoa_don', 'like', $noi_dung)
                           ->orWhere('tong_tien', 'like', $noi_dung)
                           ->orWhere('ngay_den', 'like', $noi_dung)
                           ->orWhere('ngay_di', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function datPhong(Request $request)
    {
        $ngay_den               =   Carbon::createFromDate($request->tt_dat_phong['ngay_den']);
        $data['tu_ngay']        =  $ngay_den->format('d/m/Y');
        $ngay_di    =   Carbon::createFromDate($request->tt_dat_phong['ngay_di']);
        $data_loai_phong    = $request->tt_loai_phong;
        $khach_hang =   Auth::guard('sanctum')->user();
        $ds_loai_phong_khach_dat    =   [];

        foreach($data_loai_phong as $key => $value) {
            if(isset($value['chon_phong']) && $value['chon_phong'] == true && $value['so_phong_dat'] > 0) {
                array_push($ds_loai_phong_khach_dat, $value);
            }
        }

        $hoaDon     =   HoaDon::create([
            'ma_hoa_don'            =>  Str::uuid(),
            'id_khach_hang'         =>  $khach_hang->id,
            'ngay_den'              =>  $ngay_den,
            'ngay_di'               =>  $ngay_di
        ]);

        while($ngay_den < $ngay_di) {
            // $ngay_den = 24/5/2024
            foreach($ds_loai_phong_khach_dat as $key => $value) {
                $ds_phong = ChiTietThuePhong::join('phongs', 'chi_tiet_thue_phongs.id_phong', 'phongs.id')
                                            ->where('phongs.id_loai_phong', $value['id'])
                                            ->whereDate('chi_tiet_thue_phongs.ngay_thue', $ngay_den)
                                            ->where('chi_tiet_thue_phongs.tinh_trang', 1)
                                            ->select('chi_tiet_thue_phongs.*')
                                            ->take($value['so_phong_dat'])->get();
                $ds_phong_ids   = $ds_phong->pluck('id');

                ChiTietThuePhong::whereIn('id', $ds_phong_ids)
                                ->update([
                                    'tinh_trang'    =>  2,
                                    'id_hoa_don'    =>  $hoaDon->id
                                ]);
            }
            $ngay_den->addDay();
        }

        $hoaDon->tong_tien  = ChiTietThuePhong::where('id_hoa_don', $hoaDon->id)->sum('gia_thue');
        $hoaDon->save();

        // Gửi EMAIL
        $data['ho_va_ten']      =  $khach_hang->ho_lot . " " . $khach_hang->ten;
        $data['den_ngay']       =  $ngay_di->format('d/m/Y');
        $data['tong_tien']      =  number_format($hoaDon->tong_tien, 0, ",", ".");
       $link_demo = "https://img.vietqr.io/image/MB-56700112233-compact2.png?amount="
           . $hoaDon->tong_tien
           . "&addInfo=TTDP" . $hoaDon->id
           . "&accountName=Tr%E1%BA%A7n%20Ng%C3%B4%20H%E1%BB%93ng%20Vinh"
           . "&size=500"; // Nối thêm tham số kích thước
        $data['ma_qr_code']     =  $link_demo;

        Mail::to($khach_hang->email)->send(new SendMail('Xác Nhân Đơn Đặt Phòng Tại Khách Sạn', 'xac_nhan_don_hang', $data));

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã đặt phòng thành công!',
        ]);
    }

    public function getData()
    {
        $id_chuc_nang   = 59;
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

        $data   = HoaDon::join('khach_hangs', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
                        ->select('hoa_dons.*', 'khach_hangs.ho_lot', 'khach_hangs.ten')
                        ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function chiTietThue(Request $request)
    {
        $id_chuc_nang   = 60;
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

        $id_hoa_don     =   $request->id;

        $data   = ChiTietThuePhong::where('id_hoa_don', $id_hoa_don)
                                  ->orderBy('ngay_thue')
                                  ->join('phongs', 'chi_tiet_thue_phongs.id_phong', 'phongs.id')
                                  ->join('loai_phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                                  ->select('chi_tiet_thue_phongs.*', 'loai_phongs.ten_loai_phong', 'phongs.ten_phong')
                                  ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function xacNhanDonHang(Request $request)
    {
        $id_chuc_nang   = 61;
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

        if(isset($request->thanh_toan)) {
            HoaDon::where('id', $request->id_hoa_don)->update([
                'is_thanh_toan' => 1
            ]);
            ChiTietThuePhong::where('id_hoa_don', $request->id_hoa_don)->update([
                'tinh_trang'    =>  3
            ]);
        } else {
            HoaDon::where('id', $request->id_hoa_don)->update([
                'is_thanh_toan' => -1
            ]);
            ChiTietThuePhong::where('id_hoa_don', $request->id_hoa_don)->update([
                'tinh_trang'    =>  1,
                'id_hoa_don'    =>  null
            ]);
        }

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xử lý đơn hàng thành công!',
        ]);
    }

    public function thongKe1()
    {
        $id_chuc_nang   = 63;
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

        $data = HoaDon::select(
            DB::raw("SUM(tong_tien) as tong_tien_theo_ngay"),
            DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as ngay_tao"),
        )
        ->groupBy('ngay_tao')
        ->orderBy('created_at')
        ->get();
        $list_ngay          = [];
        $list_tong_tien     = [];

        foreach ($data as $key => $value) {
            array_push($list_ngay, $value->ngay_tao);
            array_push($list_tong_tien, $value->tong_tien_theo_ngay);
        }

        return response()->json([
            'list_ngay' => $list_ngay,
            'list_tong_tien'  => $list_tong_tien,
        ]);
    }

    public function thongKe2()
    {
        $id_chuc_nang   = 64;
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

        $data = LoaiPhong::join('phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                         ->join('chi_tiet_thue_phongs', 'chi_tiet_thue_phongs.id_phong', 'phongs.id')
                         ->select(
                            DB::raw("COUNT(chi_tiet_thue_phongs.id) as so_luong_phong"),
                            'loai_phongs.ten_loai_phong'
                         )
                         ->where('chi_tiet_thue_phongs.tinh_trang', 2)
                         ->groupBy('loai_phongs.ten_loai_phong')
                         ->get();
        $list_ten          = [];
        $list_so_luong     = [];

        foreach ($data as $key => $value) {
            array_push($list_ten, $value->ten_loai_phong);
            array_push($list_so_luong, $value->so_luong_phong);
        }

        return response()->json([
            'list_ten' => $list_ten,
            'list_so_luong'  => $list_so_luong,
        ]);
    }

    public function thongKe3()
    {
        $id_chuc_nang   = 65;
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

        $data = KhachHang::leftJoin('hoa_dons', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
                         ->select(
                            DB::raw("SUM(IF(hoa_dons.is_thanh_toan = 1, hoa_dons.tong_tien, 0)) as tong_tien_da_thanh_toan"),
                            'khach_hangs.ten',
                            'khach_hangs.ho_lot',
                         )
                         ->where('hoa_dons.is_thanh_toan', 1)
                         ->groupBy('khach_hangs.ten', 'khach_hangs.ho_lot')
                         ->get();
        $list_ten           = [];
        $list_tong_tien     = [];

        foreach ($data as $key => $value) {
            array_push($list_ten, $value->ho_lot . ' ' . $value->ten);
            array_push($list_tong_tien, $value->tong_tien_da_thanh_toan);
        }

        return response()->json([
            'list_ten' => $list_ten,
            'list_tong_tien'  => $list_tong_tien,
        ]);
    }

    public function thongKe4()
    {
        $id_chuc_nang   = 66;
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

        $data = KhachHang::leftJoin('hoa_dons', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
                         ->join('chi_tiet_thue_phongs', 'chi_tiet_thue_phongs.id_hoa_don', 'hoa_dons.id')
                         ->select(
                            DB::raw("COUNT(chi_tiet_thue_phongs.id) as so_luong_thue"),
                            'khach_hangs.ten',
                            'khach_hangs.ho_lot',
                         )
                         ->groupBy('khach_hangs.ten', 'khach_hangs.ho_lot')
                         ->get();
        $list_ten           = [];
        $list_so_luong      = [];

        foreach ($data as $key => $value) {
            array_push($list_ten, $value->ho_lot . ' ' . $value->ten);
            array_push($list_so_luong, $value->so_luong_thue);
        }

        return response()->json([
            'list_ten' => $list_ten,
            'list_so_luong'  => $list_so_luong,
        ]);
    }
}
