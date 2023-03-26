<div>

    <!-- Modal -->

    @include('livewire.dashboard.apartments.modalShowImage')
    <!-- Modal add -->
    @include('livewire.dashboard.apartments.addApartment')

    <!-- Modal update -->
    @include('livewire.dashboard.apartments.updateApartment')

    {{-- ==================================== --}}

    <div class="container">
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
        @if (session()->has('message'))
            <div id="flash-message" class="alert alert-success">
                {{ session('message') }}
            </div>
            <script>
                setTimeout(function() {
                    $('#flash-message').fadeOut('fast');
                }, 1000); // Set the delay to one second (1000ms)
            </script>
        @endif
        <h2>Apartments List</h2>
        {{-- button add  --}}
        <button type="button" class="btn btn-primary" style="float: right;" wire:click="addApartment">
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
                                <a wire:click="UpdateApartment({{ $apartment->id }})" style="cursor: pointer;">
                                    <i class="material-icons" style="color: rgb(4, 230, 34);"
                                        title="Edit">&#xE254;</i></a>
                                <a wire:click="deleteApartment({{ $apartment->id }})" style="cursor: pointer;"> <i
                                        class="material-icons" style="color: red;" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $apartments->links('') }}



        </div>
        @push('scripts')
            <script>
                window.addEventListener('open-modal', event => {
                    $("#addModal").modal("show");
                });
            </script>
            <script>
                window.addEventListener('close-modal', event => {
                    $("#addModal").modal("hide");
                });
            </script>
            <script>
                window.addEventListener('open-modal1', event => {
                    $("#updateModal").modal("show");
                });
            </script>
            <script>
                window.addEventListener('close-modal1', event => {
                    $("#updateModal").modal("hide");
                });
            </script>
            <script>
                window.addEventListener('open-modal2', event => {
                    $("#showImage").modal("show");
                });
            </script>

        @endpush
    </div>
