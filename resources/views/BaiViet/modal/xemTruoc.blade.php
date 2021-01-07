<div class="modal fade bs-example-modal-lg" id="review-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bài đăng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="nav nav-pills navtab-bg nav-justified">

                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <span class="d-inline-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết rút gọn')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng rút gọn')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <div class="tab-content pt-0">

                    <div class="tab-pane fade show active border" id="profile1">
                        <div class="card-body pb-0 pt-0">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-center">
                                        <h4 class="tieu_de bg-light p-1 m-0" id="tieu_de">Đang tải...</h4></label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Mô
                                        tả công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="mo_ta_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="yeu_cau_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Quyền
                                        lợi được hưởng</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="quyen_loi_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Địa
                                        chỉ</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="dia_chi">
                                        <span>Đang tải...</span> - <a class="text-primary">--</a>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Tính
                                        chất công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 chuc_vu" id="chuc_vu">
                                        {{--                                        kiểu làm việc--}}
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Ngành
                                        nghề</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 nganh_nghe" id="nganh_nghe">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu bằng cấp</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 yc_bang_cap" id="yc_bang_cap">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu kinh nghiệm</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 kinh_nghiem" id="kinh_nghiem">
                                        Đang tải...
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border" id="messages1">
                        <div class="card-body pb-0 pt-1">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row text-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="m-0 tieu_de bg-light p-1">Đang tải...</h4>
                                        <label class="float-left">Công ty: <span class="cong_ty">Đang tải...</span></label><label class="float-right">Nhà tuyển dụng: <span id="name_nguoi_dang">Đang tải...</span></label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                <div class="row center-element text-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button class="btn btn-outline-primary"
                                                id="trang-chu-like-post">
                                            <i class="icofont icofont-thumbs-up"></i> Like
                                        </button>
                                        <button class="btn btn-outline-info"
                                                title="Chat với nhà tuyển dụng">
                                            <i class="icofont icofont-ui-text-loading "></i> Chat
                                        </button>


                                        <button class="btn btn-outline-warning"><i class="fa fa-send"></i> Nộp đơn</button>
                                        <button class="btn btn-outline-primary"><i class="fa fa-exclamation"></i> Báo cáo
                                        </button>

                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                <div class="row pt-0 pb-0 border">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-street-view"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Chức vụ:</span>
                                                <p class="mb-0">
                                                    <label class="chuc_vu">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="icofont icofont-brainstorming"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Kinh nghiệm:</span>
                                                <p class="mb-0">
                                                    <label class="kinh_nghiem">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-graduation-cap"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Yêu cầu bằng cấp:</span>
                                                <p class="mb-0">
                                                    <label class="yc_bang_cap">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-user-plus"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Số lượng cần tuyển:</span>
                                                <p class="mb-0">
                                                    <label class="so_luong_tuyen">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="icofont icofont-chart-histogram"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Ngành nghề:</span>
                                                <p class="mb-0">
                                                    <label class="nganh_nghe">Đang tải...</label>
                                                </p></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 border-left">
                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-calendar-plus-o"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Hạn nộp hồ sơ:</span>
                                                <p class="mb-0">
                                                    <label class="han_nop">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-briefcase"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Hình thức làm việc:</span>
                                                <p class="mb-0">
                                                    <label class="kieu_lam_viec">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="fa fa-transgender"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Giới tính:</span>
                                                <p class="mb-0">
                                                    <label class="gioi_tinh_tuyen">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="icofont icofont-location-pin"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Địa điểm tuyển dụng:</span>
                                                <p class="mb-0">
                                                    <label class="dia_diem">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row pt-1">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                                <label class="icofont icofont-money"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Mức lương:</span>
                                                <p class="mb-0">
                                                    <label class="muc_luong">Đang tải...</label>
                                                </p></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row pt-1 pb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0">
                                        <button class="btn btn-success float-left">Xem chi tiết</button>
                                        <button class="btn btn-info float-right">Quan tâm nhà tuyển dụng</button>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border" id="settings1">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ribbon-box iteam-click">
                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 center-element">
                                    <img src="" style="max-width: 80px;min-width: 60px">
                                </div>
                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><h5 class="mb-0"><a
                                                    href="#"><span>Đang tải...</span></a>
                                            </h5></div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><i><span>Đang tải...</span></i>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>Đang tải...</span></div>
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>Đang tải...</span></div>
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>Đang tải...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ribbon-two ribbon-two-danger floats-right"><span class="right-custom">Hot</span>
                            </div>
                            <div class="arrow-item d-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
