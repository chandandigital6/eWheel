<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('asset/image/eWheels-logo-opt.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">eberries </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset/image/eWheels-logo-opt.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{ route('auth.dashboard') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banner.index') }}" class="nav-link">
                        <i class="nav-icon far fa-dailymotion"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-address-book"></i>
                        <p>
                            About Us
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('productCategoryTitle.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-address-book"></i>
                        <p>
                            productCategoryTitle
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('productCategory.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>
                            productCategory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('missionVision.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-address-book"></i>
                        <p>
                            ProductTitle
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-address-book"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('testimonial.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-fax"></i>
                        <p>
                            Features
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-fax"></i>
                        <p>
                            ContactDetails
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logo.add') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-fax"></i>
                        <p>
                            Logo
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('retails.index') }}" class="nav-link">
                        <i class="nav-icon 	fa fa-fax"></i>
                        <p>
                            Retials
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('appointment.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-american-sign-language-interpreting"></i>
                        <p>
                            Appointment
                        </p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="{{ route('team.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                            Team Member
                        </p>
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a href="{{ route('blogs.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-asterisk"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('seo.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Seo
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('auth.change-password-form') }}" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            PasswordChange
                        </p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fa fa-support"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
