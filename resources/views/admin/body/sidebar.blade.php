 <!-- Sidebar -->
 <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{asset('backend/img/poliwangi.png')}}" alt="" style="height: 65px; width: 65px;">
        </div>
        <div class="sidebar-brand-text mx-3">Admin Rental Mobil</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{'dashboard' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="{{'users/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{url('/users/view')}}">
            <i class="fas fa-solid fa-id-card"></i>
            <span>Data User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="{{'datmobs/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link collapsed" href="{{url('/datmobs/view')}}">
            </i><i class="fas fa-solid fa-car"></i>
            <span>Data Mobil</span>
        </a>
    </li>
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <li class="{{'datpens/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link collapsed" href="{{url('/datpens/view')}}">
            </i><i class="fas fa-solid fa-users"></i>
            <span>Data Penyewa</span>
        </a>
    </li>
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <li class="{{'dattrans/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link collapsed" href="{{url('/dattrans/view')}}">
            </i><i class="fas fa-credit-card"></i>
            <span>Data Transaksi</span> 
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    

    <!-- Nav Item - Charts -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <i class="fas fa-solid fa-door-closed"></i>
        <span>Log Out</span></a>
    </li>

    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
</ul>
<!-- End of Sidebar -->