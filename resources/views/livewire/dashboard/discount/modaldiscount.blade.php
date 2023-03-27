@if ($addDiscount)
    <div class="modal fade" id="modalDiscount" tabindex="-1" role="dialog" aria-labelledby="modalDiscountTitle" wire:ignore
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Discount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" wire:submit.prevent='addDiscount({{ $Apartid }})'>
                    <div class="modal-body">
                        @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            @error('discount_end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="discount">Discount:</label>
                            <input type="number" name="discount" id="discount" class="form-control" step="0.01" @error('discount') is-invalid @enderror
                                wire:model.defer="discount" min="0" max="100" required>

                        </div>

                        <div class="form-group">

                            <label for="discount_end_date">Discount End Date:</label>
                            <input type="date" name="discount_end_date" id="discount_end_date" class="form-control" @error('discount_end_date') is-invalid @enderror
                                wire:model.defer="discount_end_date" required >

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
