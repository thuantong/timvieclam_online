<div class="modal fade" id="modal-tac-vu" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Tạo mới tác vụ')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row center-element">
                   <div class="col-sm-11 col-md-11 pt-2 pb-2 border">
                       <div class="form-group row">
                           <label class="col-sm-12 col-md-4 center-element">Tên tác vụ:</label>
                           <div class="col-sm-12 col-md-8">
                               <input class="form-control not-null" id="ten-tac-vu" title="Tên tác vụ">
                               <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label class="col-sm-12 col-md-4 center-element">Mô tả:</label>
                           <div class="col-sm-12 col-md-8">
                               <textarea class="form-control" id="mo-ta" title="Mô tả"></textarea>
                               <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">{{__('Thoát')}}</button>
                                <button type="button" class="btn btn-primary float-right" id="save">{{__('Lưu lại')}}</button>
            </div>
        </div>
    </div>
</div>
