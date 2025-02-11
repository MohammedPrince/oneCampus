<div class="nav light-mode">
  <a href="#"> <img src="/public/assets/logowithname.svg" alt="Logo" draggable="false" class="logo"></a>
  <div class="mb-3" >
   <input
     type="text"
     id="tableSearch"
     class="form-control"
     placeholder="Search..."
     onkeyup=""
     style="margin :5px; width : 30vw; height :4vh; margin-top:1vh ; margin-left:-31vw;"
     
   />
 </div>
  <div class="nav-icons">
   <img src="/public/assets/icons/bell.svg" alt="Bell Icon">
   <!-- Profile Dropdown -->
   <div class="dropdown">
     <img
       src="/public/assets/icons/profile.svg"
       alt="Profile Icon"
       id="profileIcon"
       style="cursor: pointer;"
       data-bs-toggle="dropdown"
     />
     <ul class="dropdown-menu dropdown-menu-end shadow">
       <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
       <li><a class="dropdown-item" href="#">Settings</a></li>
       <li>
         <div class="d-flex align-items-center justify-content-around px-2">
           <!-- Theme Toggle Button -->
          
           
           <!-- Divider -->
           
           
           <!-- Logout Button -->
           <a href='{{route('logout')}}'>
           <button  type="submit"class="icon-button" style="border: none; background-color: transparent;margin-left: -2vw;">
             <img src="/public/assets/icons/logout.svg" alt="Logout" class="nav-icon" style="width: 20px;" draggable="false">
           </button>
           </a>
         </div>
       </li>
     </ul>
   </div>
 </div>
 </div>
 <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog w-50">
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
                          <div class="container" style="width: 150px; height: 150px; border-radius: 50%; background-color: white; background-image: url('/public/assets/icons/user (1).png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                          </div>
                      </div>
                  </div>

                  <!-- Name -->
                  <div class="mb-3">
                      <label for="profileName" class="form-label">Name</label>
                      <input type="text" class="form-control w-100" id="profileName" value="{{Auth::user()->name  ?? ''}}"  />
                  </div>

                  <!-- Email -->
                  <div class="mb-3">
                      <label for="profileEmail" class="form-label">Email</label>
                      <input type="email" class="form-control w-100" id="profileEmail" value="{{Auth::user()->email }}" style="width: 48vw;" />
                  </div>

                  <!-- Phone Number -->
                  <div class="mb-3">
                      <label for="profilePhone" class="form-label">Phone Number</label>
                      <input type="text" class="form-control w-100" id="profilePhone" value="123-456-7890" style="width: 48vw;" />
                  </div>

                  <div class="row">
                      <div class="col-6">
                          <button type="button" class="btn btn-outline" style="margin: 1px; width: 20vw;">Save Changes</button>
                      </div>
                      <div class="col-6">
                          <button type="button" id="resetPasswordButton" class="btn btn-outline" style="margin: 1px; width: 20vw;">Reset Password</button>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Reset Password Form -->
          <div id="resetPasswordForm" class="form-container" style="display: none;">
            <div class="modal-header">
              <button id="back" style="border: none; background-color: transparent; margin-right: 10px;">
                <img src="/public/assets/icons/back.svg" alt="back">
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