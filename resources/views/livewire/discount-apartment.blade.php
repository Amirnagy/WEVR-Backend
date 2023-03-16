<div>
    <div class="content">

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
                                                            <button type="button" class="btn btn-primary"
                                                                data-toggle="modal" data-target="#myModal"
                                                                data-images="{{ json_encode($imageUrls) }}"
                                                                wire:click="showImages({{ $apartment->id }})">View
                                                                Images
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="discount" id="">
                                                            <input type="submit" value="save">
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators"></ol>
                        <div class="carousel-inner"></div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var imageUrls = JSON.parse(button.data('images')) // Extract image URLs from data attribute
            var carouselInner = $(this).find('.carousel-inner') // Carousel inner HTML element
            var carouselIndicators = $(this).find('.carousel-indicators') // Carousel indicators HTML element

            // Update the carousel inner HTML
            var carouselInnerHtml = ''
            var carouselIndicatorsHtml = ''
            for (var i = 0; i < imageUrls.length; i++) {
                var activeClass = (i === 0) ? ' active' : ''
                carouselInnerHtml += '<div class="carousel-item' + activeClass + '"><img src="' + imageUrls[i] +
                    '" class="d-block w-100"></div>'
                carouselIndicatorsHtml += '<li data-target="#carouselExampleIndicators" data-slide-to="' + i +
                    '" class="' + activeClass + '"></li>'
            }
            carouselInner.html(carouselInnerHtml)
            carouselIndicators.html(carouselIndicatorsHtml)
        })
    </script>

</div>
