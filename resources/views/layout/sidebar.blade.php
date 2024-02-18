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
<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Setup</span>
<i class="menu-arrow"></i>
<i class="mdi mdi-crosshairs-gps menu-icon"></i>
</a>
<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">

<li class="nav-item"> <a class="nav-link" href="{{route('parameter')}}">Parameters</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Ports')}}">Ports</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Country')}}">Countries</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Container')}}">Containers</a></li>

</ul>
</div>
</li>

<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Sales</span>
<i class="menu-arrow"></i>
<i class="mdi mdi-contacts menu-icon"></i>
</a>
<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">

<li class="nav-item"> <a class="nav-link" href="{{route('index')}}">Client</a></li>

<li class="nav-item"> <a class="nav-link" href="{{route('activty')}}">Activity</a></li>

<li class="nav-item"> <a class="nav-link" href="{{route('document')}}">Documents</a></li>

<li class="nav-item"> <a class="nav-link" href="{{route('request')}}">Requests</a></li>


</ul>
</div>
</li>




</ul>
</nav>
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
@yield("content")
</div>