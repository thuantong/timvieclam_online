@if($typeSend == 0)
    <li class="timeline-sm-item">
        <span class="timeline-sm-date time-exp"><b>{{$data['exp_from']}}</b><br>đến<br><b>{{$data['exp_to']}}</b></span>
        <div class="btn-group btn-group-sm mb-1" style="float: none;">

            <button class="btn btn-sm btn-warning mr-1 cap-nhat-exp">{{__('Cập nhật')}}</button>
            <button class="btn btn-sm btn-danger ml-1 mr-1 xoa1-exp">{{__('Xóa')}}</button>
        </div>

        <h5 class="mt-0 mb-1 company-name-exp" style="text-transform: capitalize">{{$data['cong_ty_chuc_vu']}}</h5>

        <p class="company-link-exp">{{$data['trang_web']}}</p>
        <p class="text-muted mt-2 description-exp">{{$data['mo_ta']}}</p>
    </li>
@elseif($typeSend == 1)
    @if($data['nguoi_tim_viec']['exp_lam_viec'] != null)
{{--        @dd($data['nguoi_tim_viec']['exp_lam_viec'])--}}
        @foreach($data['nguoi_tim_viec']['exp_lam_viec'] as $row)
            <li class="timeline-sm-item">
                <span class="timeline-sm-date time-exp"><b>{{$row['from_date']}}</b><br>đến<br><b>{{$row['to_date']}}</b></span>
                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                @else
                    <div class="btn-group btn-group-sm mb-1" style="float: none;">
                        <button class="btn btn-sm btn-warning mr-1 cap-nhat-exp">{{__('Cập nhật')}}</button>
                        <button class="btn btn-sm btn-danger ml-1 mr-1 xoa1-exp">{{__('Xóa')}}</button>
                    </div>
                @endif

                <h5 class="mt-0 mb-1 company-name-exp"style="text-transform: capitalize">{{$row['tenCtyVaChucVu']}}</h5>

                <p class="company-link-exp">{{$row['websites']}}</p>
                <p class="text-muted mt-2 description-exp">{{$row['mo_ta']}}</p>
            </li>
        @endforeach
    @endif
@endif
