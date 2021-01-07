<input type="hidden" id="hidden-no-action" value="{{$data['id']}}">
@foreach($data['tac_vu'] as $row)
    <label class="col-sm-6 col-md-6">
        <input type="checkbox" data-plugin="switchery" data-color="#8D2226" @if(in_array($row['id'],$data['da_phan_quyen']) == true) checked @endif data-action="{{$row['id']}}"
               data-size="small">

        <span class="text-left border-left pl-1"><button class="btn btn-sm btn-danger p-0 pl-1 pr-1 xoa-mot-ta-vu d-none" data-action="{{$row['id']}}">-</button> <span>{{$row['name']}}</span></span>

    </label>
@endforeach
