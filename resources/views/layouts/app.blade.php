<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>WEVR</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="WEVR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    {{-- bootstrap link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- font awesone cloudflare --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/dashboard/styles.css') }}" />

    @livewireStyles
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- sidebar -->



        <div id="page-content-wrapper">
            <!-- Page header-->
            @include('layouts.header')


            @yield('content')

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                };
            </script>

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
            <script>
                $('#addModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')})
            </script>
            <script>
            // open and only close modal
            // Get the modal
            var modal = document.getElementById("myModal");
            // Get all the buttons with the class "modalBtn"
            var buttons = document.getElementsByClassName("modalBtn");
            // Loop through all the buttons and attach click event listeners
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].onclick = function() {
                    // Wait for 3 seconds before displaying the modal
                    setTimeout(function() {
                        modal.style.display = "block";
                        document.body.style.overFlowY = 'hidden';
                    }, 1000);
                }
            }
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    document.body.style.overFlowY = 'auto';
                }
            }
        </script>

            @livewireScripts

</body>

</html>
