
<?php

/*
Create : Manage an email sender for a single API key. An e-mail address or a complete domain (*) has to be registered and validated before being used to send e-mails. In order to manage a sender available across multiple API keys, see the related MetaSender resource.
*/


$apikey = 'bda03cf3b50ed68929a12af793e57ca0';
$apisecret = '86041458e2f3c9d9fe03c50cff814cc6';

require 'Mailjet/vendor/autoload.php';
use Mailjet\Resources;


$mj = new \Mailjet\Client($apikey, $apisecret);
$body = [
    'Email' => "mementovancouver@gmail.com"
];
$response = $mj->post(Resources::$Sender, ['body' => $body]);
// $response->success() && var_dump($p->getData());
?>

<?php

$servername = "localhost";
$dblogin = "evanmorr_team5";
$password = "Team5!Team5!";
$dbname = "evanmorr_mementodb";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$thisgroup = $_POST['Group_Name'];
$sql = "SELECT * FROM tbl_Registration WHERE Group_Name = :GroupName";

$statement = $conn->prepare($sql);
$statement->execute(array(":GroupName" => $_POST['Group_Name']));
$count = $statement->rowCount();
$rows = $statement->fetchAll();

foreach ($rows as $row) {
    $sql2 = "SELECT * FROM tbl_User WHERE User_Name = :UserName";
    $statement2 = $conn->prepare($sql2);
    $statement2->execute(array(":UserName" => $row['User_Name']));
    $count2 = $statement2->rowCount();
    $rows2 = $statement2->fetchAll();

    if ($rows2[0]['User_LastEmail'] != date("Y-m-d")) {
        
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
                        'Email' => $rows2[0]['User_Email'],
                        'Name' => $row['User_Name']
                    ]
                ],
                'Subject' => "Memento Vancouver: Group '" . $thisgroup . "' is ready to pick an event!",
                'TextPart' => "" . $thisgroup . " now has events!",
                'HTMLPart' => "Hey there " . $row['User_Name'] . ", <p>Great news! " . $thisgroup . " is now ready to rock n roll! Please visit www.mementovancouver.com to view your groups available events"
            ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    
        
    // This breaks the email
    $date = date("Y-m-d");
    $sql3 = "UPDATE tbl_User SET User_LastEmail = :Date WHERE User_Name = :UserName";
    $statement3 = $conn->prepare($sql3);
    $statement3->execute(array(":Date" => $date, ":UserName" =>$row['User_Name']));
    }
  
}
$response->success();


?>