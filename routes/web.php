<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Auth')->group(function (){
    Route::name('auth.')->group(function (){
//        Route::resource('/login', 'TrangChuController');
        Route::get('/dang-nhap','MyLoginController@showLoginForm')->name('form.login');
        Route::post('/go-login','MyLoginController@login')->name('login');
//        Route::post('/go-login?admin','MyLoginController@login')->name('login.admin');
        Route::get('/logout','MyLoginController@logout')->name('logout');

        Route::get('/dang-ky','RegisterController@showRegistrationForm')->name('form.register');
        Route::post('/go-dang-ky','RegisterController@register')->name('register');

        Route::get('/tai-khoan/confirm-email','VerificationEmailController@confirmEmailView')->name('confirmEmailView');

    });
});
//Trang chủ
Route::namespace('TrangChu')->group(function () {
    Route::name('trangchu.')->group(function () {
        Route::get('/', 'TrangChuController@index')->name('index')->middleware('cacheResponse:1200');;
        Route::get('/danh-sach-viec-lam', 'TrangChuController@vietLam')->name('vietLam');
        Route::get('/gioi-thieu-ve-chung-toi', 'TrangChuController@gioiThieuVeChungToi')->name('gioiThieuVeChungToi');

//        Route::get('/search', 'TrangChuController@searchInput');
//        Route::get('/chi-tiet-tuyen-dung', 'TrangChuController@details')->name('chiTietBaiDang');
//        Route::get('/create-post', 'TrangChuController@create')->name('create');
//        Route::get('/update-post{id}', 'TrangChuController@update')->name('update');
//        Route::get('/delete-post{id}', 'TrangChuController@delete')->name('delete');
//        Route::get('/logout', 'TrangChuController@logout')->name('logout');
    });

});

Route::namespace('User')->group(function () {
    Route::name('user.')->group(function () {
        Route::resource('/user', 'UserController');
//        Route::post('/tai-khoan/xac-nhan-email', 'UserController@sendVerifyEmail');
        Route::get('/nguoi-tim-viec', 'UserController@getEmployee')->name('nguoiTimViec');
//        Route::get('/user-employer', 'UserController@getEmployer');
        Route::get('/user-set-employer', 'UserController@setEmployee');
        Route::get('/user-set-employer', 'UserController@setEmployer');
        Route::post('/user-set-avatar', 'UserController@setAvatar');
        Route::post('/doi-mat-khau', 'UserController@doiMatKhau')->name('doiMatKhau');
        Route::get('/user-skill-view','UserController@getViewSkill');
        Route::get('/user-skill-view-append','UserController@getViewSkillAppend');
        //nguoi tim viec
        Route::get('/nguoi-tim-viec/project-view','UserController@projectView')->name('projectView');
        Route::get('/nguoi-tim-viec/project-view/get-exp-html','UserController@getHtmlExp');
        Route::post('/nguoi-tim-viec/update','UserController@setNguoiTimViec');

        Route::get('/nha-tuyen-dung','UserController@getEmployer')->name('nhaTuyenDung');
        Route::post('/nha-tuyen-dung/set-logo-company','UserController@setLogoCongTy')->name('setLogoCongTy');
        Route::get('/nha-tuyen-dung/confirm-email','UserController@confirmEmailNhaTuyenDung')->name('nhaTuyenDung.confirmEmail');
        Route::post('/nha-tuyen-dung/update','UserController@updateNhaTuyenDung')->name('nhaTuyenDung.update');
    });
});

