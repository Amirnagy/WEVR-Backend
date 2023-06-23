<div>

    @include('livewire.dashboard.auction.modalauction')
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
                        <th> id </th>
                        <th> Location </th>
                        <th> Status </th>
                        <th> descrption </th>
                        <th> starting_price </th>
                        <th> final price </th>
                        <th> start_at </th>
                        <th> end_at </th>
                        <th> Auction </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apart )

                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$apart->location ?? 'no info available'}}</td>
                        <td>{{$apart->status ?? 'no info available' }}</td>
                        <td title="{{ $apart->descrption ?? 'no info available'}}">hover me</td>
                        <td>{{$apart->auction->starting_price ?? 'Auction not created yet'}}</td>
                        <td>{{$apart->auction->final_price ?? 'Auction not created yet'}}</td>
                        <td>{{$apart->auction->start_at ?? 'Auction not created yet'}}</td>
                        <td>{{$apart->auction->end_at ?? 'Auction not created yet'}}</td>
                        <td>
                            <button type="button" class="modalBtn" wire:click="showAuction({{$apart->id}})" >
                                Auction</button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $apartments->links('') }}

        </div>
        @push('scripts')
            <script>
                window.addEventListener('show-auction', event => {
                    $("#modalAuction").modal("show");
                });
            </script>
            <script>
                window.addEventListener('hide-Auction', event => {
                    $("#modalAuction").modal("hide");
                });
            </script>

        @endpush
    </div>
