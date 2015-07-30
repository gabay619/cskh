<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 6/11/2015
 * Time: 3:48 PM
 */

use Gregwar\Captcha\CaptchaBuilder;

Widget::register('captcha',function($typeCaptcha)
{
    $builder = new CaptchaBuilder;


    $builder->setIgnoreAllEffects(true);
    $builder->build($width = 100, $height = 35, $font = null);
    $captcha = $builder->inline();
    Session::put($typeCaptcha, $builder->getPhrase());
    return View::make('frontend.widget.captcha')->with('captcha',$captcha);
});




Widget::register('login_block',function()
{
    if(Auth::user())
    {


    $countQuestion=Question::where("user_id","=",Auth::user()->id)
        ->where("solve","=",0)
        ->orderBy('created_at','desc')->count();

    return View::make('frontend.widget.login')->with(array('countQuestion'=>$countQuestion));
    }
    else
    {
        return View::make('frontend.widget.login');
    }
});
