
<?php    


   $remote=$_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
   print $remote;
      $json  = file_get_contents('https://geolocation-db.com/json/0f761a30-fe14-11e9-b59f-e53803842572');
     $data = json_decode($json);
     print $data->country_name . '<br>';
     print $data->state . '<br>';
     print $data->city . '<br>';
     print $data->IPv4 . '<br>';

?>