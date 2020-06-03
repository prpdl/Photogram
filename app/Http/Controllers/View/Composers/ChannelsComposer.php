<?php


namespace App\Http\Controllers\View\Composers;



use App\Channel;
use Illuminate\View\View;

class ChannelsComposer
{

    public function compose(View $view){
        $view->with('channels', Channel::orderBy('name', 'asc')->get());
    }



}
