<div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="fa-solid fa-triangle-exclamation fs-1"></i>
                        <h4 class="text-gradient text-danger mt-4">ATENÇÃO</h4>
                        <p>{{ $message }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" id="modal-notification-ok">Ok, Entendi!</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal-notification'), {
            keyboard: false
        });
        modal.show();
    });

    document.getElementById('modal-notification-ok').addEventListener('click', function() {
        var modal = bootstrap.Modal.getInstance(document.getElementById('modal-notification'));
        modal.hide();
    });
</script>
