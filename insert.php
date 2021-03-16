<?php

$host        = "host=ec2-54-145-249-177.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname = d9or597utqf8fr";
   $credentials = "user = avhuqttulgfnie password=89cb66cc15fb996c1a7336cd971e27484e8f5499e9f21390d641343d0e727a55";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }



$query = "INSERT INTO salesforce.contact(firstname, lastname, email, phone) VALUES ($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mob'])";

$result = pg_query($query); 




?>
