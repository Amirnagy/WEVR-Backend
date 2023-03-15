@extends('layouts.app')

@section('content')
    <!-- -------------- Topbar -------------- -->
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="">
                        <span class="fa fa-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="">Dashboard</a>
                </li>
                <li class="breadcrumb-link">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-current-item">Dashboard</li>
            </ol>
        </div>

    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">

            <!-- -------------- Quick Links -------------- -->
            <div class="row">

                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                    <img src="/assets/img/pages/upload.jpg" style="height:70px; border-radius:50%; width: 70px;"  class="img-responsive mauto" alt="" />
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h4 class="text-muted"><a href=""> Upload Product</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/auction.jpg" style="height:70px; border-radius:50%; width:70px"
                                        class="img-responsive mauto" alt="" /></div>
                                <div class="col-xs-7 pl5">
                                    <h4 class="text-muted"><a href=""> Auction </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10" ><img src="{{asset('assets/img/pages/policies2.jpg')}}" style="height:70px; border-radius:50%; width:70px"
                                        class="img-responsive mauto" alt="" /></div>
                                <div class="col-xs-7 pl5">
                                    <h4 class="text-muted"><a href=""> Policies </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection
