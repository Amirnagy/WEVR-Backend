<div>
    {{-- add table and button for add apartment by modal --}}

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div id="myModal" class="modal" wire:ignore>
        <div class="modal-content">
            <div class="modal-body">
                <div class="image-grid">

                    <img src="http://127.0.0.1:8000/gallaryaprtments/4384891679258754Rectangle 176.png" alt="">
                    <img src="http://127.0.0.1:8000/gallaryaprtments/7652811679258754Rectangle 177.png" alt="">
                    <img src="http://127.0.0.1:8000/gallaryaprtments/8181161679258754Rectangle 178.png" alt="">
                    {{-- @if (isset($apartmentImages) && count($apartmentImages) > 0)
                        @foreach ($apartmentImages as $apartmentImage)
                            <img src="{{ $apartmentImage }}" alt="">
                        @endforeach
                    @endif --}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add -->
    @include('livewire.dashboard.addApartment')

    <!-- Modal update -->
    @include('livewire.dashboard.updateApartment')

    {{-- ==================================== --}}

    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <h2>Apartments List</h2>
        {{-- button add  --}}
        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addModal">
            add apartment
        </button>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>dimensions</th>
                        <th>descrption</th>
                        <th>features</th>
                        <th>livingroom</th>
                        <th>bedroom</th>
                        <th>parking</th>
                        <th>baths</th>
                        <th>floors</th>
                        <th>Gallery</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <th>{{ $apartment->info->yearprice }}</th>
                            <th>{{ $apartment->location }}</th>
                            <th>{{ $apartment->status }}</th>
                            <th>{{ $apartment->dimensions }}</th>
                            <th title="{{ $apartment->descrption }}">hoverme</th>
                            <th title="@foreach ($apartment->features as $feature){{ $feature }} @endforeach">
                                features
                            </th>
                            <th>{{ $apartment->info->livingroom }}</th>
                            <th>{{ $apartment->info->bedroom }}</th>
                            <th>{{ $apartment->info->parking }}</th>
                            <th>{{ $apartment->info->baths }}</th>
                            <th>{{ $apartment->info->floors }}</th>
                            <th>
                                <button class="modalBtn" wire:click="showImage({{ $apartment->id }})"> view
                                    image</button>
                            </th>
                            <td>
                                <a data-toggle="modal" data-target="#updateModal" href="#">
                                    <i class="material-icons" style="color: rgb(4, 230, 34);"
                                        title="Edit">&#xE254;</i></a>
                                <a href="#"> <i class="material-icons" style="color: red;"
                                        title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        
    </div>
