  
    
     <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <img src="{{ asset('images/logopl.png') }}" alt="Primaginary Learning" width="200">
            <div id="close-sidebar">
              <i class="fas fa-times"></i>
            </div>
          </div>
          <div class="sidebar-header">
            <div class="user-pic">
              <img class="img-responsive img-rounded" src="https://picsum.photos/200/200"
                alt="User picture">
            </div>
            <div class="user-info">
              <span class="user-name" style="text-transform: capitalize;">
                {{auth()->user()->name}}
              </span>
              <span class="user-role">{{auth()->user()->role}}</span>
              <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
              </span>
            </div>
          </div>
          <!-- sidebar-header  -->
          <!-- <div class="sidebar-search">
            <div>
              <div class="input-group">
                <input type="text" class="form-control search-menu" placeholder="Search...">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
          </div> -->
          <!-- sidebar-search  -->
          
          @if (auth()->user()->role === 'other')
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>General</span>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                    <span class="badge badge-pill badge-warning">New</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Dashboard 1
                          <span class="badge badge-pill badge-success">Pro</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Dashboard 2</a>
                      </li>
                      <li>
                        <a href="#">Dashboard 3</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>E-commerce</span>
                    <span class="badge badge-pill badge-danger">3</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Products

                        </a>
                      </li>
                      <li>
                        <a href="#">Orders</a>
                      </li>
                      <li>
                        <a href="#">Credit cart</a>
                      </li>
                    </ul>
                  </div>
                </li>
                

                <li class="header-menu">
                  <span>Extra</span>
                </li>
                
                <li>
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Documentation</span>
                    <span class="badge badge-pill badge-primary">Beta</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Examples</span>
                  </a>
                </li>
              </ul>
            </div>
          @elseif(auth()->user()->role === 'teacher')
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>Teacher Page</span>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Edit Profile</a>
                      </li>
                      <li>
                        <a href="#">Change Password</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Courses</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Create New Course</a>
                      </li>
                      <li>
                        <a href="#">Manage Course Content</a>
                      </li>
                      <li>
                        <a href="#">Grade Assignments</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Students</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">View Student List</a>
                      </li>
                      <li>
                        <a href="#">Monitor Student Progress</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-comments"></i>
                    <span>Forums</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Create Discussion Threads</a>
                      </li>
                      <li>
                        <a href="#">Moderate Discussions</a>
                      </li>
                      <li>
                        <a href="#">Answer Student Questions</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          @elseif(auth()->user()->role === 'student')
              <div class="sidebar-menu">
                  <ul>
                      <li class="header-menu">
                          <span>Student Page</span>
                      </li>
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-user"></i>
                              <span>Profile</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Edit Profile</a>
                                  </li>
                                  <li>
                                      <a href="#">Change Password</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-book"></i>
                              <span>Courses</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Enroll in Course</a>
                                  </li>
                                  <li>
                                      <a href="#">View Course Progress</a>
                                  </li>
                                  <li>
                                      <a href="#">Access Course Materials</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-file-alt"></i>
                              <span>Quizzes</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Take Quizzes</a>
                                  </li>
                                  <li>
                                      <a href="#">View Quiz Results</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-copy"></i>
                              <span>Assignments</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Submit Assignments</a>
                                  </li>
                                  <li>
                                      <a href="#">View Assignment Grades</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-comments"></i>
                              <span>Forums</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Join Discussions</a>
                                  </li>
                                  <li>
                                      <a href="#">Post Questions</a>
                                  </li>
                                  <li>
                                      <a href="#">Reply to Threads</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
            @elseif(auth()->user()->role === 'admin')
              <div class="sidebar-menu">
                  <ul>
                      <li class="header-menu">
                          <span>General Management</span>
                      </li>
                      <!-- User Management -->
                      <li>
                          <a href="{{ route('addUser') }}">
                              <i class="fa fa-user"></i>
                              <span>User </span>
                          </a>
                      </li>
                      <!-- Course Management -->
                      <li >
                          <a href="{{ route('courses.index') }}">
                              <i class="fa fa-book"></i>
                              <span>Course </span>
                          </a>
                      </li>
                      <!-- Content Management -->
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-upload"></i>
                              <span>Content </span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Upload Content</a>
                                  </li>
                                  <li>
                                      <a href="#">Edit Content</a>
                                  </li>
                                  <li>
                                      <a href="#">Delete Content</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- Assignment Management -->
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-tasks"></i>
                              <span>Assignment </span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Create Assignment</a>
                                  </li>
                                  <li>
                                      <a href="#">Grade Assignments</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- Payment Management -->
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-usd"></i>
                              <span>Payment </span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">View Payments</a>
                                  </li>
                                  <li>
                                      <a href="#">Process Payments</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- Salary Management -->
                      <li class="sidebar-dropdown">
                          <a href="#">
                              <i class="fa fa-calculator"></i>
                              <span>Salary </span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                  <li>
                                      <a href="#">Payroll</a>
                                  </li>
                                  <li>
                                      <a href="#">Salary Reports</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          @endif



          <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
          <a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">3</span>
          </a>
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-success notification">7</span>
          </a>
          <a href="#">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
          </a>
          <a href="#">
            <i class="fa fa-power-off"></i>
          </a>
        </div>
      </nav>