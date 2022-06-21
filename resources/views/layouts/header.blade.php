 <header class="topbar" data-navbarbg="skin6">
     <nav class="navbar top-navbar navbar-expand-md navbar-light">
         <div class="navbar-header" data-logobg="skin6">
             <!-- ============================================================== -->
             <!-- Logo -->
             <!-- ============================================================== -->
             <a class="navbar-brand" href="{{url('/')}}">
                 <!-- Logo icon -->
                 <b class="logo-icon">
                     <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                     <!-- Dark Logo icon -->
                     <img src="{{url('flexy/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                     <!-- Light Logo icon -->
                     <img src="{{url('flexy/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                 </b>
                 <!--End Logo icon -->
                 <!-- Logo text -->
                 <span class="logo-text">
                     <b>Inventory</b>
                 </span>
             </a>
             <!-- ============================================================== -->
             <!-- End Logo -->
             <!-- ============================================================== -->
             <!-- This is for the sidebar toggle which is visible on mobile only -->
             <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
             <!-- ============================================================== -->
             <!-- toggle and nav items -->
             <!-- ============================================================== -->
             <ul class="navbar-nav float-start me-auto">
                 <!-- ============================================================== -->
                 <!-- Search -->
                 <!-- ============================================================== -->
                 <li class="nav-item search-box">
                     @if(Auth::check())
                     Selamat Datang {{Auth::user()->name}}
                     @else
                     Selamat Datang
                     @endif
                 </li>
             </ul>
             <!-- ============================================================== -->
             <!-- Right side toggle and nav items -->
             <!-- ============================================================== -->
             <ul class="navbar-nav float-end">
                 <!-- ============================================================== -->
                 <!-- User profile and search -->
                 <!-- ============================================================== -->
                 <li class="nav-item dropdown">
                     @if(Auth::check())
                     <a href="#" class="btn btn-info btn-sm text-white" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                         <i class="fa fa-sign-out"></i>&nbsp; Keluar sistem
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                     @else
                     <a href="{{url('login')}}" class="btn btn-info btn-sm text-white">
                         <i class="fa fa-user"></i>&nbsp; Login Admin
                     </a>
                     @endif
                 </li>
                 <!-- ============================================================== -->
                 <!-- User profile and search -->
                 <!-- ============================================================== -->
             </ul>
         </div>
     </nav>
 </header>