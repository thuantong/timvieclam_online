@if($typeSend == 0)

    <div class="pt-1 skill">
        <h6 class="text-uppercase mt-0 mb-1 row">
            <label class="col-6 mb-0 d-flex"><input class="skill-name check-null" data-value="" data-prefix="" title=""
                                                    value="" placeholder="{{__('VD: Java')}}"><abbr
                    class="text-danger font-15 pl-1">{{__('*')}}</abbr></label>

            <span class="float-right col-6 text-right"><span
                    class="skill_value"></span> Điểm<button
                    class="btn btn-sm btn-danger pt-0 pb-0 pr-1 pl-1 ml-1 remove-skill">{{__('-')}}</button></span>

        </h6>
        <input type="text" class="skill_append" data-value="{{__('NULL')}}">
    </div>
@elseif($typeSend == 1)
    @if($data['nguoi_tim_viec']['ky_nang'] != null)
{{--        @dd($data['nguoi_tim_viec']['ky_nang'])--}}
        @foreach($data['nguoi_tim_viec']['ky_nang'] as $row)
            <div class="pt-1 skill">
                <h6 class="text-uppercase mt-0 mb-1 row">
                    <label class="col-6 mb-0 d-flex">
                        @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                            <input class="skill-name check-null" data-value="" data-prefix="" style="border: none"
                                   title="" value="{{ucfirst($row['name'])}}" placeholder="{{__('VD: Java')}}" readonly>
                        @else
                            <input class="skill-name check-null" data-value="" data-prefix=""
                                   title="" value="{{$row['name']}}" placeholder="{{__('VD: Java')}}">
                            <abbr
                                class="text-danger font-15 pl-1">{{__('*')}}</abbr>
                        @endif

                    </label>
                    @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                    @else
                        <span class="float-right col-6 text-right"><span
                                class="skill_value">{{$row['diem']}}</span> Điểm<button
                                class="btn btn-sm btn-danger pt-0 pb-0 pr-1 pl-1 ml-1 remove-skill">{{__('-')}}</button></span>
                    @endif


                </h6>
                <input type="text" class="skill_append" value="{{$row['diem']}}" data-value="{{$row['diem']}}" readonly>
            </div>
        @endforeach
    @endif
@endif
