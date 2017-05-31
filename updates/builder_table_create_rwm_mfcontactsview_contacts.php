<?php namespace Rwm\MfContactsView\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRwmMfcontactsviewContacts extends Migration
{
    public function up()
    {
        Schema::create('rwm_mfcontactsview_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 128)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('subject', 255)->nullable();
            $table->text('message');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rwm_mfcontactsview_contacts');
    }
}
