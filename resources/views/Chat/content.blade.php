@if(count($data) > 0)

@foreach($data as $row)
{{--    @dd($row['from_tai_khoan_id'] == \Illuminate\Support\Facades\Auth::user()->id)--}}
    @if($row['tai_khoan_id'] == \Illuminate\Support\Facades\Auth::user()->id)
        <div class="row my-message">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 my-message center-element">
                <div class="font-10 nowrap"></div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 p-1 ">
                <div class="p-2 bg-primary" style="border-radius: 10px">{{$row['noi_dung']}}</div>
            </div>
        </div>
        @else
        <div class="row their-message">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 p-1">
                <div class="p-2 border" style="border-radius: 10px;">{{$row['noi_dung']}}</div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 my-message center-element">
                <div class="font-10 nowrap"></div>
            </div>
        </div>

@endif


@endforeach
@endif
