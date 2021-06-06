<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
    <div class="card-box mb-0 pb-2">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="m-0 tieu_de bg-light p-1 tieu-de-chi-tiet"></h4>
                
            </div>

        </div>
        @if(intval(Session::get('loai_tai_khoan')) == 1)

        
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                <div class="row center-element text-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button class="btn btn-outline-primary waves-effect trang-chu-like-post"
                                id="trang-chu-like-post">
                            <i class="icofont icofont-thumbs-up">Lưu bài</i>
                        </button>
                        

                        <a
                            class="btn btn-outline-warning waves-effect position-relative call-modal-nop-don">
                            <i class="text-dark fa fa-send">{{' Nộp đơn'}}</i>

                        </a>
                        <a
                            class="btn btn-outline-info like-animation waves-effect position-relative call-nhan-tin-tuyen-dung">

                                <i class="fa fa-commenting-o"></i> Nhắn tin với NTD


                            
                        </a>
                

                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
    
</div>

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1 content-detail-left" id="content-detail-left" style="overflow: auto;">
     

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    
                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1" class="float-right btn btn-sm p-0 btn-primary element hide"><i class="fa fa-expand"></i></a>
                    <small class="float-right pr-1">Mô tả ngắn</small>
                </div>

            </div>
            <div id="cardCollpase1" class="collapse hide">
                <div class="row pt-0 pb-0 border">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-street-view"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Chức vụ:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 chuc_vu">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>
                         
                            </div>
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="icofont icofont-brainstorming"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Kinh nghiệm:</label>
                              
                                <div class="row">
                                    <div class="col-md-12 pb-2 kinh_nghiem">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-graduation-cap"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Yêu cầu bằng cấp:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 yc_bang_cap">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-user-plus"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Số lượng cần tuyển:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 so_luong_tuyen">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="icofont icofont-chart-histogram"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Ngành nghề:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 nganh_nghe">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 border-left">
                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-calendar-plus-o"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Hạn nộp hồ sơ:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 han_nop">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-briefcase"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Hình thức làm việc:</label>

                                <div class="row">
                                    <div class="col-md-12 pb-2 kieu_lam_viec">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="fa fa-transgender"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Giới tính:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 gioi_tinh_tuyen">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row border-bottom pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="icofont icofont-location-pin"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Địa điểm tuyển dụng:</label>
                                <div class="row">
                                    <div class="col-md-12 pb-2 dia_diem">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row pt-1">
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                <label class="icofont icofont-money"></label>
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <label>Mức lương:</label>

                                <div class="row">
                                    <div class="col-md-12 pb-2 muc_luong">
                                        <div class="bg-light w-100 mb-1 box-thumbnail"
                                             style="height: 25px"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
   


    
    
    @include('CongTy.gioiThieu')
    @include('BaiViet.chiTiet.index')
    
    {{-- <div class="row pt-1 pb-0">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center p-0">
            <a class="btn btn-success float-left" id="xem-chi-tiet-rut-gon">Xem chi tiết</a>


        </div>
        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 text-right p-0">
            
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center p-0">
        

        </div>

    </div> --}}
    
</div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1 pl-0 border-top">
        <div class="row center-element">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-left">
                <a class="btn btn-success float-left xem-chi-tiet-rut-gon" id="xem-chi-tiet-rut-gon">Xem chi tiết</a>
            </div>
            <small class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-left">
                Thích: <small class="tong-luot-thich">100</small>
            </small>
            <small class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right">
                Ứng tuyển: <small class="tong-ung-tuyen">100</small>
            </small>
        </div>
    </div>