Route::namespace('TaiKhoan')->group(function (){
    Route::name('taikhoan.')->group(function (){
        Route::post('/tai-khoan/xac-nhan-email', 'ConfirmEmailController@sendVerifyEmail');
        Route::get('/tai-khoan/kich-hoat-tai-khoan/{token}', 'ConfirmEmailController@kichHoatTaiKhoan')->name('kichHoatTaiKhoan');
        Route::get('/tai-khoan/thong-bao-khoa-tai-khoan', 'ConfirmEmailController@thongBaoKhoaTaiKhoan')->name('thongBaoKhoaTaiKhoan');

    });
});
Route::namespace('BaiViet')->group(function (){
    Route::name('baiviet.')->group(function (){
        Route::get('/dang-bai-viet','BaiVietController@index')->name('index')->middleware(['auth','email.confirm','nha_tuyen_dung']);
        Route::get('/tin-tuyen-dung', 'BaiVietController@layTatCaBaiViet');
        Route::post('/dang-bai-viet/luu-tin','BaiVietController@savePost')->name('savepost')->middleware(['auth','email.confirm']);
        Route::get('/bai-viet/thong-tin&baiviet={post}&chitiet=1','BaiVietController@getThongTinBaiViet')->name('getThongTinBaiViet')->middleware(['auth','email.confirm','cacheResponse:1200']);
        Route::get('/bai-viet/thong-tin&baiviet={post}&chitiet=0','BaiVietController@getThongTinBaiVietClick')->name('getThongTinBaiVietClick')->middleware('cacheResponse:1200');
        Route::post('/bai-viet/like','BaiVietController@likePost')->name('likePost')->middleware(['auth','email.confirm']);
        Route::get('/bai-viet/chinh-sua','BaiVietController@chinhSua')->name('chinhSua')->middleware(['auth','email.confirm']);
        Route::post('/bai-viet/chinh-sua/luu-tin','BaiVietController@luuChinhSua')->name('luuChinhSua')->middleware(['auth','email.confirm']);
        Route::get('/bai-viet/get-view-nop-don','BaiVietController@getViewNopDon')->name('getViewNopDon')->middleware(['auth','email.confirm']);
        Route::get('/bai-viet/tim-kiem','BaiVietController@timKiemBaiViet')->name('timKiemBaiViet');
        Route::post('/bai-viet/gui-lai-xac-nhan','BaiVietController@guiLaiXacNhan')->name('guiLaiXacNhan');

    });
});

Route::namespace('CongTy')->group(function (){
    Route::name('congty.')->group(function (){
        Route::get('/danh-sach-cong-ty','CongTyController@index')->name('index');
        Route::get('/danh-sach-cong-ty/get-content','CongTyController@getContent')->name('getContent');
        Route::get('/danh-sach-cong-ty/data','CongTyController@getDanhSach')->name('getdanhsach');
        Route::post('/danh-sach-cong-ty/tao-moi','CongTyController@setDanhSach')->name('setdanhsach');
        Route::post('/danh-sach-cong-ty/cap-nhat','CongTyController@updateDanhSach')->name('updatedanhsach');
        Route::post('/danh-sach-cong-ty/xoa','CongTyController@xoaDanhSach')->name('xoadanhsach');
        Route::get('/danh-sach-cong-ty/du-lieu-cap-nhat','CongTyController@getCapNhat')->name('getcapnhat');
    });
});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('PhanQuyen')->group(function () {
    Route::name('phanquyen.')->group(function () {
        Route::resource('/phan-quyen', 'PhanQuyenController');
        Route::post('/phan-quyen-setter', 'PhanQuyenController@setPhanQuyen')->name('setter');
    });

});



Route::namespace('SoDu')->group(function () {
    Route::name('sodu.')->group(function () {
        Route::get('/so-du-tai-khoan','SoDuController@index')->name('index');
        Route::post('/so-du-tai-khoan/dang-ky','SoDuController@dangKy')->name('dangky');
        Route::post('/so-du-tai-khoan/nap-the','SoDuController@napThe')->name('napThe');
    });

});
Route::namespace('TheCao')->group(function () {
    Route::name('thecao.')->group(function () {
        Route::get('/the-cao/danh-sach','TheCaoController@index')->name('index');
        Route::get('/the-cao/lay-danh-sach','TheCaoController@getDanhSach')->name('getDanhSach');
        Route::post('/the-cao/them-danh-sach','TheCaoController@setDanhSach')->name('setDanhSach');
    });

});

