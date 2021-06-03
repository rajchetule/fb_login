<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mywork;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyworkController;
use Socialite;
use Exception;
use Auth;

class FacebookController extends Controller
{
    public function redirectToFacebook(Request $request)
    {
        // dd(Socialite::driver('facebook'));
        return Socialite::driver('facebook')->redirect();

    }

    public function handleFacebookCallback()
    {

        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {

            return redirect('facebook');

        }
    }

    public function second()
    {
        return view('back');
    }

}
