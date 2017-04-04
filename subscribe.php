<?php
$apiKey = 'e23949de647d697187d8eefa17491518-us12';
$listId = 'c5dc45ab4a';
$double_optin=false;
$send_welcome=false;
$email_type = 'html';
$email = $_POST['email'];

//replace us3 with your actual datacenter
$submit_url = "http://us12.api.mailchimp.com/1.3/?method=listSubscribe";
$data = array(
    'email_address'=>$email,
    'apikey'=>$apiKey,
    'id' => $listId,
    'double_optin' => $double_optin,
    'send_welcome' => $send_welcome,
    'email_type' => $email_type
);
$payload = json_encode($data);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
 
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
    echo $data->error;
} else {
    echo "<em>You've been added to our email list.</em>";
}