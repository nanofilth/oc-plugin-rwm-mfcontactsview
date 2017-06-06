<?php namespace Rwm\MfContactsView;

use Backend;
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
    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'mfcontactsview' => [
                'label' => 'Form Submissions',
                'url' => Backend::url('rwm/mfcontactsview/contacts'),
                'icon' => 'icon-user',
                'permissions' => ['rwm.mfcontactsview.*'],
                'order' => 500,
                'sideMenu' => [
                    'buyers' => [
                        'label' => 'Contacts',
                        'url' => Backend::url('rwm/mfcontactsview/contacts'),
                        'icon' => 'icon-user',
                        'permissions' => ['rwm.smhistory.*'],
                    ]
                ]
            ],
        ];
    }

}