Route::namespace('QuanLyBaiDang')->group(function (){
    Route::name('quanlybaidang.')->group(function (){
        Route::get('/quan-ly-tuyen-dung/quan-ly-bai-dang','QuanLyBaiDangController@index')->name('index');
        Route::get('/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach','QuanLyBaiDangController@getDanhSach')->name('getdanhsach');
    });
});
//Route::get('/khong-tim-thay-trang','ErrorController@func404')->name('notFoundRoute');
Route::namespace('Admin')->group(function () {
    Route::name('admin.')->group(function (){
        Route::get('/admin','AdminTrangChuController@index')->name('index');
//        Route::get('/admin/get-thong-bao','AdminTrangChuController@getThongbao')->name('getThongbao');
        Route::post('/admin/thong-bao/chuyen-trang-thai','AdminTrangChuController@chuyenTrangThaiDaXem')->name('chuyenTrangThaiDaXem');

        Route::get('/admin/danh-sach-bai-duyet','DuyetBaiVietController@index')->name('duyetbaiviet');
        Route::get('/admin/danh-sach-bai-duyet/get','DuyetBaiVietController@getDanhSachDuyetTin')->name('getDanhSachDuyetTin');
        Route::get('/admin/duyet-tin/xem-bai-dang','DuyetBaiVietController@getBaiTuyenDung')->name('getBaiTuyenDung');
        Route::post('/admin/duyet-tin/confirm','DuyetBaiVietController@confirmBaiTuyenDung')->name('confirmBaiTuyenDung');
        Route::post('/admin/duyet-tin/tu-choi','DuyetBaiVietController@rejectBaiTuyenDung')->name('rejectBaiTuyenDung');

        Route::get('/admin/danh-sach-tai-khoan','QuanLyTaiKhoanController@index')->name('danhSachTaiKhoan');
        Route::get('/admin/danh-sach-tai-khoan/get-data','QuanLyTaiKhoanController@getDanhSachTaiKhoan')->name('getDanhSachTaiKhoan');
        Route::get('/admin/danh-sach-tai-khoan/get-phan-quyen','QuanLyTaiKhoanController@getTacVu')->name('getPhanQuyen');
        Route::post('/admin/danh-sach-tai-khoan/set-phan-quyen','QuanLyTaiKhoanController@setTacVuPhanQuyen')->name('setTacVuPhanQuyen');
        Route::post('/admin/danh-sach-tai-khoan/khoa-tai-khoan','QuanLyTaiKhoanController@khoaTaiKhoan')->name('khoaTaiKhoan');
        Route::post('/admin/danh-sach-tai-khoan/mo-khoa-tai-khoan','QuanLyTaiKhoanController@moKhoaTaiKhoan')->name('moKhoaTaiKhoan');

        Route::get('/admin/danh-sach-tac-vu','PhanQuyenController@index')->name('danhSachTacVu');
        Route::get('/admin/danh-sach-tac-vu/get-chuc-vu','PhanQuyenController@getLoaiTaiKhoan')->name('getDanhSachTaiKhoan');
        Route::get('/admin/danh-sach-tac-vu/get-tac-vu','PhanQuyenController@getTacVu')->name('getTacVu');
        Route::post('/admin/danh-sach-tac-vu/set-tac-vu','PhanQuyenController@setTacVu')->name('setTacVu');
        Route::post('/admin/danh-sach-tac-vu/delete-tac-vu','PhanQuyenController@deleteTacVu')->name('setTacVu');
        Route::post('/admin/danh-sach-tac-vu/set-quyen','PhanQuyenController@setQuyen')->name('setQuyen');
        Route::post('/admin/danh-sach-tac-vu/delete-quyen','PhanQuyenController@deleteQuyen')->name('setTacVu');
        Route::post('/admin/danh-sach-tac-vu/phan-quyen-role','PhanQuyenController@setQuyenRole')->name('setQuyenRole');

        Route::get('/admin/get-thong-bao','ThongBaoController@getThongBao')->name('getThongBao');
        Route::get('/admin/thong-bao/cap-nhat-tin-rong','ThongBaoController@capNhatTinRong')->name('capNhatTinRong');

    });

});

Route::namespace('NopDon')->group(function (){
    Route::name('nopdon.')->group(function (){
        Route::get('/nguoi-tim-viec/nop-don-buoc-mot','NopDonController@nopDonBuocMot')->name('nopDonBuocMot');
        Route::get('/nguoi-tim-viec/nop-don-buoc-mot/luu-lai','NopDonController@nopDonBuocMotLuuLai')->name('nopDonBuocMotLuuLai');
        Route::post('/nguoi-tim-viec/nop-don-buoc-hai/luu-lai','NopDonController@nopDonBuocHaiLuuLai')->name('nopDonBuocHaiLuuLai');

        Route::get('/nguoi-tim-viec/danh-sach-bai-ung-tuyen','NopDonController@danhSachBaiDaNopDon')->name('danhSachBaiDaNopDon');
        Route::get('/nguoi-tim-viec/get-danh-sach-bai-ung-tuyen','NopDonController@layDanhSachBaiDaNopDon')->name('layDanhSachBaiDaNopDon');
        Route::post('/nop-don-ung-tuyen','NopDonController@nopDonUngTuyen')->name('nopDonUngTuyen');
    });
});

Route::namespace('QuanTam')->group(function (){
    Route::name('quantam.')->group(function (){
        Route::post('/quan-tam-nha-tuyen-dung','QuanTamController@setQuanTam')->name('setQuanTam');
    });
});

