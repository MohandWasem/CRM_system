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
<a class="nav-link" href="{{route('home.dash')}}">
<span class="menu-title">Home</span>
<i class="mdi mdi-home menu-icon"></i>
</a>
</li>
@if (Auth::guard('web')->user()->user_role_id == 1 || Auth::guard('web')->user()->user_role_id == 4 ) 
<li class="nav-item">
    <a class="nav-link" href="{{route('Request.Approved')}}">
    <span class="menu-title">RequestApproved</span>
    <i class="mdi mdi-bell-ring menu-icon"></i>
    </a>
</li>
@endif

@if (Auth::guard('web')->user()->user_role_id == 1 || Auth::guard('web')->user()->user_role_id == 5 ) 
<li class="nav-item">
    <a class="nav-link" href="{{route('Replay.Request')}}">
    <span class="menu-title">ReplayRequests</span>
    <i class="mdi mdi-bell-ring menu-icon"></i>
    </a>
</li>
@endif

@if (Auth::guard('web')->user()->user_role_id == 1 || Auth::guard('web')->user()->user_role_id == 5 ) 
<li class="nav-item">
    <a class="nav-link" href="{{route('Quotations')}}">
    <span class="menu-title">quotations </span>
    <i class="mdi mdi-bell-ring menu-icon"></i>
    </a>
</li>
@endif



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
<li class="nav-item"> <a class="nav-link" href="{{route('Commodity')}}">Commodities</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Agents')}}">Agents</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Carriers')}}">Carriers</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('suppliers')}}">Suppliers</a></li>
<li class="nav-item"> <a class="nav-link" href="{{route('Currency')}}">Currency</a></li>
@if (Auth::guard('web')->user()->user_role_id == 1 ) 
 <li class="nav-item"> <a class="nav-link" href="{{route('Users')}}">Users</a></li>
@endif

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

<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Operation</span>
<i class="menu-arrow"></i>
<i class="mdi mdi-contacts menu-icon"></i>
</a>


<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">
<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Price List</span>
<i class="menu-arrow"></i>
<!-- <i class="mdi mdi-contacts menu-icon"></i> -->
</a>
<li class="nav-item"> <a class="nav-link" href="{{route('Rates')}}">Rates</a></li>

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