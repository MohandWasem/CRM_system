<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                
                 <div class="nav-profile-text d-flex flex-column">
                  @if (Auth::guard('web')->check())
            
                  <span class="font-weight-bold mb-2">{{Auth::guard('web')->user()->name}}</span>
                  <span class="text-secondary text-small">Project Manager</span>
                  @endif
                 </div>
                   
                
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">
                <span class="menu-title">Admin</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('activty')}}">
                <span class="menu-title">Activity</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('document')}}">
                <span class="menu-title">Documents</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           @yield("content")
          </div>