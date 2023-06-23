@if ($addApartment)
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true"
    wire:ignore >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Apartment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @error('price')
            {{ $message }}
            @enderror
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent='PostApartments'>
                @csrf
                <div class="modal-body">

                    @error('type')
                        {{ $message }}
                    @enderror

                    <label for="type">Type:</label>
                    <div class="form-group">
                        <select class="form-control" @error('type') is-invalid @enderror
                            id="type" name="type" wire:model.defer="type">
                            <option value="">Select Type</option>
                            <option value="1">Apartment</option>
                            <option value="2">Duplex</option>
                            <option value="3">Villa</option>
                        </select>
                    </div>

                    @error('link')
                        {{ $message }}
                    @enderror

                    <label for="link">Link:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="link" @error('link') is-invalid @enderror
                        name="link"  wire:model.defer="link">
                    </div>




                    <label for="price">Price per month:</label>

                    <div class="form-group">
                        <input class="form-control" type="number" id="price" required name="price"
                            @error('price') is-invalid @enderror wire:model.defer="price">
                    </div>

                    @error('location')
                        {{ $message }}
                    @enderror

                    <label for="location">Location:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="location" required name="location"
                            @error('location') is-invalid @enderror wire:model.defer="location">
                    </div>

                    @error('num_bedrooms')
                        {{ $message }}
                    @enderror

                    <label for="num_bedrooms">Number of Bedrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_bedrooms" required
                            wire:model.defer="num_bedrooms">
                    </div>

                    @error('num_living_rooms')
                        {{ $message }}
                    @enderror


                    <label for="num_living_rooms">Number of Living Rooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_living_rooms" name="num_living_rooms" required
                            @error('num_living_rooms') is-invalid @enderror wire:model.defer="num_living_rooms">
                    </div>


                    @error('num_bathrooms')
                        {{ $message }}
                    @enderror

                    <label for="num_bathrooms">Number of Bathrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_bathrooms" required name="num_bathrooms"
                            @error('num_bathrooms') is-invalid @enderror wire:model.defer="num_bathrooms">
                    </div>



                    @error('num_parking')
                        {{ $message }}
                    @enderror

                    <label for="num_parking">Number of Parking:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_parking" required name="num_parking"
                            @error('num_parking') is-invalid @enderror wire:model.defer="num_parking">
                    </div>

                    @error('num_floors')
                        {{ $message }}
                    @enderror

                    <label for="num_floors">Number of Floors:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_floors" required name="num_floors"
                            @error('num_floors') is-invalid @enderror wire:model.defer="num_floors">
                    </div>


                    @error('area')
                        {{ $message }}
                    @enderror

                    <label for="area">Area:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="area" required name="area"
                            @error('area') is-invalid @enderror wire:model.defer="area">
                    </div>



                    @error('description')
                        {{ $message }}
                    @enderror

                    <label for="description">Description:</label>
                    <div class="form-group">
                        <textarea class="form-control" id="description" required @error('description') is-invalid @enderror
                        name="description" wire:model.defer="description"></textarea>
                    </div>


                    @error('ratings')
                        {{ $message }}
                    @enderror

                    <label for="ratings">Ratings:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="ratings" required name="ratings"
                            @error('ratings') is-invalid @enderror wire:model.defer="ratings">
                    </div>


                    @error('features')
                        {{ $message }}
                    @enderror

                    <label for="features-container">Features : </label>
                    <label>write every feature followed by (/) :</label>
                    <div class="form-group">
                        <div id="features-container">
                            <div class="feature">
                                <input type="text" class="form-control" @error('features') is-invalid @enderror
                                name="features"   wire:model.defer="features">
                            </div>
                        </div>
                    </div>

                    <br>

                    @error('files')
                        {{ $message }}
                    @enderror

                    <div id="fileUploads">
                        <div class="file-upload">
                            <label for="file1">Photos:</label>
                            <input type="file" id="file1" class="file" @error('files') is-invalid @enderror
                            name="files"  wire:model.defer="files" multiple>
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