Route::namespace('NguoiTimViec')->group(function (){
    Route::name('nguoitimviec.')->group(function (){
        Route::get('/nguoi-tim-viet/danh-sach-bai-luu','LuuBaiController@index')->name('index');
        Route::get('/nguoi-tim-viet/get-danh-sach-bai-luu','LuuBaiController@getDanhSachBaiLuu')->name('getDanhSachBaiLuu');

        Route::get('/nguoi-tim-viet/chi-tiet','NguoiTimViecControler@chiTiet')->name('chiTiet');
        Route::get('/nguoi-tim-viet/tim-kiem-nha-tuyen-dung','NguoiTimViecControler@timKiemNhaTuyenDung')->name('timKiemNhaTuyenDung');
        Route::post('/nguoi-tim-viet/upload-file','NguoiTimViecControler@uploadFile')->name('uploadFile');
        Route::post('/nguoi-tim-viet/upload-file-multiple','NguoiTimViecControler@uploadFileMultiple')->name('uploadFileMultiple');
        Route::get('/nguoi-tim-viet/view-file','NguoiTimViecControler@viewPDF')->name('viewPDF');
    });
});

Route::namespace('BaoCao')->group(function (){
    Route::name('baocao.')->group(function (){
        Route::post('/bao-cao-nha-tuyen-dung','BaoCaoController@setBaoCao')->name('index');
    });
});

Route::namespace('QuanLyUngVien')->group(function (){
    Route::name('quanlyungvien.')->group(function (){
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien','QuanLyUngVienController@index')->name('index');
        Route::get('/nha-tuyen-dung/lay-danh-sach-ung-vien','QuanLyUngVienController@layDanhSachUngVien')->name('layDanhSachUngVien');
        Route::get('/nha-tuyen-dung/lay-danh-sach-phong-van','QuanLyUngVienController@layDanhSachPhongVan')->name('layDanhSachPhongVan');
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien/confirm-danh-sach-phong-van','QuanLyUngVienController@confirmDanhSachPhongVan')->name('confirmDanhSachPhongVan');
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien/tu-choi-danh-sach-phong-van','QuanLyUngVienController@tuChoiDanhSachPhongVan')->name('tuChoiDanhSachPhongVan');
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien/trung-tuyen-phong-van','QuanLyUngVienController@trungTuyenPhongVan')->name('trungTuyenPhongVan');
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien/cham-rot-phong-van','QuanLyUngVienController@chamRotPhongVan')->name('chamRotPhongVan');
        Route::get('/nha-tuyen-dung/quan-ly-ung-vien/get-ghi-chu','QuanLyUngVienController@getGhiChu')->name('getGhiChu');
        Route::post('/nha-tuyen-dung/quan-ly-ung-vien/luu-ghi-chu','QuanLyUngVienController@luuGhiChu')->name('luuGhiChu');
        Route::post('/nha-tuyen-dung/quan-ly-ung-vien/dat-lich-phong-van','QuanLyUngVienController@datLichPhongVan')->name('datLichPhongVan');
    });
});

Route::namespace('Password')->group(function (){
    Route::name('password.')->group(function (){
        Route::get('/quen-mat-khau','PasswordController@quenMatKhau')->name('quenMatKhau');
        Route::get('/quen-mat-khau/gui-ma-xac-nhan','PasswordController@guiMaXacNhan')->name('guiMaXacNhan');
        Route::get('/thay-doi-mat-khau','PasswordController@thayDoiMatKhau')->name('thayDoiMatKhau');

    });
});


Route::namespace('Mail')->group(function (){
    Route::name('mail.')->group(function (){
        Route::get('/thong-bao-xac-thuc-tai-khoan','MailController@xacThucTaiKhoan')->name('xacThucTaiKhoan');
        Route::get('/xac-thuc-phong-van','MailController@xacThucPhongVan')->name('xacThucPhongVan');
    });
});
Route::namespace('NhaTuyenDung')->group(function (){
    Route::name('nhatuyendung.')->group(function (){
        Route::get('/tim-kiem-ung-vien','NhaTuyenDungController@index')->name('index');
        Route::get('/tim-kiem-ung-vien/chi-tiet','NhaTuyenDungController@chiTiet')->name('chiTiet');
        Route::get('/nha-tuyen-dung/chi-tiet','ChiTietNhaTuyenDungController@chiTietNhaTuyenDung')->name('chiTietNhaTuyenDung');
    });
});

Route::namespace('NhanTin')->group(function (){
    Route::name('nhantin.')->group(function (){
        Route::get('/nhan-tin-nguoi-dung/danh-sach','NhanTinController@danhSach')->name('danhSach');
        Route::get('/nhan-tin-nguoi-dung','NhanTinController@index')->name('index');
        Route::post('/nhan-tin-nguoi-dung/nhan-tin','NhanTinController@nhanTin')->name('nhanTin');

    });
});

Route::get('/xem-chuc-nang-nha-tuyen-dung',function (){
   return view('review_nhatuyendung.index');
});
