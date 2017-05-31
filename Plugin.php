<?php namespace Rwm\MfContactsView;

use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        Event::listen('martin.forms.beforeSaveRecord', function ($formdata) {
            $contact = json_decode($formdata);

            xdebug_break();
        });
    }

}

