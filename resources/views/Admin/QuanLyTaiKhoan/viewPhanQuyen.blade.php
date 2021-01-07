<input type="hidden" id="action-phan-quyen" value="{{$data['id']}}">
@if($data['phan_quyen'] != null)
@foreach($data['phan_quyen'] as $row)
    <label class="col-sm-12 col-md-12">
        <input type="radio" data-plugin="switchery" name="check_phan_quyen" data-color="#8D2226" @if(in_array($row['id'],$data['tai_khoan_phan_quyen']) == true) checked @endif data-action="{{$row['id']}}"
               data-size="small">
{{--            <input type="radio" name="check_phan_quyen">--}}
        <span class="text-left border-left pl-1"><button class="btn btn-sm btn-danger p-0 pl-1 pr-1 xoa-mot-ta-vu d-none" data-action="{{$row['id']}}">-</button> <span>{{$row['name']}}</span></span>

    </label>
    @endforeach
@endif
