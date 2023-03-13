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
                                    <input type="text" class="field form-control" placeholder="query string" style="height:40px" value="" name="string">
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
                                            <th class="text-center">Address</th>
                                            <th class="text-center">location</th>
                                            <th class="text-center">dimensions</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Images</th>
                                            <th class="text-center">Add Discount</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr style="text-align: center">
                                            <td colspan="1">
                                                1
                                            </td>
                                            <td >
                                                2
                                            </td>
                                            <td >
                                                3
                                            </td>
                                            <td >
                                                4
                                            </td>
                                            <td >
                                                5
                                            </td>
                                            <td >
                                                6
                                            </td>
                                            <td >
                                                <button class="btn btn-primary" onclick="openOrderPop()"> show</button>
                                            </td>
                                            <td >
                                                8
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </div>
    <div class="text-pop">
        <div className="pop-content">
            <div className="close-icon" onClick={closePop}>
                <i className="bi bi-x-lg"></i>
            </div>
            <img src="{{asset('assets/img/pages/products/Rectangle 176.png')}}" alt="" />
        </div>
    </div>
</div>
