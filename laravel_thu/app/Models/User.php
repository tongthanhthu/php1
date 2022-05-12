<?php

namespace App\Models;
use Session;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_address',
        'password',
        'name',
        'address',
        'phone'
    ];
    public function checkregister($request)
    {

        try{
            User::create([
                'mail_address'=> (string) $request->input('mail_address'),
                'password'=> (string)bcrypt( $request->input('password')),
                'name'=> (string) $request->input('name'),
                'address'=> (string) $request->input('address'),
                'phone'=> (string) $request->input('phone'),

            ]);

            Session::flash('success','tạo thành công tài khoản');

        } catch(\Exception $err){

            Session::flash('error',$err->getMessage());
            return false;

        }
        return true;
    }
    public function list(){
        return User::orderBy('mail_address','asc')->paginate(20);
    }
}
