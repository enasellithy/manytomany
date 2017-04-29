<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/admin')}}">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{Auth::user()->name}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                        @if(Auth::user()->manager == 1)
                        <li>
                        <a href="{{url('/manager')}}">Media</a>
                       </li>
                       @endif
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                           <i class="fa fa-fw fa-power-off"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="{{url('/admin')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/post')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Posts</a>
                    </li>
                     <li>
                        <a href="{{url('cat')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Category</a>
                    </li>
                    <li>
                        <a href="{{url('/menu')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Menu</a>
                    </li> 
                    <li>
                        <a href="{{url('poll')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Vote</a>
                    </li> 
                   @if(Auth::user()->manager == 1)
                        <li>
                        <a href="{{url('/manager')}}">Media</a>
                       </li>
                       @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
