<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @php
                $activeClass = '';
                $setArr = ['home'];
                if(in_array(Route::currentRouteName(), $setArr))
                {
                    $activeClass = 'active';
                }
            @endphp
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('home') }}" class="nav-link {{ $activeClass }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @php
                $activeClass = '';
                $setArr = ['member-list', 'member-add'];
                if(in_array(Route::currentRouteName(), $setArr))
                {
                    $activeClass = 'active';
                }
            @endphp

            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('member-list') }}" class="nav-link {{ $activeClass }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Members
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('Logout') }}
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
      </nav>
    </div>
</aside>
