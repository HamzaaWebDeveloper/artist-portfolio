<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe fe-home"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Route::is('service.management', 'edit.service', 'add.service') ? 'active' : '' }}">
                    <a href="{{ route('service.management') }}"><i class="fa-solid fa-hand-holding-heart"></i>
                        <span>Service  Management</span></a>
                </li>

                <li class="">
                    <a href="{{ route('review.management') }}"><i class="fa-solid fa-message"></i>
                        <span>Review Management</span></a>
                </li>

                <li class="submenu nav-icon {{ Route::is('projects.management') ? 'open' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="fs-6">Portfolio Management</span>
                        <span class="menu-arrow" style="margin-right: -12px"></span>
                    </a>
                    <ul
                        style="{{ Route::is('projects.management', 'niches.management','add.niches','edit.niche') ? 'display: block;' : 'display: none;' }}">
                        <li class="{{ Route::is('projects.management') ? 'active' : '' }}">
                            <a href="{{ route('projects.management') }}"> <span>Project Management</span></a>
                        </li>
                        <li class="{{ Route::is('niches.management','add.niches','edit.niche') ? 'active' : '' }}">
                            <a href="{{ Route('niches.management','add.niches','edit.niche') }}"> <span>Niche Management</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu nav-icon {{ Route::is('web.settings','contact.settings') ? 'open' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fa-solid fa-gear"></i>
                        <span class="fs-6">Web Settings</span>
                        <span class="menu-arrow" style="margin-right: -12px"></span>
                    </a>
                    <ul style="{{ Route::is('web.settings','contact.settings') ? 'display: block;' : 'display: none;' }}">
                        <li class="{{ Route::is('web.settings') ? 'active' : '' }}">
                            <a href="{{ route('web.settings') }}"><span>Contact Querries</span></a>
                        </li>
                        <li class="{{ Route::is('contact.settings') ? 'active' : '' }}">
                            <a href="{{ route('contact.settings') }}"> <span>Settings</span></a>
                        </li>
                    </ul>
                </li>



                {{--  <li class="{{ Route::is('portfolio.management', 'edit.service', 'add.service') ? 'active' : '' }}">
                    <a href="{{ route('portfolio.management') }}"><i class="fa-solid fa-briefcase"></i></i>
                        <span>Portfolio Management</span></a>
                </li>  --}}
                {{-- <li>
                    <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li>
                    <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li>
                    <a href="patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li>
                    <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li>
                    <a href="transactions-list.html"><i class="fe fe-activity"></i>
                        <span>Transactions</span></a>
                </li>
                <li>
                    <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>  --}}
                {{--  <li class="menu-title">
                    <span>Pages</span>
                </li>  --}}
                {{--  <li>
                    <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html"> Form Mask </a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li>  --}}
            </ul>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.submenu > a').forEach(function(menu) {
        menu.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            const parent = menu.parentElement;

            // Toggle open class
            parent.classList.toggle('open');

            // Close other open menus (optional, for exclusive open)
            document.querySelectorAll('.submenu').forEach(function(item) {
                if (item !== parent) {
                    item.classList.remove('open');
                }
            });
        });
    });
</script>
<!-- /Sidebar -->
