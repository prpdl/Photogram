<?php

namespace App\Http\Controllers;

use App\Events\NewCustomerEmailEvent;
use App\Mail\WelcomeNewUser;
use App\Rules\Uppercase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory as View;

class RegistrationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param View $view
     * @return \Illuminate\Contracts\View\View
     */
    public function index(View $view)
    {
        return $view->make('register');
    }

    public function register(Request $request){

       $this->validator($request->all())->validate();

        $data= $request->except('_token');
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone_number = $data['phoneNumber'];
        $user->job_type = $data['job'];
        $user->password = Hash::make($data['password']);
        $user->save();



        event(new NewCustomerEmailEvent($user));

        session()->flash('messag', $user->email . " has been registered. Please Check Your Email.");
        return redirect('register');

    }

    public function validator(array $data)
    {
        $messages = [
          'name.alpha' => 'Nobody has number in their name.'
        ];
        return \Validator::make($data, [
            'name' => ['required','string', 'max:30'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
            'phoneNumber' => ['required'],
            'job' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation'=>['required']
        ], $messages);


    }


}
