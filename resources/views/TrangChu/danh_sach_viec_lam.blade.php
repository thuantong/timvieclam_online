@extends('master.index')
@section('content')
    {{--    @dd($type) --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{URL::asset('/')}}">Việc làm</a></li>
                        <li class="breadcrumb-item active">Xem việc làm theo
                            @switch(intval($type))
                                @case(1)
                                địa điểm
                                @break
                                @case(2)
                                ngành nghề
                                @break
                                @case(3)
                                kiểu làm việc
                                @break
                                @case(4)
                                chức vụ
                                @break
                            @endswitch
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">Xem việc làm theo @switch(intval($type))
                        @case(1)
                        địa điểm
                        @break
                        @case(2)
                        ngành nghề
                        @break
                        @case(3)
                        kiểu làm việc
                        @break
                        @case(4)
                        chức vụ
                        @break
                    @endswitch</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-box p-1 mb-1 text-center">
                <div class="row center-element">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            @switch(intval($type))
                                @case(1)
                                @foreach($dia_diem as $row)
                                    <a class="col-sm-4 col-md-4 text-left"
                                       href="{{URL::asset('/?dia_diem='.$row['id'])}}"><small
                                            class="fa fa-circle font-10 pr-1"></small><span
                                            class="font-20">{{$row['name']}}</span></a>
                                @endforeach
                                @break
                                @case(2)
                                @foreach($nganh_nghe as $row)
                                    <a class="col-sm-4 col-md-4 text-left"
                                       href="{{URL::asset('/?nganh_nghe='.$row['id'])}}"><small
                                            class="fa fa-circle font-10 pr-1"></small><span
                                            class="font-20">{{$row['name']}}</span></a>
                                @endforeach
                                @break
                                @case(3)
                                @foreach($kieu_lam_viec as $row)
                                    <a class="col-sm-4 col-md-4 text-left"
                                       href="{{URL::asset('/?kieu_lam_viec='.$row['id'])}}"><small
                                            class="fa fa-circle font-10 pr-1"></small><span
                                            class="font-20">{{$row['name']}}</span></a>
                                @endforeach
                                @break
                                @case(4)
                                @foreach($chuc_vu as $row)
                                    <a class="col-sm-4 col-md-4 text-left"
                                       href="{{URL::asset('/?chuc_vu='.$row['id'])}}"><small
                                            class="fa fa-circle font-10 pr-1"></small><span
                                            class="font-20">{{$row['name']}}</span></a>
                                @endforeach
                                @break
                            @endswitch


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
