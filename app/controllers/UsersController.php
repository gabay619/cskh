<?php

use Oauth2\PlaygateIDOauth2;

class UsersController extends \BaseController {

    public function login(){
        $username = Input::get('username');
        $password = Input::get('password');
        $url = Input::get('url');

        $playgateIDOauth2 = new PlaygateIDOauth2();
        $signinByTicketUrl = $playgateIDOauth2->buildSigninByTicketUrl($username, $password, $url);

        return Response::json(array('success'=>true, 'url'=>$signinByTicketUrl));
    }

    public function ssoLoginCallback(){
        session_start();
        $playgateIDOauth2 = new PlaygateIDOauth2();
        list($accessToken,$userInfo)=$playgateIDOauth2->loginCallback();

        //Neu user chua co tren hotro => them moi
        $checkingUser = User::find($userInfo->id);
        if(!$checkingUser){
            $checkingUser = new User(array('id'=>$userInfo->id, 'username'=>$userInfo->username));
            $checkingUser->save();
        }        //Neu co roi => nothing
        else{

        }

        //set trang thai dang nhap
        Oauth2Helper::storeToken($accessToken);
        Auth::loginUsingId($userInfo->id);

        return View::make('users.sso-image');
    }

}