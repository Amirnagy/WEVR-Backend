<div class="bg-white" id="sidebar-wrapper">
    <div class="align-content-center">
        <img src="{{ asset('assets/dashboard/logo-01.png') }}"
            style="height: 100px; width: 170px;  padding: 0.875rem 1.25rem;" alt="logo">
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-3" style="color: rgb(164, 224, 189);"></i>Dashboard</a>
        <a href="{{ Route('showApartments') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-home me-3" style="color: rgb(255, 227, 189);"></i>Apartment</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-mail-bulk me-3" style="color: rgb(248, 178, 216);"></i>Mails</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-trophy me-3" style="color: rgb(248, 193, 171);"></i>Discount</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-gavel me-3" style="color: rgb(220, 213, 255);"></i>Auctions</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-handshake me-3" style="color: rgb(250, 225, 192);"></i>Meetings</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-file-contract me-3 " style="color: rgb(139, 136, 132);"></i>Company Policy</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"> <i
                class="fas fa-power-off me-3"></i>Logout
                    </a>

                </form>
    </div>
</div>
