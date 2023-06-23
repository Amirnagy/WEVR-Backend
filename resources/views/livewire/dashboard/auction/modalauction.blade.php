@if ($addAuction)
<div class="modal fade" id="modalAuction" tabindex="-1" role="dialog" aria-labelledby="modalauctionTitle" wire:ignore.self
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add auction</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form method="POST" wire:submit.prevent='addAuction({{$Apartid}})'>
            <div class="modal-body">

                <div class="form-group">
                    <label for="base_salary">Base salary:</label>
                    <input type="number" name="base_salary" id="base_salary" class="form-control @error('base_salary') is-invalid @enderror" step="1.0"
                        wire:model.defer="base_salary" min="0" max="10000000000" >
                        @error('base_salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="auction_start_date">auction Start Date:</label>
                    <input type="datetime-local" name="auction_start_date" id="auction_start_date" class="form-control @error('auction_start_date') is-invalid @enderror"
                        wire:model.defer="auction_start_date"  >
                        @error('auction_start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="auction_end_date">auction End Date:</label>
                        <input type="datetime-local" name="auction_end_date" id="auction_end_date" class="form-control @error('auction_end_date') is-invalid @enderror"
                        wire:model.defer="auction_end_date"  >
                        @error('auction_end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
