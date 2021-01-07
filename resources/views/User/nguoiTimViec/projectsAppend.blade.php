@if($typeSend == 0)
    <tr>
        <td>{{$index}}</td>
        <td class="project-name">{{$data['name']}}</td>
        <td class="project-from text-center">{{$data['fromDate']}}</td>
        <td class="project-to text-center">{{$data['toDate']}}</td>
{{--        <td class="project-status text-center d-none" data-id="{{$data['status']['id']}}"><span--}}
{{--                class="{{$data['status']['class']}}">{{$data['status']['text']}}</span></td>--}}
        <td class="project-links"><a href="{{$data['links']}}" target="_blank">{{$data['links']}}</a></td>
        <td>
            <div class="btn-group btn-group-sm" style="float: none;">

                <button class="btn btn-warning btn-sm cap-nhat-project"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger btn-sm xoa1-project"><span class="fa fa-trash"></span></button>
            </div>

        </td>
    </tr>
@elseif($typeSend == 1)
    @if($data['nguoi_tim_viec']['projects'] != null)
{{--                @dd($data['nguoi_tim_viec']['projects'])--}}
        @foreach($data['nguoi_tim_viec']['projects'] as $row)
            <tr>
                <td class="text-primary">{{$row['id']}}</td>
                <td class="project-name">{{ucwords($row['project_name'])}}</td>
                <td class="project-from text-center">{{$row['project_from']}}</td>
                <td class="project-to text-center">{{$row['project_to']}}</td>
{{--                <td class="project-status d-none text-center" data-id="{{$row['id']}}">--}}
                    {{--                    @if(isset($row['project_status']))--}}
{{--                    @switch(intval($row['project_status']))--}}
{{--                        @case(1)--}}
{{--                        <span class="badge badge-info">{{__('Đang tiến hành')}}</span>--}}
{{--                        @break--}}
{{--                        @case(2)--}}
{{--                        <span class="badge badge-pink">{{__('Đang chờ xử lý')}}</span>--}}
{{--                        @break--}}
{{--                        @case(3)--}}
{{--                        <span class="badge badge-success">{{__('Hoàn thành')}}</span>--}}
{{--                        @break--}}
{{--                        @case(4)--}}
{{--                        <span class="badge badge-warning">{{__('Sắp có')}}</span>--}}
{{--                        @break--}}
{{--                    @endswitch--}}
                    {{--                    @endif--}}
{{--                </td>--}}
                <td class="project-links">{{$row['project_links']}}</td>
                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                @else
                    <td>
                        <div class="btn-group btn-group-sm" style="float: none;">

                            <button class="btn btn-warning btn-sm cap-nhat-project"><span class="fa fa-edit"></span>
                            </button>
                            <button class="btn btn-danger btn-sm xoa1-project"><span class="fa fa-trash"></span></button>
                        </div>

                    </td>
                @endif


            </tr>
        @endforeach
    @endif
@endif
