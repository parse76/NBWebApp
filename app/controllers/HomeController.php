<?php

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Illuminate\Support\Collection;

class HomeController extends BaseController {

    public function __construct()
    {
        ParseClient::initialize(APP_ID, REST_KEY, MASTER_KEY);
    }

    public function login()
    {
        return View::make('login');
    }

    public function authenticate() {
        $username = Input::get('username');
        $password = Input::get('password');
        $test = "";

        try {
            $user = ParseUser::logIn($username, $password);
            $currentUser = ParseUser::getCurrentUser();
            $testRole = $currentUser->get("isAdmin");
            $testUser = $currentUser->get("username");
            if ($currentUser && $currentUser->get("isAdmin") == true && $currentUser->get("username") == "admin") {
                Session::put('userSession', $currentUser);
                Session::save();

                return Redirect::to('dashboard');
            }
            // Do stuff after successful login.
        } catch (ParseException $error) {
            // The login failed. Check error to see why.
            $aaa="";

        }
        return Redirect::to('login');
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('login');
    }

    public function forget(){
        return View::make('forget');
    }

    public function forgetpassword(){
        try {
            $email = Input::get('email');
            $query = ParseUser::query();
            $query->equalTo("email", $email);


            if($query->count() > 0){
                $results = $query->first();
                if($results->get("isAdmin")){
                    ParseUser::requestPasswordReset($email);
                    $ss ="";
                }
            }

            return Redirect::to('login');

        } catch (ParseException $ex) {
            return Redirect::to('forget');
        }
    }

}
