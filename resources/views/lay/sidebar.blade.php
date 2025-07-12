<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" wire:navigate href="{{ url('/admin') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" wire:navigate href="{{ route('show.product') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        product management
                    </a>

                    <a class="nav-link collapsed" wire:navigate href="{{ route('order.show') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        orders
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start E-commerce
            </div>
        </nav>
    </div>
