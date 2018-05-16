
<?php
/*
Create : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
*/


$apikey = 'bda03cf3b50ed68929a12af793e57ca0';
$apisecret = '86041458e2f3c9d9fe03c50cff814cc6';

require 'Mailjet/vendor/autoload.php';
use \Mailjet\Resources;


$mj = new \Mailjet\Client($apikey, $apisecret);
$body = [
    'Email' => "mementovancouver@gmail.com"
];
$response = $mj->post(Resources::$Sender, ['body' => $body]);
// $response->success() && var_dump($p->getData());
?>

<?php

$group = $_POST["Group_Name"];
$mj = new \Mailjet\Client($apikey, $apisecret,true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "mementovancouver@gmail.com",
                'Name' => "System Administrator"
            ],
            'To' => [
                [
                    'Email' => "cervantes.jfa@gmail.com",
                    'Name' => "Evan Morrow"
                ]
            ],
            'Subject' => "Memento Vancouver: One of your groups is ready to pick an event!",
            'TextPart' => "Please log in to mementovancouver.com to check your groups page, $group is now ready for an event!",
            'HTMLPart' => "<h1>Please log in to mementovancouver.com to check your groups page, " . $group . " is now ready for an event<h1>"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);

?>