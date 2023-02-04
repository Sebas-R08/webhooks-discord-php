<?php
    $webhook = ""; // Aqui debes pegar el link del webhook.
    $description = $_POST['description'];
    $data = json_encode([
        "username" => "Announcement",
        "avatar_url" => "https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        "content" => "$description",
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