<div class="modal hide fade" id="modal-content-rut_gon" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title tieu-de-chi-tiet" id="exampleModalScrollableTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('BaiViet.contentRutGon')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-primary" id="save-exp">{{__('Cập nhật')}}</button>
            </div>
        </div>
    </div>
</div>