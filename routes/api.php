<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChiTietThuePhongController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\GiaoDichController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SlideController;
use App\Http\Middleware\kiemTraAdminMiddleware;
use App\Models\ChiTietPhanQuyen;
use App\Models\ChiTietThuePhong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/giao-dich',[GiaoDichController::class,'index']);

Route::group(['middleware' => 'adminMiddle'], function() {
    Route::get('/loai-phong/data', [LoaiPhongController::class, 'getData']);
    Route::post('/loai-phong/create', [LoaiPhongController::class, 'store']);
    Route::post('/loai-phong/tim-kiem', [LoaiPhongController::class, 'timKiem']);
    Route::delete('/loai-phong/delete/{id}', [LoaiPhongController::class, 'destroy']);
    Route::put('/loai-phong/update', [LoaiPhongController::class, 'update']);
    Route::put('/loai-phong/doi-trang-thai', [LoaiPhongController::class, 'doiTrangThai']);


    Route::get('/dich-vu/data', [DichVuController::class, 'getData']);
    Route::post('/dich-vu/create', [DichVuController::class, 'store']);
    Route::delete('/dich-vu/delete/{id}', [DichVuController::class, 'destroy']);
    Route::put('/dich-vu/update', [DichVuController::class, 'update']);
    Route::put('/dich-vu/doi-trang-thai', [DichVuController::class, 'doiTrangThai']);
    Route::post('/dich-vu/tim-kiem', [DichVuController::class, 'timKiem']);


    Route::get('/phong/data', [PhongController::class, 'getData']);
    Route::post('/phong/create', [PhongController::class, 'store']);
    Route::delete('/phong/delete/{id}', [PhongController::class, 'destroy']);
    Route::put('/phong/update', [PhongController::class, 'update']);
    Route::put('/phong/doi-trang-thai', [PhongController::class, 'doiTrangThai']);
    Route::post('/phong/tim-kiem', [PhongController::class, 'timKiem']);



    Route::get('/nhan-vien/data', [NhanVienController::class, 'getData']);
    Route::post('/nhan-vien/create', [NhanVienController::class, 'store']);
    Route::delete('/nhan-vien/delete/{id}', [NhanVienController::class, 'destroy']);
    Route::put('/nhan-vien/update', [NhanVienController::class, 'update']);
    Route::put('/nhan-vien/doi-trang-thai', [NhanVienController::class, 'doiTrangThai']);
    Route::post('/nhan-vien/tim-kiem', [NhanVienController::class, 'timKiem']);


    Route::get('/slide/data', [SlideController::class, 'getData']);
    Route::post('/slide/create', [SlideController::class, 'store']);
    Route::delete('/slide/delete/{id}', [SlideController::class, 'destroy']);
    Route::put('/slide/update', [SlideController::class, 'update']);
    Route::put('/slide/doi-trang-thai', [SlideController::class, 'doiTrangThai']);
    Route::post('/slide/tim-kiem', [SlideController::class, 'timKiem']);



    Route::get('/review/data', [ReviewController::class, 'getData']);
    Route::post('/review/create', [ReviewController::class, 'store']);
    Route::delete('/review/delete/{id}', [ReviewController::class, 'destroy']);
    Route::put('/review/update', [ReviewController::class, 'update']);
    Route::post('/review/tim-kiem', [ReviewController::class, 'timKiem']);


    Route::get('/phan-quyen/data', [PhanQuyenController::class, 'getData']);
    Route::post('/phan-quyen/create', [PhanQuyenController::class, 'createData']);
    Route::delete('/phan-quyen/delete/{id}', [PhanQuyenController::class, 'deleteData']);
    Route::put('/phan-quyen/update', [PhanQuyenController::class, 'UpateData']);
    Route::post('/phan-quyen/tim-kiem', [PhanQuyenController::class, 'timKiem']);


    Route::get('/chuc-nang/data', [ChucNangController::class, 'getData']);

    Route::post('/chi-tiet-thue-phong/create', [ChiTietThuePhongController::class, 'createData']);
    Route::get('/chi-tiet-thue-phong/data', [ChiTietThuePhongController::class, 'getData']);
    Route::put('/chi-tiet-thue-phong/update', [ChiTietThuePhongController::class, 'UpdateData']);
    Route::post('/chi-tiet-thue-phong/tim-kiem', [ChiTietThuePhongController::class, 'timKiem']);


    Route::get('/data', [ChiTietThuePhongController::class, 'data']);
    Route::post('/thong-ke-thue-phong/tim-kiem', [ChiTietThuePhongController::class, 'timKiemThuePhong']);


    Route::get('/bai-viet/data', [BaiVietController::class, 'getData']);
    Route::post('/bai-viet/create', [BaiVietController::class, 'store']);
    Route::delete('/bai-viet/delete/{id}', [BaiVietController::class, 'destroy']);
    Route::put('/bai-viet/update', [BaiVietController::class, 'update']);
    Route::put('/bai-viet/doi-trang-thai', [BaiVietController::class, 'doiTrangThai']);
    Route::post('/bai-viet/tim-kiem', [BaiVietController::class, 'timKiem']);

    Route::get('/chuyen-muc/data', [ChuyenMucController::class, 'getData']);
    Route::post('/chuyen-muc/create', [ChuyenMucController::class, 'store']);
    Route::delete('/chuyen-muc/delete/{id}', [ChuyenMucController::class, 'destroy']);
    Route::put('/chuyen-muc/update', [ChuyenMucController::class, 'update']);
    Route::put('/chuyen-muc/doi-trang-thai', [ChuyenMucController::class, 'doiTrangThai']);
    Route::post('/chuyen-muc/tim-kiem', [ChuyenMucController::class, 'timKiem']);

    Route::get('/khach-hang/data', [KhachHangController::class, 'getData']);
    Route::put('/khach-hang/doi-trang-thai', [KhachHangController::class, 'doiTrangThai']);
    Route::delete('/khach-hang/delete/{id}', [KhachHangController::class, 'destroy']);
    Route::put('/khach-hang/update', [KhachHangController::class, 'update']);
    Route::post('/khach-hang/tim-kiem', [KhachHangController::class, 'timKiem']);


    Route::group(['prefix' => '/hoa-don'], function() {
        Route::get('/data', [HoaDonController::class, 'getData']);
        Route::post('/chi-tiet-thue', [HoaDonController::class, 'chiTietThue']);
        Route::post('/xac-nhan-don-hang', [HoaDonController::class, 'xacNhanDonHang']);
        Route::post('/tim-kiem', [HoaDonController::class, 'timKiem']);
        Route::get('/thong-ke-1', [HoaDonController::class, 'thongKe1']);
        Route::get('/thong-ke-2', [HoaDonController::class, 'thongKe2']);
        Route::get('/thong-ke-3', [HoaDonController::class, 'thongKe3']);
        Route::get('/thong-ke-4', [HoaDonController::class, 'thongKe4']);

    });

    Route::post("/chi-tiet-phan-quyen/cap-quyen", [ChiTietPhanQuyenController::class, 'capQuyen']);
    Route::post("/chi-tiet-phan-quyen/danh-sach", [ChiTietPhanQuyenController::class, 'getData']);
    Route::post("/chi-tiet-phan-quyen/xoa-quyen", [ChiTietPhanQuyenController::class, 'xoaQuyen']);
});

