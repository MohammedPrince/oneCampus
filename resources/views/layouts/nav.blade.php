
<div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header">
      <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    </div>
   
    <div id="nav-content">
        @if((Auth::user()->role_id == 1 ) ?? ' ')
        <a href="{{route('user.list')}}" class="nav-button {{ request()->is('admin/role_manange') ? 'selected' : ''}}">
      <img src="{{asset('assets/icons/users.svg')}}" alt="" draggable="false"><span>User Management</span></a>
     
      <a href="{{route('admin.role_manage')}}" class="nav-button {{ request()->is('admin/role_manange') ? 'selected' : ''}}">
      <img src="{{asset('assets/icons/role.svg')}}" alt="" draggable="false"><span>Role Mangement</span>
      </a>
      <a href="{{route('admin.role.list')}}" class="nav-button {{ request()->is('admin/role_manange') ? 'selected' : ''}}">
      <img src="{{asset('assets/icons/admin.svg')}}" alt="" draggable="false"><span>Admin Rules</span></a>
      <a href="{{route('admin.academic.certificate')}}" class="nav-button ">
      <img src="{{asset('assets/icons/acad.svg')}}">Academic Rules</span></a>
       @endif
      <div id="nav-content-highlight"></div>
    </div>
    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
      <div id="nav-footer-heading">
      
      </div>
    </div>
  </div>
 

 