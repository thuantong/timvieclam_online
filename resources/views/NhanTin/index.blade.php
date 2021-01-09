@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Tin nhắn</li>
                    </ol>
                </div>
                <h4 class="page-title">Tin nhắn</h4>
            </div>
        </div>
    </div>

    @include('Chat.index')
    @endsection
@push('scripts')
    @endpush
