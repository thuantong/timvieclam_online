<input type="hidden" id="id-action" value="@if($data != null && isset($data['id'])){{$data['id']}}@endif">
<div class="form-group row">
    <div class="col-sm-12 col-md-4">
        <label>Tên ứng viên</label>
    </div>
    <div class="col-sm-12 col-md-8">
        <h4>@if($data != null && isset($data['get_nguoi_tim_viec']['get_tai_khoan']['ho_ten'])){{ucwords($data['get_nguoi_tim_viec']['get_tai_khoan']['ho_ten'])}}@endif</h4>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12 col-md-4">
        <label>Công việc ứng tuyển</label>
    </div>
    <div class="col-sm-12 col-md-8">
        <h4>@if($data != null && isset($data['get_bai_tuyen_dung']['ten_chuc_vu'])){{ucwords($data['get_bai_tuyen_dung']['ten_chuc_vu'])}}@endif</h4>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12 col-md-12">
        <label>Ghi chú</label>
    </div>
    <div class="col-sm-12 col-md-12">
        <textarea class="form-control break-custom" id="ghi-chu-text">@if($data != null && isset($data['ghi_chu'])){{$data['ghi_chu']}}@endif</textarea>
    </div>
</div>
