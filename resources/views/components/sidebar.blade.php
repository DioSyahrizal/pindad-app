<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">Pindad App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 d-flex justify-content-between align-items-center">
            <div class="col-sm-6">
                <a href="#" class="d-block">{{auth()->user()->username}}</a>
            </div>
            <div class="col-sm-6">
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-danger block" style="width: 100%">Sign Out</button>
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            5 mm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/mu5tj" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MU5-TJ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            6 mm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/mu6tj" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MU6-TJ</p>
                            </a>
                        </li>
                    </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
