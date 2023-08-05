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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="true" role="menu">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li id="5mm-parent" class="nav-item">
                    <a id="5mm" href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            5 mm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <x-mu5tj-menu/>
                        <li class="nav-item ml-3">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MU-5H</p>
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
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <script>
        $(document).ready(function () {
            // Get the current URL path and extract the part after the domain
            const currentPath = window.location.pathname.split('/');
            currentPath.shift();
            const firstPath = currentPath[0];
            const lastPath = currentPath[currentPath.length - 1]
            // Find the link with the matching href attribute and add the 'active' class to it
            $('#' + firstPath).addClass('active');
            $('#' + lastPath).addClass('active');

            currentPath.forEach((path) => {
                $('#' + path).parents('ul').removeAttr('style').css({
                    'display': 'block'
                }).addClass(' menu-open');
            });
            // Find the link with the matching href attribute and open its parent treeview
            $('a[href="' + currentPath + '"]').parents('.treeview').addClass('menu-open');
        });
    </script>
</aside>
