<?php
session_start();

$newTokenNeeded = false;
if (empty($_SESSION)) {
$newTokenNeeded = true;
} else {
if (!empty($_SESSION) || $_SESSION['expire'] <= time()) {
$newTokenNeeded = true;
}
}

if ($newTokenNeeded) {

$clientId = "0ff3aa1c89c04e1db1fd38a2d6c0721e";
$clientSecret = "bc12fc89f3a44590bc141d169c521234";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/x-www-form-urlencoded',
'Authorization: Basic ' . base64_encode($clientId . ':' . $clientSecret)
]);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
'grant_type' => 'client_credentials'
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch), true);
curl_close($ch);
$_SESSION['token'] = $result['access_token'];

//$_SESSION['token'] = "BQAnxlFlEDLccSf7Xxvo2Y-BNkLk5kHvGGqxDuxstCHJ9mh95nB0L7bmRfhoAPi1wR956zGhdc2FcDMw6yo59ifJMcWo5yGBH5aKEnm0PWWRoG0iXzA";
$_SESSION['expire'] = time() + 3600;
}