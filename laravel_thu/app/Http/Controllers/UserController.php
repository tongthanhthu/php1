<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    function index(){
        $list = $this->user->list();
    	return view('user.list',['title'=>'danh sach','list'=> $list]);
    }
    function addlist()
    {
        return view('user.addlist',['title'=>'them moi']);
    }
    function postaddlist(CreateUserRequest $request){
        $user = $this->user->checkregister($request);
        if($user)
        {
            Session::flash('success','tạo thành công tài khoản');
            return redirect('users');
        }
    }

    }

