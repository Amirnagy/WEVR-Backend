<div>

    @include('livewire.dashboard.discount.modaldiscount')
    <div class="container">

        <h2>Apartments List</h2>

        <div class="box">
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

            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>descrption</th>
                        <th>Price before disount</th>
                        <th>Discount</th>
                        <th>Price after disount</th>
                        <th>discount end at</th>
                        <th>Add discount</th>

                    </tr>
                </thead>
                {{-- @dd($apartments) --}}
                <tbody>
                    @foreach ($apartments as $apart)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $apart->location }}</td>
                        <td>{{ $apart->status }}</td>
                        <td title="{{ $apart->descrption }}">hover me</td>
                        <td>{{ $apart->info->yearprice }}</td>
                        <td>{{ $apart->info->discount }}</td>
                        <td>{{ $apart->info->price_after_discount }}</td>
                        <td>{{ $apart->info->discount_end_date }}</td>
                        <td>
                            <button type="button" class="modalBtn"  wire:click="discount({{ $apart->id }})">
                                Discount</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $apartments->links('') }}

        </div>
        @push('scripts')
        <script>
            window.addEventListener('show-discount', event => {
                $("#modalDiscount").modal("show");
            });
        </script>
        <script>
            window.addEventListener('hide-discount', event => {
                $("#modalDiscount").modal("hide");
            });
        </script>
        @endpush
    </div>
