<style>
    [dir="rtl"] .sidebar .nav-item .nav-link {
        text-align: right;
        /*background: red;*/
    }

    [dir="rtl"] #accordionSidebar{
        padding-right: 1px;
    }


</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">{{__('translation.Admin Dashboard')}} </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__('translation.Dashboard')}} </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/order') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>{{__('translation.Assigned Orders')}}</span></a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link" href="{{ url('admin/orders') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>{{__('translation.UnAssigned Orders')}}</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="{{ url('admin/completed_orders') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>{{__('translation.Completed Orders')}}</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>{{__('translation.Users')}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/reports') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>{{__('translation.Reports')}}</span></a>
            </li>
			
			

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>