<html>
<head>
</head>
<body>
<?php 
$data = "<soap:Envelope>[...]</soap:Envelope>"; 
$tuCurl = curl_init(); 
curl_setopt($tuCurl, CURLOPT_URL, "http://www.yahoo.com/"); 
curl_setopt($tuCurl, CURLOPT_PORT , 80); 
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0); 
curl_setopt($tuCurl, CURLOPT_HEADER, 0); 
curl_setopt($tuCurl, CURLOPT_POST, 1); 
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data); 
//curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data))); 
//curl_setopt($tuCurl, CURLOPT_PORT , 443); 
//curl_setopt($tuCurl, CURLOPT_VERBOSE, 0); 
//curl_setopt($tuCurl, CURLOPT_HEADER, 0); 
//curl_setopt($tuCurl, CURLOPT_SSLVERSION, 3); 
//curl_setopt($tuCurl, CURLOPT_SSLCERT, getcwd() . "/client.pem"); 
//curl_setopt($tuCurl, CURLOPT_SSLKEY, getcwd() . "/keyout.pem"); 
//curl_setopt($tuCurl, CURLOPT_CAINFO, getcwd() . "/ca.pem"); 
//curl_setopt($tuCurl, CURLOPT_POST, 1); 
//curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 1); 
//curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1); 
//curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data); 
//curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data))); 

$tuData = curl_exec($tuCurl); 
if(!curl_errno($tuCurl)){ 
  $info = curl_getinfo($tuCurl); 
  echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url']; 
} else { 
  echo 'Curl error: ' . curl_error($tuCurl); 
} 

curl_close($tuCurl); 
echo $tuData; 
?>
</body>
</html>

