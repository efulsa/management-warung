<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-uppercase">{{ Auth::user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class=""></li>
                <li class="nav-header">GENERAL</li>
                <li class="nav-item">
                    @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->is('admin/dashboard*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    @else
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{(request()->is('user/dashboard*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    @endif
                </li>
                <li class="nav-header">MENU</li>
                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}" class="nav-link {{(request()->is('admin/customer*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Manage Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.transaction') }}" class="nav-link {{(request()->is('admin/transaction*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-hand-holding-usd"></i>
                        <p>
                            Manage Pinjaman
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('user.transaction') }}" class="nav-link {{(request()->is('user/transaction*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-hand-holding-usd"></i>
                        <p>
                            Riwayat Pinjaman
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">PENGATURAN</li>
                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.setting.edit') }}" class="nav-link {{(request()->is('admin/setting*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Manage Akun
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('admin.setting.edit') }}" class="nav-link {{(request()->is('user/setting*')) ? 'active' : ''}}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Manage Akun
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
