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
                    <a href="{{ route('backend.dashboard.index') }}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('backend.filter.index') }}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span key="t-dashboards">Filter</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('backend.master-data.index') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Master Data</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('history-log-list'))
                <li>
                    <a href="{{ route('backend.history-log.index') }}">
                        <i class="mdi mdi-history"></i>
                        <span data-key="t-dashboard">History</span>
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