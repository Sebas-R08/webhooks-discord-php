<?php 
$webhook = ""; // Aqui debes pegar el link del webhook.
$title = $_POST['title'];
$footer = $_POST['footer'];
$description = $_POST['description'];
$timestamp = date("c", strtotime("now"));
$data = json_encode([
    "username" => "Announcement",
    "avatar_url" => "https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "tts" => false,
    "embeds" => [
        [
            "type" => "rich",
            "title" => "$title",
            "description" => "*$description*",
            "timestamp" => "$timestamp",   
            "color" => hexdec( "D01DB0" ),
            "footer" => [
                "text" => "$footer",
            ],
          
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$send = curl_init( $webhook );
curl_setopt( $send, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $send, CURLOPT_POST, 1);
curl_setopt( $send, CURLOPT_POSTFIELDS, $data);
curl_setopt( $send, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $send, CURLOPT_HEADER, 0);
curl_setopt( $send, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $send );
?> 