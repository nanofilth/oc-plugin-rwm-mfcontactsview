<?php namespace Rwm\MfContactsView;

use Backend;
use Illuminate\Support\Facades\Event;
use Rwm\MfContactsView\Models\Contact;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = [
        'Martin.Forms'
    ];

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        Event::listen('martin.forms.beforeSaveRecord', function ($formdata) {
            $contact = new Contact();
            $contact->name = $formdata['name'];
            $contact->email = $formdata['email'];
            $contact->subject = $formdata['subject'];
            $contact->message = $formdata['comments'];
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

