<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\KhachHangDatLaiMatKhauRequest;
use App\Http\Requests\KhachHangQuenMatKhauRequest;
use App\Mail\SendMail;
use App\Models\ChiTietPhanQuyen;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Google_Client;

class KhachHangController extends Controller
{
    public function dangXuat()
    {
        $khach_hang = Auth::guard('sanctum')->user();
        if($khach_hang && $khach_hang instanceof \App\Models\KhachHang){
            DB::table('personal_access_tokens')
              ->where('id', $khach_hang->currentAccessToken()->id)->delete();

            return response()->json([
                'status' => true,
                'message' => "Đã đăng xuất thiết bị này thành công"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Vui lòng đăng nhập"
            ]);
        }
    }

    public function dangXuatAll()
    {
        $khach_hang = Auth::guard('sanctum')->user();
        if($khach_hang && $khach_hang instanceof \App\Models\KhachHang){
            $ds_token = $khach_hang->tokens;
            foreach($ds_token as $k => $v) {
                $v->delete();
            }

            return response()->json([
                'status' => true,
                'message' => "Đã đăng xuất tất cả thiết bị này thành công"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Vui lòng đăng nhập"
            ]);
        }
    }

    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 58;
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

        $data   = KhachHang::where('ho_lot', 'like', $noi_dung)
                           ->orWhere('ten', 'like', $noi_dung)
                           ->orWhere('email', 'like', $noi_dung)
                           ->orWhere('so_dien_thoai', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function dangKy(DangKyRequest $request)
    {
        $check_mail = KhachHang::where('email', $request->email)->first();
        if($check_mail) {
            return response()->json([
                'status' => false,
                'message' => "Email đã tồn tại trong hệ thống!"
            ]);
        } else {

            $data                   =   $request->all();
            $data['password']       =   bcrypt($request->password);
            $data['hash_active']    =   Str::uuid();
            KhachHang::create($data);

            $mail['ho_va_ten']      =   $request->ho_lot . " " . $request->ten;
            $mail['link']           =   "http://localhost:5173/kich-hoat/" . $data['hash_active'];

            Mail::to($request->email)->send(new SendMail("Kích hoạt tài khoản", "kich_hoat_tai_khoan", $mail));

            return response()->json([
                'status' => true,
                'message' => "Đăng kí tài khoản thành công!"
            ]);
        }

    }

    public function getData()
    {
        $id_chuc_nang   = 54;
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

        $data = KhachHang::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 55;
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

        $khach_hang = KhachHang::find($request->id);
        if($khach_hang) {
            if($khach_hang->is_block == 1) {
                $khach_hang->is_block = 0;
            } else {
                $khach_hang->is_block = 1;
            }

            // $khach_hang->is_block = !$khach_hang->is_block;

            // $khach_hang->is_block = $khach_hang->is_block == 0 ? 1 : 0;

            $khach_hang->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái tài khoản thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 56;
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

        KhachHang::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá khách hàng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 57;
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
        // return response()->json($data);
        KhachHang::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật khách hàng thành công!'
        ]);
    }
    public function dangNhap(Request $request){

        // $check = NhanVien::where('email',$request->email)
        //                   ->where('password',$request->password)
        //                   ->first();
        $check  = Auth::guard('khach_hang')->attempt(['email'=> $request->email,'password'=>  $request->password]);
            if($check){
                $user =  Auth::guard('khach_hang')->user();
                if($user->is_block) {
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'Tài khoản của bạn đã bị khoá!'
                    ]);
                }
                if($user->is_active) {
                    return response()->json([
                        'status'    =>  true,
                        'token'     => $user->createToken('token')->plainTextToken,
                        'ho_ten'    => $user->ho_lot . " " . $user->ten,
                        'message'   =>  'Đã đăng nhập thành công'
                    ]);
                } else {
                    Auth::guard('khach_hang')->logout();
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'Vui lòng kiểm tra email!'
                    ]);
                }
            }else{
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
                ]);
            }
    }

    public function kiemTraToken()
    {
        // Lấy thông tin từ Authorization : 'Bearer ' gửi lên
        $user = Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\KhachHang) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  "Oke, bạn có thể đi qua",
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Bạn cần đăng nhập hệ thống trước",
            ]);
        }
    }

    public function datLaiMatKhau(KhachHangDatLaiMatKhauRequest $request)
    {
        KhachHang::where('hash_reset', $request->hash_reset)->update([
            'password'      =>  bcrypt($request->password),
            'hash_reset'    =>  null
        ]);

        return response()->json([
            'status'    =>  true,
            'message'   =>  "Đã đặt lại mật khẩu thành công!",
        ]);
    }

    public function quenMatKhau(KhachHangQuenMatKhauRequest $request)
    {
        $hash_reset     =   Str::uuid();
        KhachHang::where('email', $request->email)->update([
            'hash_reset'   =>   $hash_reset
        ]);

        $kh = KhachHang::where('email', $request->email)->first();
        if($kh) {
            $data['ho_va_ten']  = $kh->ho_lot . " " . $kh->ten;
            $data['link_ne']    = "http://localhost:5173/dat-lai-mat-khau/" . $hash_reset;

            // Gửi email tới tài khoản $request->email + $hash_reset
            Mail::to($request->email)->send(new SendMail("Khôi Phục Mật Khẩu", "quen_mat_khau", $data));

            return response()->json([
                'status'    =>  true,
                'message'   =>  "Vui lòng kiểm tra email!",
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Email không tồn tại!",
            ]);
        }

    }

    public function kichHoat(Request $request)
    {
        $khach_hang = KhachHang::where('hash_active', $request->hash_active)->first();

        if($khach_hang) {
            $khach_hang->is_active      = 1;
            $khach_hang->hash_active    = null;
            $khach_hang->save();

            return response()->json([
                'status'    =>  true,
                'message'   =>  "Bạn đã kích hoạt tài khoản thành công!",
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Mã kích hoạt không tồn tại!",
            ]);
        }
    }

    public function loginGoogle(Request $request)
    {
        if (!$request->has('credential')) {
            return response()->json([
                'status' => 0,
                'message' => 'Thiếu token Google',
            ]);
        }

        $client = new Google_Client(['client_id' => env('CLIENT_GG')]);
        $payload = $client->verifyIdToken($request->credential);

        if (!$payload) {
            return response()->json([
                'status' => 0,
                'message' => 'Token không hợp lệ',
            ]);
        }

        // Lấy thông tin từ Google
        $email = $payload['email'] ?? null;
        $ho_va_ten = $payload['name'] ?? 'Người dùng Google';

        if (!$email) {
            return response()->json([
                'status' => 0,
                'message' => 'Không lấy được email từ Google',
            ]);
        }

        // Kiểm tra user đã tồn tại chưa
        $user = KhachHang::where('email', $email)->first();
        if ($user) {
            return response()->json([
                'status' => 1,
                'message' => 'Đăng nhập thành công',
                'key' => $user->createToken('token_khachhang')->plainTextToken,
            ]);
        }

        // Tạo tài khoản mới
        $khachHang = KhachHang::create([
            'ho_lot' => '',
            'ten' => $ho_va_ten,
            'email' => $email,
            'password' => bcrypt(Str::random(16)),
            'so_dien_thoai' => '0123456789',
            'ngay_sinh' => '1990-01-01',
            'is_active' => 1,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản ' . $email . ' Thành Công',
            'key' => $khachHang->createToken('token_khachhang')->plainTextToken,
        ]);
    }




}
