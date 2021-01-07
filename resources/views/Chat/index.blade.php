<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none container-chat">
    <div class="row" style="background-color: rgba(95,152,255,1);z-index: 0">
        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 header-chat" >
            <h5>Nguyễn thái sươn</h5>

        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element p-0">

        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element p-0">
            <button class="btn btn-danger btn-sm float-right" id="closed-chat">x</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-3 border content-chat overflow-auto-scroll bg-white">
            @include('Chat.content')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0 footer-chat">
            <div class="input-group" style="bottom: 0px!important;">
                <input type="text" class="form-control" value="xxxas">
                <button class="btn btn-primary">x</button>
            </div>
        </div>
    </div>


</div>
