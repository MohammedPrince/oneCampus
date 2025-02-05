@extends('layouts.master')
@section('content')
<nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
              <a class="nav-link {{ request()->is('admin/rule/list') ? 'active' : ''}}" href="{{route('admin.rule.list')}}" data-page="roles">Rules</a>
              <a class="nav-link {{ request()->is('admin/rule/dept') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Departments</a>
              <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : ''}}" href="{{route('admin.rule.branch')}}" data-page="branches">Branches</a>
              <a class="nav-link {{ request()->is('admin/rule/identity') ? 'active' : ''}}" href="{{route('admin.rule.identity')}}" data-page="identity">Identity Attributes</a>
        </div>
          </div>
        </div>
      </nav>

<div class="container my-4">
    <div class="nationalaty">
      <div class="row">
        <div class="col-4">
          <h2>Nationalaties :</h2>
        </div>
        <div class="col-4">
          <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#addnationalaty"> <img src="{{asset('assets/icons/add.svg')}}" alt="add"> </button>
        </div>
       
      </div>
      <div class="modal fade" id="addnationalaty" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 40vw; top:30vh;">
            <div class="modal-content">
                <!-- Profile Form -->
                <div id="profileForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Add Nationality</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container mt-5">
                    
                        <form>
                          <div class="mb-3">
                         <label for="fullNameEnglish" class="form-label">Nationality</label>
                              <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                              <div class="invalid-feedback">Please enter the Nationalaty.</div>
                         
                          </div>
                         
                            <button class="btn btn-outline w-100 align-self-center" onclick="">
                              Add Country
                             </button>
                         
                         
                        </form>
                      </div>
                    </div>
                </div>
    
               
            </div>
        </div>
    </div>
    
   

    <div class="modal fade" id="Editnationality" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 40vw; top:30vh;">
          <div class="modal-content">
              <!-- Profile Form -->
              <div id="profileForm">
                  <div class="modal-header">
                      <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Add Nationality</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container mt-5">
                  
                      <form>
                        <div class="mb-3">
                       <label for="fullNameEnglish" class="form-label">Nationality</label>
                            <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                            <div class="invalid-feedback">Please enter the Nationalaty.</div>
                       

                        </div>
                        <div class="row">
                          <div class="col-6">
                              <button type="button" class="btn btn-outline" style="margin: 1px; width: 15vw;">Update Nationality </button>
                          </div>
                          <div class="col-6">
                              <button type="button" id="resetPasswordButton" class="btn btn-outline" style="margin: 1px; width: 15vw;">Delete Nationality</button>
                          </div>
                      </div>
                       
                      </form>
                    </div>
                  </div>
              </div>
  
             
          </div>
      </div>
  </div>
  

      <div class="col-5">
      <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          First Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Editnationality">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Second Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Editnationality">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Third Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Editnationality">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Fourth Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Editnationality">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
      </ol>
    </div>
    </div>
   



    <div class="relogion" style="margin-top:5vh;">
      <div class="row">
        <div class="col-4">
          <h2>Religions :</h2>
        </div>
        <div class="col-4">
          <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#addreligion"> <img src="{{asset('assets/icons/add.svg')}}" alt="add"> </button>
        </div>
       
      </div>
      <div class="modal fade" id="addreligion" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 40vw; top:30vh;">
            <div class="modal-content">
                <!-- Profile Form -->
                <div id="profileForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Add Religion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container mt-5">
                    
                        <form>
                          <div class="mb-3">
                         <label for="fullNameEnglish" class="form-label">Religion</label>
                              <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                              <div class="invalid-feedback">Please enter the Nationalaty.</div>
                         
                          </div>
                         
                            <button class="btn btn-outline w-100 align-self-center" onclick="">
                              Add Religion
                             </button>
                         
                         
                        </form>
                      </div>
                    </div>
                </div>
    
               
            </div>
        </div>
    </div>
    
   

    <div class="modal fade" id="EditReligion" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 40vw; top:30vh;">
          <div class="modal-content">
              <!-- Profile Form -->
              <div id="profileForm">
                  <div class="modal-header">
                      <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Add Religion</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container mt-5">
                  
                      <form>
                        <div class="mb-3">
                       <label for="fullNameEnglish" class="form-label">Religion</label>
                            <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                            <div class="invalid-feedback">Please enter the Religion.</div>
                       

                        </div>
                        <div class="row">
                          <div class="col-6">
                              <button type="button" class="btn btn-outline" style="margin: 1px; width: 15vw;">Update Religion </button>
                          </div>
                          <div class="col-6">
                              <button type="button" id="resetPasswordButton" class="btn btn-outline" style="margin: 1px; width: 15vw;">Delete Religion</button>
                          </div>
                      </div>
                       
                      </form>
                    </div>
                  </div>
              </div>
  
             
          </div>
      </div>
  </div>
  

      <div class="col-5">
      <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          First Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#EditReligion">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Second Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#EditReligion">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Third Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#EditReligion">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Fourth Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#EditReligion">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
      </ol>
    </div>
    </div>

    <div class="gender" style="margin-top:5vh;">
      <div class="row">
        <div class="col-4">
          <h2>Gender:</h2>
        </div>
        <div class="col-4">
          <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#addGender"> <img src="{{asset('assets/icons/add.svg')}}" alt="add"> </button>
        </div>
       
      </div>
      <div class="modal fade" id="addGender" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 40vw; top:30vh;">
            <div class="modal-content">
                <!-- Profile Form -->
                <div id="profileForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Add Gender</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container mt-5">
                    
                        <form>
                          <div class="mb-3">
                         <label for="fullNameEnglish" class="form-label">Gender</label>
                              <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                              <div class="invalid-feedback">Please enter Gender.</div>
                         
                          </div>
                         
                            <button class="btn btn-outline w-100 align-self-center" onclick="">
                             Add Gander
                             </button>
                         
                         
                        </form>
                      </div>
                    </div>
                </div>
    
               
            </div>
        </div>
    </div>
    
   

    <div class="modal fade" id="editGender" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 40vw; top:30vh;">
          <div class="modal-content">
              <!-- Profile Form -->
              <div id="profileForm">
                  <div class="modal-header">
                      <h5 class="modal-title" id="profileModalLabel" style="color:#3C2F2F;">Edit Gender</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container mt-5">
                  
                      <form>
                        <div class="mb-3">
                       <label for="fullNameEnglish" class="form-label">Gender</label>
                            <input type="text" class="form-control w-100" id="fullNameEnglish" required>
                            <div class="invalid-feedback">Please enter the Gender.</div>
                       

                        </div>
                        <div class="row">
                          <div class="col-6">
                              <button type="button" class="btn btn-outline" style="margin: 1px; width: 15vw;">Update Gender </button>
                          </div>
                          <div class="col-6">
                              <button type="button" id="resetPasswordButton" class="btn btn-outline" style="margin: 1px; width: 15vw;">Delete Gender</button>
                          </div>
                      </div>
                       
                      </form>
                    </div>
                  </div>
              </div>
  
             
          </div>
      </div>
  </div>
  

      <div class="col-5">
      <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          First Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#editGender">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Second Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Gender">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Third Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Gender">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Fourth Item
          <button  onclick="deleteItem(this)" style="border: none; background-color: transparent;"data-bs-toggle="modal" data-bs-target="#Gender">
            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit" >
          </button>
        </li>
      </ol>
    </div>
    </div>
</div>

 @endsection