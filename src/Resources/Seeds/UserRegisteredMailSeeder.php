<?php

namespace Railken\LaraOre\Resources\Seeds;

use Illuminate\Database\Seeder;

class UserRegisteredMailSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $am = new \Railken\LaraOre\Action\Email\EmailManager();

        $result = $am->create([
            'name' => 'EMAIL_REGISTRATION',
            'targets' => ["{{user.email}}","admin@admin.com"],
            'mock_data' => '{
    "user": {
        "id":1,
        "name":"GLaDOS",
        "email":"GLaDOS@test.net"
    },
    "token": "ABCD"
}',
            'subject' => 'Welcome to ApertureScience!!',
            'template' => "{% extends 'emails/layout' %}
    {% block main %}
    <div class='title'>
      <h1>Welcome to Aperture Science!!</h1>
    </div>
    <div class='content'>

      <p><b>Hey {{ user.name }},</b></p>

      <p>Allons-y! Thanks for registering an account.</p>

      <p>Just one step more, we'll need to verify your email</p>

      <p>Your code is: <b>{{ token }}</b></p>

      <p>Type the code into the apposite form </p>
      <p>Or simply click the follwing button</p>
      <a class='btn btn-primary' href='{{ web_url }}/confirm-email/{{ token }}'>Verify Email</a>

      <p class='small'>Full link: <i>{{ web_url }}/confirm-email/{{ token }}</i></p>
    </div>
{% endblock %}"
        ]);


        $lm = new \Railken\LaraOre\Core\Listener\ListenerManager();
        $lm->create([
            'name' => 'SEND_EMAIL_ON_REGISTRATION',
            'description' => 'Uhm...',
            'event_class' => 'Core\User\Events\UserRegistered',
            'action_type' => 'Action\Email\Email',
            'action_id' => $result->getResource()->id,
            'enabled' => 1,
        ]);
    }
}
