<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use DB; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;





class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function showChangePass()
    {
        $email= auth()->user()->email;
        $name= auth()->user()->name;
        return view('auth.passwords.changepass',['email'=>$email,'name'=>$name]);
    }
    
    public function updatePass(Request $request)
    {
        // dd($request->all());
      $request->validate([
          'name'=>'required',
          'email'=>'required',
          'password'=>'required|min:8',
          'password_confirmation'=>'required|min:8'
         ]);
         
         if($request->password!=$request->password_confirmation)
         {
             return redirect()->back()->with('msg','Please recheck your password confirmation');
         }
         
        $id= auth()->user()->id;
         
        
          
     $user = User::where('id', $id)
                      ->update([
                          'password' => Hash::make($request->password),
                          'name'=>$request->name,
                          'email'=>$request->email,
                          ]); 
                          
    return redirect()->back()->with('msg','Credential Updated Successfully');
    
    }
}
