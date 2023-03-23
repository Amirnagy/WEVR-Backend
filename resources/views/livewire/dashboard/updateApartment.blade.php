<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Apartment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (session()->has('success'))
                <div id="flash-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        $('#flash-message').fadeOut('fast');
                    }, 1000); // Set the delay to one second (1000ms)
                </script>
            @endif
            <form method="POST" enctype="multipart/form-data" wire:submit.prevent='PostApartments'>
                @csrf
                @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="modal-body">
                    <label for="link">Link:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="link" @error('link') is-invalid @enderror
                            wire:model.defer="link">
                    </div>


                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="price">Price per month:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="price" required
                            @error('price') is-invalid @enderror wire:model.defer="price">
                    </div>

                    @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="location">Location:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="location" required
                            @error('location') is-invalid @enderror wire:model.defer="location">
                    </div>

                    @error('num_bedrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_bedrooms">Number of Bedrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_bedrooms" required
                            wire:model.defer="num_bedrooms">
                    </div>

                    @error('num_living_rooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="num_living_rooms">Number of Living Rooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_living_rooms" required
                            @error('num_living_rooms') is-invalid @enderror wire:model.defer="num_living_rooms">
                    </div>


                    @error('num_bathrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_bathrooms">Number of Bathrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_bathrooms" required
                            @error('num_bathrooms') is-invalid @enderror wire:model.defer="num_bathrooms">
                    </div>



                    @error('num_parking')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_parking">Number of Parking:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_parking" required
                            @error('num_parking') is-invalid @enderror wire:model.defer="num_parking">
                    </div>

                    @error('num_floors')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_floors">Number of Floors:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="num_floors" required
                            @error('num_floors') is-invalid @enderror wire:model.defer="num_floors">
                    </div>


                    @error('area')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="area">Area:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="area" required
                            @error('area') is-invalid @enderror wire:model.defer="area">
                    </div>



                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="description">Description:</label>
                    <div class="form-group">
                        <textarea class="form-control" id="description" required @error('description') is-invalid @enderror
                            wire:model.defer="description"></textarea>
                    </div>


                    @error('ratings')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="ratings">Ratings:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" id="ratings" required
                            @error('ratings') is-invalid @enderror wire:model.defer="ratings">
                    </div>


                    @error('features')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="features-container">Features : </label>
                    <label>write every feature followed by (/) :</label>
                    <div class="form-group">
                        <div id="features-container">
                            <div class="feature">
                                <input type="text" class="form-control" @error('features') is-invalid @enderror
                                    wire:model.defer="features">
                            </div>
                        </div>
                    </div>

                    <br>

                    @error('files')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div id="fileUploads">
                        <div class="file-upload">
                            <label for="file1">Photos:</label>
                            <input type="file" id="file1" class="file" @error('files') is-invalid @enderror
                                wire:model.defer="files" multiple>
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
