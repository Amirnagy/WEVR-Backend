@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white  d-flex justify-content-around align-items-center rounded">
                <div>
                    <h6 style="color: rgb(85, 85, 85);">Upload Product</h6>

                </div>
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                        class="fas fa-cloud-upload-alt fs-3   rounded-full secondary-bg p-3 "
                        style="color: #4154f1;
                    background: #f6f6fe; "></i>
                </div>
                <!--<i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>-->
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white  d-flex justify-content-around align-items-center rounded">
                <div>
                    <h6 style="color:rgb(85, 85, 85);">Auction</h6>

                </div>
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                        class="fas fa-gavel fs-3   rounded-full secondary-bg p-3 "
                        style="color: #2eca6a;
                    background: #e0f8e9; "></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white  d-flex justify-content-around align-items-center rounded">
                <div>
                    <h6 style="color:rgb(85, 85, 85);">Policies</h6>

                </div>
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                        class="fas fa-file-contract fs-3   rounded-full secondary-bg p-3 "
                        style="color: #ff771d;
                    background: #ffecdf; "></i>
                </div>
            </div>
        </div>


    </div>
    <!-- /#page-content-wrapper -->
</div>
@endsection
