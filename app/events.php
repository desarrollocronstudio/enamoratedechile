<?php

Event::listen('tip.registered',function($tip,$author){
    $tip = [
        'id'        => $tip->id,
        'name'      => $tip->name,
        'detail'    => $tip->detail,
        'image'     => $tip->image(),
        'place_name'=> $tip->place_name,
    ];
    $token = str_random(30);
    Cache::put('tip.token.'.$tip['id'],$token,2880);
    Mail::queue('emails.tip_registered',['tip' => $tip,'author' => $author,'token'  => $token],function($message){
        $message->to('gonzunigad@gmail.com')->subject('Enámorate de Chile - Nuevo Tip');
    });

});