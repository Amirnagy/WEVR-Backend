@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form method="POST" action="{{ Route('addApartments') }}" class="apartment-form" enctype="multipart/form-data">
        @csrf

        @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" required value="{{ old('link') }}">
        </div>

        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="price">Price per month:</label>
            <input type="number" name="price" id="price" required value="{{ old('price') }}">
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

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required value="{{ old('location') }}">
        </div>

        @error('num_bedrooms')
            <div class="alert alert-danger" {{ old('link') }}>{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="num_bedrooms">Number of Bedrooms:</label>
            <input type="number" name="num_bedrooms" id="num_bedrooms" required value="{{ old('num_bedrooms') }}">
        </div>

        @error('num_living_rooms')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="num_living_rooms">Number of Living Rooms:</label>
            <input type="number" name="num_living_rooms" id="num_living_rooms" required
                value="{{ old('num_living_rooms') }}">
        </div>

        @error('num_bathrooms')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="num_bathrooms">Number of Bathrooms:</label>
            <input type="number" name="num_bathrooms" id="num_bathrooms" required value="{{ old('num_bathrooms') }}">
        </div>


        @error('num_parking')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="num_parking">Number of Parking:</label>
            <input type="number" name="num_parking" id="num_parking" required value="{{ old('num_parking') }}">
        </div>

        @error('num_floors')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="num_floors">Number of Floors:</label>
            <input type="number" name="num_floors" id="num_floors" required value="{{ old('num_floors') }}">
        </div>

        @error('area')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="area">Area:</label>
            <input type="number" name="area" id="area" required value="{{ old('area') }}">
        </div>


        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" required value="{{ old('description') }}"></textarea>
        </div>
        @error('features.*')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Features:</label>
            <div id="features-container">
                <div class="feature">
                    <input type="text" name="features[]" class="form-control">
                    <button type="button" class="remove-feature btn btn-danger">Remove</button>
                </div>
            </div>
            <button type="button" id="add-feature" class="btn btn-primary">Add Feature</button>
        </div>

        @error('ratings')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="ratings">Ratings:</label>
            <input type="number" name="ratings" id="ratings" required value="{{ old('ratings') }}">
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
            <button type="submit">Submit</button>
        </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var fileCount = 1;

            // Handle add file button click
            $('#addFile').click(function() {
                fileCount++;
                var newInput = $('<div class="file-upload"><label for="file' + fileCount + '">File ' +
                    fileCount + ':</label><input type="file" id="file' + fileCount +
                    '" name="files[]" class="file"><button type="button" class="remove-file">Remove</button></div>'
                );
                $('#fileUploads').append(newInput);
            });
            // Handle remove file button click
            $(document).on('click', '.remove-file', function() {
                $(this).parent().remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add new feature input field
            $('#add-feature').click(function() {
                var feature = '<div class="feature">' +
                    '<input type="text" name="features[]" class="form-control">' +
                    '<button type="button" class="remove-feature btn btn-danger">Remove</button>' +
                    '</div>';
                $('#features-container').append(feature);
            });
            // Remove feature input field
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.feature').remove();
            });
        });
    </script>
@endsection()
