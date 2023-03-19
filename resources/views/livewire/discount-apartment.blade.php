<div>
    <div class="content">

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="image-grid">
                    @if (isset($apartmentImages) && count($apartmentImages) > 0)
                        @foreach ($apartmentImages as $apartment)
                            <img src="{{ $apartment }}" alt="">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href=""> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Discount </a>
                    </li>
                    <li class="breadcrumb-current-item"> Make Discount</li>
                </ol>
            </div>
        </header>



        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs">Apartment Lists</span><br />
                                </div><br />

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <input type="text" class="field form-control" placeholder="query string"
                                                style="height:40px" value="" name="string">
                                        </div>

                                        <div class="text-right">
                                            <input type="submit" value="Search" name="button" class="btn btn-primary">
                                        </div>


                                    </div>
                                </div>
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                <script>
                                            setTimeout(function() {
                                                $('.alert-success').remove();
                                            }, 3000);
                                </script>
                                <div class="panel-body pn">

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Aprtment</th>
                                                    <th class="text-center">location</th>
                                                    <th class="text-center">dimensions</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Images</th>
                                                    <th class="text-center">Add Discount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($apartments as $apartment)
                                                    <tr style="text-align: center">

                                                        <td colspan="1">
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td>
                                                            <img src="{{ $apartment->vrlink }}" alt="">
                                                        </td>
                                                        <td>
                                                            {{ $apartment->location }}
                                                        </td>
                                                        <td>
                                                            {{ $apartment->dimensions }} m
                                                        </td>
                                                        <td>
                                                            {{ $apartment->status }}
                                                        </td>
                                                        <td>

                                                            <button class="modalBtn"
                                                                wire:click="showImage({{ $apartment->id }})"> view
                                                                image</button>
                                                        </td>
                                                        <td>

                                                            <input type="number"
                                                                wire:model="discounts.{{ $apartment->id }}"
                                                                style="width: 35%;padding: 2px;border-radius: 5px
                                                                border: 1px solid #ccc;">
                                                            <button
                                                                wire:click="addDiscount({{ $apartment->id }})">
                                                            add</button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $apartments->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
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
                }, 2000);
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
</div>
