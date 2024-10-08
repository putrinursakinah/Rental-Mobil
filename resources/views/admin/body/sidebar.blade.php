 <!-- Sidebar -->
 <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
                Interface
            </div>

    <!-- Nav Item - Dashboard -->
    <li class="{{'dashboard' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    @if(Auth::user()->id == '2') <!-- Hanya untuk Super Admin -->
    <li class="{{'user/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a href="{{ route('user.view') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <span>Data User</span>
        </a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
                Menu Utama
            </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="{{'datmobs/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link collapsed" href="{{url('/datmobs/view')}}">
            </i><i class="fas fa-solid fa-car"></i>
            <span>Data Mobil</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="{{'stokmobils/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link collapsed" href="{{url('/stok_mobils/view')}}">
            </i><i class="fas fa-solid fa-car"></i>
            <span>Stok Mobil</span>
        </a>
    </li>

    <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Stok Mobil</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> -->
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <!-- <a class="collapse-item" href="{{url('/mobilmasuks/view')}}">Mobil Masuk</a>
                        <a class="collapse-item" href="{{url('/mobilkeluars/view')}}">Mobil Keluar</a>
                    </div>
                </div>
            </li> -->
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