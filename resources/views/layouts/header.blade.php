
<nav class="navbar navbar-expand-md navbar-light " id="top-navbar" style="background-color: white;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{asset('assets/logo.svg')}}" alt="Logo" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <div class="search-container d-flex justify-content-center" style="margin-left: 110px;">
            
            <input type="text" class="search-bar form-control" placeholder="Search..">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <img src="{{asset('assets/icons/profile.svg')}}" alt="Profile Icon" id="profileIcon" style="cursor: pointer;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
            <li><a class="dropdown-item" href="setting.html">Settings</a></li>
            <li>
              <div class="d-flex align-items-center justify-content-around px-2">
                <!-- Theme Toggle Button -->
                {{-- <button id="themeToggle" class="icon-button" aria-label="Toggle theme" style="background-color: transparent; border: none; padding: 0;margin-left: -1vw;">
                  <img id="icon" src="{{asset('assets/icons/moon.svg')}}" alt="Light mode icon" draggable="false" style="width: 25px;">
                </button> --}}
                <!-- Divider -->
                <div class="vertical-divider" style="height: 20px; width: 1px; background-color: #ddd;"></div>
                <!-- Logout Button -->
                <a href='{{route('logout')}}'>
                  <button class="icon-button" style="border: none; background-color: transparent;">
                    <img src="{{asset('assets/icons/logout.svg')}}" alt="Logout" class="nav-icon" style="width: 20px;" draggable="false">
                </button>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <!-- Profile Form -->
          <div id="profileForm">
              <div class="modal-header">
                  <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Profile Image -->
                  <div class="mb-3">
                      <div class="row">
                          <div class="container" style="width: 150px; height: 150px; border-radius: 50%; background-color: white; background-image: url('{{asset('assets/icons/user (1).png')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                          </div>
                      </div>
                  </div>

                  <!-- Name -->
                  <div class="mb-3">
                      <label for="profileName" class="form-label">Name</label>
                      <input type="text" class="form-control w-100" id="profileName" value="{{Auth::user()->name  ?? ''}}"  />
                  </div>

                  <!-- Email -->
                  @if(Auth::check())
                  <input type="email" class="form-control w-100" id="profileEmail"
                         value="{{ Auth::user()->email }}" style="width: 48vw;" />
                @else
                  <input type="email" class="form-control w-100" id="profileEmail" value="" style="width: 48vw;" />
                @endif
                

                  <!-- Phone Number -->
                  <div class="mb-3">
                      <label for="profilePhone" class="form-label">Phone Number</label>
                      <input type="text" class="form-control w-100" id="profilePhone" value="123-456-7890" style="width: 48vw;" />
                  </div>

                  <div class="row">
                      {{-- <div class="col-6">
                          <button type="button" class="btn btn-outline" style="margin: 1px; width: 20vw;">Save Changes</button>
                      </div> --}}
                      <a href="{{route('user.reset')}}">
                      <div class="col-6">
                        
                          <button type="button" id="resetPasswordButton" class="btn btn-outline" style="margin: 1px; width: 20vw;">Reset Password</button>
                      
                        </div>
                    </a>
                  </div>
              </div>
          </div>

          <!-- Reset Password Form -->
          <div id="resetPasswordForm" class="form-container" style="display: none;">
            <div class="modal-header">
              <button id="back" style="border: none; background-color: transparent; margin-right: 10px;">
                <img src="{{asset('assets/icons/back.svg')}}" alt="back">
              </button>
           
              <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <h3 class="text-md-start mb-4" style="margin-top: 15px;">Reset Password</h3>
              <form class="needs-validation" novalidate>
                  <!-- Email Address -->
                  <div class="mb-3">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" class="form-control w-100" id="email" placeholder="Enter your email" required>
                      <div class="invalid-feedback">
                          Please enter a valid email address.
                      </div>
                  </div>

                  <!-- New Password -->
                  <div class="mb-3">
                      <label for="newPassword" class="form-label">New Password</label>
                      <input type="password" class="form-control w-100" id="newPassword" placeholder="Enter new password" required minlength="6" style="padding: 10px;">
                      <div class="invalid-feedback">
                          Password must be at least 6 characters long.
                      </div>
                  </div>

                  <!-- Confirm Password -->
                  <div class="mb-3">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control w-100" id="confirmPassword" placeholder="Confirm your password" required style="padding: 10px;">
                      <div class="invalid-feedback">
                          Passwords must match.
                      </div>
                  </div>

                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-outline w-100">Reset Password</button>
              </form>
          </div>
      </div>
  </div>
</div>