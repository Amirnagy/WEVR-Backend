<div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="image-grid">
                    @if (isset($showImages) && count($showImages) > 0)
                        @foreach ($showImages as $Image)
                            <img src="{{ $Image }}" alt="">
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
