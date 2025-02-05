<?php

namespace App\Http\Controllers;


use App\Services\User\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
  public $test;
  public function __construct(UserServices $interface)
  {
      $this->test = $interface;
  }
    public function showLogin(Request $request){
        return view('login');
    }
  
    public function showRegister(Request $request){
        $role = $this->test->showRole();
        return view('register',compact('role'));
    }
    public function register( Request $request){
        
       $this->test->store($request->all());   
        return redirect('/login');
    }

    public function login(Request $request)
    {
      $credentials = [
        'name' => $request->input('name'),
        'password' => $request->input('password'),
    ];
      $request->validate([
        "name" => "required",
        "password" => "required",
       
    ]);

    if (Auth::attempt($credentials)) {
        //  dd(Auth::user()->name);
          if(Auth::user()->role_id == 1){
              // dd(Auth::user()->name);
               return redirect()->intended('admin/user/list');
            }elseif(Auth::user()->role_id == 2 ){
              return redirect()->intended('/student');
            }
            elseif(Auth::user()->role_id == 3 ){
                return redirect()->intended('/parent');
              }
              elseif(Auth::user()->role_id == 4 ){
                return view('/agent');
              }
              elseif(Auth::user()->role_id == 5 ){
                return redirect()->intended('/clinic');
              }
              elseif(Auth::user()->role_id == 6 ){
                return redirect()->intended('/dean');
              }
              elseif(Auth::user()->role_id == 7 ){
                return redirect()->intended('/admission-user');
              }
              elseif(Auth::user()->role_id == 8 ){
                return redirect()->intended('/admission-admin');
              }
              elseif(Auth::user()->role_id == 9 ){
                return redirect()->intended('/registrar');
              }
              elseif(Auth::user()->role_id == 10 ){
                return redirect()->intended('/exam-officer');
              }
              elseif(Auth::user()->role_id == 11 ){
                return redirect()->intended('/finance');
              }else{
              return redirect('/login')->with('error','not avaliable name');
            }    }
            else{
              // return redirect()->intended('/finance');
              return redirect('/')->with('error','Please Enter The Correct Credentials');
              }}
      public function logout(Request $request){
        Auth::logout();
    return redirect('/login');
    }
    public function index(){
        return view('dashboard');
    }
    public function show(){
        return view('student');
    }
    public function parent(){
      return view('parent');
  }
  public function agent(){
    return view('agent');
}
public function clinic(){
  return view('clinic');
}
public function dean(){
  return view('dean');
}
public function admissionUser(){
  return view('admission-user');
}
public function admissionAdmin(){
  return view('admission-admin');
}
public function registrar(){
  return view('registrar');
}
public function examOfficer(){
  return view('exam-officer');
}
public function finance(){
  return view('finance');
}
public function addUser(){
  return view('admin.user.add_users');
}
public function userList(){
  return view('admin.user.list');
}
public function userReset(){
  return view('admin.user.reset');
}
public function adminRole(){
  return view('admin.role');
}
public function manageRole(){
  return view('admin.roles.admin_role');
}
public function manageDept(){
  return view('admin.roles.department');
}
public function manageBranch(){
  return view('admin.roles.branch');
}
public function manageIdentity(){
  return view('admin.roles.identity');
}
public function manageCertificate(){
  return view('admin.academic.certificates');
}
public function manageMajor(){
  return view('admin.academic.majors');
}
public function manageBatch(){
  return view('admin.academic.batch');
}
}
