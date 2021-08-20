<?php


$curl = curl_init($variablesllamada);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://callcenter.gcollecto.com.gt/api/v1/makeCall",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('idCampaign' => '448','idAgent' => '77','phone' => '51249673
'),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer bb20409869a4a1c3a922869701a7b60a8de983e0"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
print 'Aqui';