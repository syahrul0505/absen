<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if(auth()->user()->can('dashboard') || auth()->user()->can('master-data') || auth()->user()->can('history-log-list'))
                <li class="menu-title" key="t-menu">Menu</li>
                @endif

                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('backend.absen.index') }}" class="waves-effect">
                        <i class="fas fa-address-card"></i>
                        <span key="t-dashboards">Absen</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('backend.report.index') }}" class="waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-dashboards">Report</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('backend.master-data.index') }}" class="waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-dashboards">Master Data</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="#" onclick="logout()" class="nav-link">
                        <i class="mdi mdi-logout"></i>
                        <span data-key="t-dashboard">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->