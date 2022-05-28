<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
        protected function makeUser(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'role'=>'required',
            'email'=>'required',
            'password'=>'required',

            
        ]);

        User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'role' => $req->input('role'),
            'password' => Hash::make($req->input('password')),
        ]);

        return redirect('users');

    }

    function showUser()
    {
        $userList = User::all();
        return view('allUsers', ['userlist' => $userList]);
    }

    function editData($id){
        $user=User::find($id);
        return response()->json([
            'status'=>200,
            'user'=>$user,
        ]);
    }

    function updateData(Request $req){
        $user_id = $req->input('user_id');
        $user=User::find($user_id);
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        // $user->role=$req->input('role');
        $user->password=Hash::make($req->input('password'));
        $user->update();

        return redirect()->back()->with('status','User information has been updated');
    }

    function deleteData(Request $req){
        $user_id = $req->input('delete_id');
        $user=User::find($user_id);
        $user->delete();

        return redirect()->back()->with('status','User has been deleted');
    }
}