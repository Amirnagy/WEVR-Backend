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
                <tbody>
                    @foreach ($apartments as $apart)
                        <th>{{ $loop->index + 1 }}</th>
                        <th>{{ $apart->location }}</th>
                        <th>{{ $apart->status }}</th>
                        <th title="{{ $apart->descrption }}">hover me</th>
                        <th>{{ $apart->info->yearprice }}</th>
                        <th>{{ $apart->info->discount }}</th>
                        <th>{{ $apart->info->price_after_discount }}</th>
                        <th>{{ $apart->info->discount_end_date }}</th>
                        <th>
                            <button type="button" class="modalBtn"  wire:click="discount({{ $apart->id }})">
                                Discount</button>
                        </th>
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
