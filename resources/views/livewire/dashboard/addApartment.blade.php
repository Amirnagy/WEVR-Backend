<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ Route('addApartments') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="link">Link:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="link" id="link" required value="{{ old('link') }}">
                    </div>

                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="price">Price per month:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="price" id="price" required value="{{ old('price') }}">
                    </div>

                    {{-- @error('discount')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="discount">Discount:</label>
                        <input type="number" name="discount" id="discount" required>
                    </div> --}}

                    @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="location">Location:</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="location" id="location" required value="{{ old('location') }}">
                    </div>

                    @error('num_bedrooms')
                        <div class="alert alert-danger" {{ old('link') }}>{{ $message }}</div>
                    @enderror

                    <label for="num_bedrooms">Number of Bedrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_bedrooms" id="num_bedrooms" required
                            value="{{ old('num_bedrooms') }}">
                    </div>

                    @error('num_living_rooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_living_rooms">Number of Living Rooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_living_rooms" id="num_living_rooms" required
                            value="{{ old('num_living_rooms') }}">
                    </div>

                    @error('num_bathrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_bathrooms">Number of Bathrooms:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_bathrooms" id="num_bathrooms" required
                            value="{{ old('num_bathrooms') }}">
                    </div>


                    @error('num_parking')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_parking">Number of Parking:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_parking" id="num_parking" required
                            value="{{ old('num_parking') }}">
                    </div>

                    @error('num_floors')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="num_floors">Number of Floors:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="num_floors" id="num_floors" required
                            value="{{ old('num_floors') }}">
                    </div>

                    @error('area')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="area">Area:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="area" id="area" required value="{{ old('area') }}">
                    </div>


                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="description">Description:</label>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description" required value="{{ old('description') }}"></textarea>
                    </div>


                    @error('ratings')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="ratings">Ratings:</label>
                    <div class="form-group">
                        <input class="form-control" type="number" name="ratings" id="ratings" required value="{{ old('ratings') }}">
                    </div>

                    @error('features.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="features-container">Features:</label>
                    <div class="form-group">
                        <div id="features-container">
                            <div class="feature">
                                <input type="text" name="features[]" class="form-control">
                                <button type="button" class="remove-feature btn btn-danger">Remove</button>
                            </div>
                        </div>
                        <button type="button" id="add-feature" class="btn btn-primary">Add Feature</button>
                    </div>


                    @error('files.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="fileUploads">
                        <div class="file-upload">
                            <label for="file1">File 1:</label>
                            <input type="file" id="file1" name="files[]" class="file">
                            <button type="button" class="remove-file">Remove</button>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="button" id="addFile" class="addbutton">Add Another File</button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">add</button>
                </div>
            </form>
        </div>
    </div>
</div>
