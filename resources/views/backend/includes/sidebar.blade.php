  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('backend.admin.dashboard.show') }}" class="brand-link">
          <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">CRM</span>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/avatars/'.Auth::user()->avatar) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('backend.admin.dashboard.show') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User & Permission
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.users.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.role.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.permissions.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Plans
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <!-- <li class="nav-item">
                              <a href="{{ route('backend.admin.categoriesplan.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category Plan</p>
                              </a>
                          </li> -->
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.plans.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Plan</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                          <p>
                               Orders
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.orders.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.orderHistory.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Order History</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customer
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.customers.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Infomation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.admin.userCredit.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Credit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.admin.descriptionDataList.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Description Data List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.admin.userData.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Data</p>
                            </a>
                        </li>
                    </ul>
                  </li>
                 
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-database"></i>
                          <p>
                              Data
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.tageted.data.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.country.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Country Data</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.jobfunction.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Job Function</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.jobtitle.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Job Title</p>
                              </a>
                          </li>            
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.states.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>State</p>
                              </a>
                          </li>            
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.cities.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>City</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.companies.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Company</p>
                              </a>
                          </li> 
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.industries.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Industry</p>
                              </a>
                          </li>          
                      </ul>
                  </li>
                  <li class="nav-header">SITE</li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.contacts.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact us</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.question_answer.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Question & Answer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.informations.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Information</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.terms.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Terms Of Use</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.privacy.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Privacy Policy</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('backend.admin.report.show') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Report</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('backend.admin.settings.show') }}" class="nav-link">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              Setting
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                    <form id="logout-form" action="{{ route('backend.admin.auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
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
