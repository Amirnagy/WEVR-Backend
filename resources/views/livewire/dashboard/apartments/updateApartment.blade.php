@if ($updateApartment)

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true"
wire:ignore>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Apartment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" wire:submit.prevent='postUpdate({{$IDapartment}})'>
                @csrf
                @error('update_link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="modal-body">
                    <label for="update_link">Link:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="update_link" @error('update_link') is-invalid @enderror
                            wire:model.defer="update_link" name="update_link">
                    </div>


                    @error('update_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_price">Price per month:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_price" required name="update_price"
                            @error('update_price') is-invalid @enderror wire:model.defer="update_price">
                    </div>

                    @error('update_location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_location">Location:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="update_location" required name="update_location"
                            @error('update_location') is-invalid @enderror wire:model.defer="update_location">
                    </div>

                    @error('update_num_bedrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_num_bedrooms">Number of Bedrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="update_num_bedrooms" required id="update_num_bedrooms"
                            wire:model.defer="update_num_bedrooms">
                    </div>

                    @error('update_num_living_rooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="update_num_living_rooms">Number of Living Rooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_num_living_rooms" required name="update_num_living_rooms"
                            @error('update_num_living_rooms') is-invalid @enderror wire:model.defer="update_num_living_rooms">
                    </div>


                    @error('update_num_bathrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_num_bathrooms">Number of Bathrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_num_bathrooms" required name="update_num_bathrooms"
                            @error('update_num_bathrooms') is-invalid @enderror wire:model.defer="update_num_bathrooms">
                    </div>



                    @error('update_num_parking')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_num_parking">Number of Parking:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_num_parking" required name="update_num_parking"
                            @error('update_num_parking') is-invalid @enderror wire:model.defer="update_num_parking">
                    </div>

                    @error('update_num_floors')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_num_floors">Number of Floors:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_num_floors" required name="update_num_floors"
                            @error('update_num_floors') is-invalid @enderror wire:model.defer="update_num_floors">
                    </div>


                    @error('update_area')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_area">Area:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_area" required name="update_area"
                            @error('update_area') is-invalid @enderror wire:model.defer="update_area">
                    </div>



                    @error('update_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_description">Description:</label>
                    <div class="form-group">
                        <textarea class="form-control" id="update_description" required @error('update_description') is-invalid @enderror
                            name="update_description" wire:model.defer="update_description"></textarea>
                    </div>


                    @error('update_ratings')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_ratings">Ratings:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="update_ratings" required name="update_ratings"
                            @error('update_ratings') is-invalid @enderror wire:model.defer="update_ratings">
                    </div>


                    @error('update_features')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="update_features">Features : </label>
                    <label>write every feature followed by (/) :</label>
                    <div class="form-group">
                        <div id="update_features">
                            <div class="feature">
                                <input type="text" class="form-control" @error('update_features') is-invalid @enderror
                                    name="update_features" wire:model.defer="update_features">
                            </div>
                        </div>
                    </div>

                    <br>

                    @foreach ($update_apartmentImages as $image )
                        <img src="{{$image}}" alt="">
                    @endforeach
                    @error('update_files')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div id="update_files">
                        <div class="file-upload">
                            <label for="update_files">Photos:</label>
                            <input type="file" id="update_files" class="file" @error('update_files') is-invalid @enderror name="update_files"
                                wire:model.defer="update_files" multiple>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value='add'>
                </div>
            </form>
        </div>
    </div>
</div>

@endif
