<?php namespace Rwm\MfContactsView;

use Illuminate\Support\Facades\Event;
use Rwm\MfContactsView\Models\Contact;
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
            $cnt_params = json_decode($formdata);
            $contact = new Contact();
            $contact->name = $cnt_params->name;
            $contact->email = $cnt_params->email;
            $contact->subject = $cnt_params->subject;
            $contact->message = $cnt_params->comments;
            $contact->save();
        });
    }

}

