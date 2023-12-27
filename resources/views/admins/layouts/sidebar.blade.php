<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                {{-- <div class="logo-img">
                   <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">
                </div> --}}
                <span class="text">Dashboard</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href={{url('dashboard')}}><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                 {{--    <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div> --}}

                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Doctor</span> </a>
                        <div class="submenu-content">
                            <a href="{{route('doctor.index')}}" class="menu-item">View Doctors</a>
                            <a href="{{route('doctor.create')}}" class="menu-item">Create Doctors</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment</span> </a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">Create Appointment</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">Check Appointment</a>
                        </div>
                    </div>
                    @endif


                    @if(auth()->check()&&auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients Status</span> </a>
                        <div class="submenu-content">
                            <a href="{{route('patientlist')}}" class="menu-item">Today's Appointments</a>
                            <a href="{{route('appointment.all')}}" class="menu-item">All Appointments</a>

                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Department</span> </a>
                        <div class="submenu-content">
                            <a href="{{route('department.create')}}" class="menu-item">Add Departments</a>
                            <a href="{{route('department.index')}}" class="menu-item">View Department</a>

                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&&auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span> </a>
                        <div class="submenu-content">
                            <a href="{{route('patients.today')}}" class="menu-item">View Patients</a>
                            <a href="{{route('prescribes.patients')}}" class="menu-item">All Patients</a>
                        </div>
                    </div>
                    @endif

                    <div class="nav-item active">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i><span>Log Out</span></a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </div>
        </div>
    </div>
