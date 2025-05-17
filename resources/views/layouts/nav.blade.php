<div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header">
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    </div>

    <div id="nav-content">
        @if (Auth::check() && Auth::user()->role_id == 1)
            <a href="{{ route('user.list') }}" class="nav-button {{ request()->routeIs('user.list') || request()->routeIs('user.add') || request()->routeIs('user.reset') ? 'selected' : '' }}">
                <img src="{{ asset('assets/icons/users.svg') }}" alt="" draggable="false">
                <span>User Management</span>
            </a>

            <a href="{{ route('admin.role_manage') }}"
                class="nav-button {{ request()->routeIs('admin.role_manage') ? 'selected' : '' }}">
                <img src="{{ asset('assets/icons/role.svg') }}" alt="" draggable="false">
                <span>Role Management</span>
            </a>

            <a href="{{ route('admin.rule.list') }}"
                class="nav-button {{ request()->routeIs('admin.rule.list') || request()->routeIs('admin.rule.dept') || request()->routeIs('admin.rule.branch') || request()->routeIs('admin.identity.index') ? 'selected' : '' }}">
                <img src="{{ asset('assets/icons/admin.svg') }}" alt="" draggable="false">
                <span>Admin Rules</span>
            </a>
          
            <a href="{{ route('admin.academic.certificate') }}"
                class="nav-button {{ request()->routeIs('admin.academic.certificate') || request()->routeIs('admin.academic.major') || request()->routeIs('admin.academic.batch') || request()->routeIs('admin.academic.intake') ? 'selected' : '' }}">
                <img src="{{ asset('assets/icons/acad.svg') }}" alt="" draggable="false">
                <span>Academic Rules</span>
            </a> 
         
        @endif
        <div id="nav-content-highlight"></div>
    </div>

    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
        <div id="nav-footer-heading">

        </div>
    </div>
</div>
