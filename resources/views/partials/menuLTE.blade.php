<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.home') }}"
                class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                    <span class="right badge badge-danger">+1</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.baps.create') }}"
                class="nav-link {{ request()->is('admin/baps/create') || request()->is('admin/baps/create/*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-clipboard"></i>
                <p>
                    Input BAP
                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/baps/*') || request()->is('admin/baps') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/baps/*') || request()->is('admin/baps') ? 'active' : '' }}">
                <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
                <p>
                    Data BAP
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.baps.index') }}"
                        class="nav-link {{ request()->is('admin/baps') || request()->is('admin/baps/*') ? 'active' : '' }}">
                        <i class="far fas fa-users-cog nav-icon"></i>
                        <p>Cek BAP</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.baps.index') }}"
                        class="nav-link {{ request()->is('admin/baps/report') || request()->is('admin/baps/report/*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar nav-icon"></i>
                        <p>Report BAP</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item {{ request()->is('admin/lecturers') ||
            request()->is('admin/lecturers/*') ||
            request()->is('admin/employees') ||
            request()->is('admin/employees/*') ||
            request()->is('admin/facilities') ||
            request()->is('admin/facilities/*')
                ? 'menu-open'
                : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/lecturers') ||
                request()->is('admin/lecturers/*') ||
                request()->is('admin/employees') ||
                request()->is('admin/employees/*') ||
                request()->is('admin/facilities') ||
                request()->is('admin/facilities/*')
                    ? 'active'
                    : '' }}">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.employees.index') }}"
                        class="nav-link {{ request()->is('admin/employees') || request()->is('admin/employees/*') ? 'active' : '' }}">
                        <i class="far fas fa-users-cog nav-icon"></i>
                        <p>Employees</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.facilities.index') }}"
                        class="nav-link {{ request()->is('admin/facilities') || request()->is('admin/facilities/*') ? 'active' : '' }}">
                        <i class="far fas fa-laptop-house nav-icon"></i>
                        <p>Facilities</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.lecturers.index') }}"
                        class="nav-link {{ request()->is('admin/lecturers') || request()->is('admin/lecturers/*') ? 'active' : '' }}">
                        <i class="fa fas fa-user-tie nav-icon"></i>
                        <p>Lecturers</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.mata-kuliah.index') }}"
                        class="nav-link {{ request()->is('admin/mata-kuliah') || request()->is('admin/mata-kuliah/*') ? 'active' : '' }}">
                        <i class="fa fa-book nav-icon"></i>
                        <p>Mata Kuliah</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.rooms.index') }}"
                        class="nav-link {{ request()->is('admin/rooms') || request()->is('admin/rooms/*') ? 'active' : '' }}">
                        <i class="fa fa-building nav-icon"></i>
                        <p>Rooms</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item {{ request()->is('admin/roles/*') ||
            request()->is('admin/roles') ||
            request()->is('admin/permissions') ||
            request()->is('admin/permissions/*') ||
            request()->is('admin/users') ||
            request()->is('admin/users/*')
                ? 'menu-open'
                : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/roles/*') ||
                request()->is('admin/roles') ||
                request()->is('admin/permissions') ||
                request()->is('admin/permissions/*') ||
                request()->is('admin/users') ||
                request()->is('admin/users/*')
                    ? 'active'
                    : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Users Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                        <i class="far fas fa-unlock-alt nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}"
                        class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                        <i class="far fas fa-briefcase nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="far fas fa-user nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
