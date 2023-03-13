<!--Sidebar-->
{{-- <div class="sidebar-widget author-widget"> --}}
    {{-- photo of user  --}}
    {{-- <div class="media"> --}}
        {{-- <a href="/profile" class="media-left"> --}}
            {{-- @if (isset(Auth::user()->employee->photo))
                <img src="{{asset('photos/'.Auth::user()->employee->photo)}}" width="40px" height="30px" class="img-responsive">
            @else --}}
            {{-- <img src="{{ asset('assets/img/avatars/WevrLogo.jpg') }}" class="img-responsive"> --}}
            {{-- @endif --}}

        {{-- </a> --}}
    {{-- </div> --}}
{{-- </div> --}}

<!-- Sidebar Menu  -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a href="">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>


    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-bank"></span>
            <span class="sidebar-title">Apartment</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{Route('showApartments')}}">
                    <span class="fa fa-adn"></span> Add Apartment </a>
            </li>
            <li>
                <a href="">
                    <span class="glyphicon glyphicon-calendar"></span> Apartment Listings </a>
            </li>

        </ul>
    </li>

    <li>
        <a class="accordion-toggle" href="">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Mails</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Mails </a>
            </li>

        </ul>
    </li>


    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-trophy"></span>
            <span class="sidebar-title">discount</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{Route('discount')}}">
                    <span class="fa fa-adn"></span> Add discount</a>
            </li>
            <li>
                <a href="/award-listing">
                    <span class="glyphicon glyphicon-calendar"></span> discount Listings </a>
            </li>
        </ul>
    </li>



    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Auctions</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="#">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="/create-meeting">
            <span class="fa fa-calendar-o"></span>
            <span class="sidebar-title"> Meeting </span>
        </a>
    </li>

    <li>
        <a href="/hr-policy">
            <span class="fa fa-gavel"></span>
            <span class="sidebar-title"> Company Policy </span>
        </a>
    </li>
</ul>
