
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline  ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                        <div class="input-group" >
                             <a href="{{route('switchLan','en')}}" class="btn btn-info"> English</a>
                                <a href="{{route('switchLan','ar')}}" class="btn btn-primary"> {{__('translation.arabic')}}</a>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->

                    @if(App::getLocale() == 'ar')
                    <ul class="navbar-nav mr-auto ml-10 drop-menu"  >
                    @else
                    <ul class="navbar-nav ml-auto drop-menu" >
                    @endif

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                             <a href="{{route('switchLan','en')}}" class="btn btn-info"> English</a>
                                <a href="{{route('switchLan','ar')}}" class="btn btn-primary"> {{__('translation.arabic')}}</a>
                        </li>

                        <!-- Nav Item - Alerts -->
                       

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow drop-menu" >
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{__('translation.Admin')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{!! asset('theme/img/undraw_profile.svg" alt="...') !!}"/>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" >
                               
                                <a class="dropdown-item align-right" href="{{ url('admin/product') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   {{__('translation.Contact')}} 
								
                                <a class="dropdown-item align-right" href="{{ route('admin.editpass', ['id' => auth()->user()->id]) }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                  {{__('translation.Settings')}}  
                                </a>
                               
                            		<form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                            		
                                    <button style="color: #f7941d;" class="dropdown-item" type="submit">
                            		 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 align-right"></i>
                                      {{__('translation.Logout')}}    
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>