<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Get Started -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#project"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="project" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/users') }}">Users</a>
                    </nav>
                </div>
                {{-- Pokemon Types --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Types"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    All Pokemon Types
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="Types" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/supertypes') }}">Super Types</a>
                        <a class="nav-link" href="{{ url('admin/subTypes') }}">Sub Types</a>
                        <a class="nav-link" href="{{ url('admin/types') }}">Types</a>
                        <a class="nav-link" href="{{ url('admin/resistances') }}">Resistances</a>
                        <a class="nav-link" href="{{ url('admin/weaknesses') }}">Weaknesses</a>
                    </nav>
                </div>

                {{-- Main Card  --}}

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Card"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Main Card
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="Card" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/cards') }}">Card</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
