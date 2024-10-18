<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav sidebar-toggle  nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
        role="menu"
        data-accordion="true">
        @canany(['permission.show', 'roles.show', 'user.show'])
            <li class="nav-item has-treeview ">
                <a href="#"
                   class="nav-link {{ Request::is('adminpermissions*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Tuzilma
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"
                    style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">
                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('adminpermissions.index') }}"
                               class="nav-link {{ Request::is('adminpermissions*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Ruxsatlar</p>
                            </a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ Request::is('role*') ? 'active' : '' }}">
                                <i class="fas fa-user-lock"></i>
                                <p>Rollar</p>
                            </a>
                        </li>
                    @endcan

                    @can('user.show')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                <i class="fas fa-user-friends"></i>
                                <p>Foydalanuvchilar</p>
                            </a>
                        </li>
                    @endcan
                </ul>

            </li>


            <li class="nav-item has-treeview ">
                <a href="#"
                   class="nav-link {{ Request::is('adminpermissions*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Turar joy
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"
                    style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">

                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('buildings.index') }}"
                               class="nav-link {{ Request::is('buildings*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Binolar</p>
                            </a>
                        </li>
                    @endcan

                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}"
                               class="nav-link {{ Request::is('rooms*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Xonalar</p>
                            </a>
                        </li>
                    @endcan

                </ul>

            </li>

            <li class="nav-item has-treeview ">
                <a href="#"
                   class="nav-link {{ Request::is('guests*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Mehmonlar
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview"
                    style="display: {{ Request::is('guests*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">

                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('guests.index') }}"
                               class="nav-link {{ Request::is('guests*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Mehmonlar</p>
                            </a>
                        </li>
                    @endcan

                     @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('citizenships.index') }}"
                               class="nav-link {{ Request::is('citizenships*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Mamlakatlar</p>
                            </a>
                        </li>
                    @endcan


                </ul>
            </li>
        @endcanany


    </ul>
</nav>
<!-- /.sidebar-menu -->