// data client home page
Route::get('/homepage/data', [ReviewController::class, 'getDataHomepage']);
// data client Bài viết
Route::get('/client/chuyen-muc/data', [ChuyenMucController::class, 'getdataClient']);

Route::get('/client/bai-viet/data/{slug_chuyen_muc}', [BaiVietController::class, 'getdataClient']);
// data client Loại Phòng
Route::get('/client/loai-phong/data', [LoaiPhongController::class, 'getdataClient']);

Route::get('/client/chi-tiet-bai-viet/{id}', [BaiVietController::class, 'getdataChiTietClient']);

// Đăng Nhập
Route::post('/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/khach-hang/dang-nhap-google', [KhachHangController::class, 'loginGoogle']);
Route::post("/kiem-tra-token-admin", [NhanVienController::class, "kiemTraToken"]);
Route::get("/kiem-tra-token-khach-hang", [KhachHangController::class, "kiemTraToken"]);
Route::post("/danh-sach-phong-dat", [ChiTietThuePhongController::class, "danhSachHienThi"]);

Route::group(['middleware' => 'khachHangMiddle'], function() {
    Route::post('/khach-hang-dat-phong', [HoaDonController::class, 'datPhong']);
});

Route::post("/khach-hang/dat-lai-mat-khau", [KhachHangController::class, 'datLaiMatKhau']);
Route::post("/khach-hang/quen-mat-khau", [KhachHangController::class, 'quenMatKhau']);
Route::post("/khach-hang/kich-hoat", [KhachHangController::class, 'kichHoat']);

Route::get('khach-hang/dang-xuat', [KhachhangController::class, 'dangXuat']);
Route::get('khach-hang/dang-xuat-all', [KhachhangController::class, 'dangXuatAll']);

Route::get('admin/dang-xuat', [NhanVienController::class, 'dangXuat']);
Route::get('admin/dang-xuat-all', [NhanVienController::class, 'dangXuatAll']);
