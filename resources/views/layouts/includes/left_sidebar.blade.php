        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">

                <span class="brand-text font-weight-bold">
                    <h5 class="mb-0"><b> Bubble Soccer World </b></h5>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block text-white">
                        </a>
                    </div>
                </div> --}}

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ \Request::route()->getName() == 'home' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('email.templates') }}"
                                class="nav-link {{ \Request::route()->getName() == 'email.templates' || \Request::route()->getName() == 'show.edit.templates' ? 'active' : '' }}">
                                <i class="fa fa-envelope nav-icon"></i>
                                <p>
                                    Email Templates
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show.quotedata') }}"
                                class="nav-link {{ \Request::route()->getName() == 'show.quotedata' ? 'active' : '' }}">
                                <i class="fa fa-database nav-icon"></i>
                                <p>
                                    Show Quote Requests
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('games.list') }}"
                                class="nav-link {{ \Request::route()->getName() == 'games.list' || \Request::route()->getName() == 'games.add' || \Request::route()->getName() == 'show.edit.games' ? 'active' : '' }}">
                                <i class="fas fa-futbol futbal"></i>
                                <p class="futballp">
                                    Games Section
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.form.data') }}"
                                class="nav-link {{ \Request::route()->getName() == 'contact.form.data' ? 'active' : '' }}">
                                <i class="fa fa-address-book nav-icon" aria-hidden="true"></i>
                                <p>
                                    Contact Form Data
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
