<?php

namespace App\Services;

class SubscriberService
{

    public static function getsubscriber($email){
        $subscriber= \App\Models\Subscriber::where('email',$email)->first();
        return $subscriber;
    }

    public static function createsubscriber($email){
        $subscriber = \App\Models\Subscriber::create(['email' => $email]);
        return $subscriber;

    }

}
