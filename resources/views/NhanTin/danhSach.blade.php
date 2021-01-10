@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Danh sách tin nhắn</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh sách tin nhắn</h4>
            </div>
        </div>
    </div>
    <div class="card-box">
        <div class="row center-element">
            <div class="col-sm-12 col-md-8">
                @if(count($data) > 0)
                    @foreach($data as $row)
                <a href="{{route('nhantin.index',['from'=>$row['to_tai_khoan_id'],'to'=>$row['tai_khoan_id']])}}" class="row border">
                    <div class="col-sm-6 col-md-3">
                        <img src="@if($row['get_tai_khoan']['avatar'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$row['get_tai_khoan']['avatar'])}}@else{{URL::asset(env('URL_ASSET_PUBLIC').'images/default-user-icon-8.jpg')}}@endif" style="width: 50px">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <span>{{$row['get_tai_khoan']['ho_ten']}}</span>
                    </div>
                </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @endsection
@push('scripts')
    @endpush
