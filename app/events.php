<?php

use Illuminate\Mail\Message;

Event::listen('tip.registered',function($tip,$author){
    $tip = [
        'id'        => $tip->id,
        'name'      => $tip->name,
        'detail'    => $tip->content,
        'image'     => $tip->image(),
        'place_name'=> $tip->place_name,
        'code'      => $tip->code
    ];
    Mail::queue('emails.tip_registered',['tip' => $tip,'author' => $author,'token'  => $tip['code']],function(Message $message){
        $message
            ->to('gonzalo@enamoratedechile.cl')
            ->cc('mariana@enamoratedechile.cl')
            ->subject('Enámorate de Chile - Nuevo Tip');
    });

});

Event::listen('tip.change_status',function($tip,$status) {
    if($status)
    {
        $author = Person::find($tip->author_id);
        $link = $tip->link()."?source=approved_mail";
        $tip['image'] = $tip->image();

        Mail::queue('emails.tip_approved',compact('author','tip','link'),function(Message $message) use($author){
            $message
                ->to($author->email)
                ->subject('Tu dato ha sido aprobado - Enámorate de Chile');
        });
    }
});