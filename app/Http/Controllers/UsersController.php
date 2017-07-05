<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
  public function index(){
    if(Auth::user()->id == 1){
      $users = User::all();
    }else{
      $users = User::all()->where('id', Auth::user()->id  );
    }

    return view('users.list', compact('users'));
  }

  public function loadCreateUserPage(){

    if (Auth::user()->id == 1){
      return view('users.new');
    }else{

      $users = User::all()->where('id', Auth::user()->id  );

      return view('users.list', compact('users'));
    }
  }

  public function create(Request $request){
      if(Auth::user()->id == 1){
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = $request->toArray();

        $user['password'] = bcrypt($user['password']);

        $user = User::create($user);

        $users = User::all();
      }else{
          $users = User::where('id', Auth::user()->id)->first();
      }

      return view('users.list', compact('users'));
    }

  public function view(User $user){

    if(Auth::user()->id != 1){
      $user = User::find(Auth::user()->id);
    }
    return view('users.view', compact('user'));
  }

  public function edit(Request $request, User $user){

    $users = User::all()->where('id', Auth::user()->id);

    $this->validate($request, [
        'name' => 'required|max:30',
        'password' => 'required|min:8|confirmed',
    ]);

    if(Auth::user()->id == 1){
      $data = $request->toArray();

      $data['password'] = bcrypt($data['password']);

      $user->update($data);

      $users = User::all();
    }elseif (Auth::user()->id == $user['id']) {
      $data = $request->toArray();

      $data['password'] = bcrypt($data['password']);

      $user->update($data);
    }

    return view('users.list', compact('users'));

  }

  public function delete(User $user){
    if(Auth::user()->id == 1){
      if ($user['id'] != 1)
      {
        $user->delete();
      }
      $users = User::all();
    }
    else{
      $users = User::all()->where('id', Auth::user()->id);
    }
    return view('users.list', compact('users'));
  }

}
