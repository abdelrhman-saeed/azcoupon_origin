
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            
            <div class="top-menu ms-auto">
                
            </div>

            <div class="user-box dropdown">

                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img 
                    src="{{ auth()->user()->avatar == "" || strlen(auth()->user()->avatar) == 0 ? asset("admin_assets/images/avatars/avatar.png") : asset( "../mycoupons.hk_core/storage/app/public/" . auth()->user()->avatar) }}"
                    class="user-img" 
                    alt="user avatar">
                    
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.users.edit', auth()->user()) }}"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.index') }}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                    
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a 
                        onclick="event.preventDefault(); document.querySelector('#logout_form').submit();"
                        class="dropdown-item" 
                        href="#"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        <form id='logout_form' method='POST' action="{{ route('logout') }}">@csrf</form>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</header>