<?php

include('connection.php');




   $sql =<<<EOF
     INSERT INTO salesforce.contact(firstname,lastname,email,phone) VALUES ($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mob']);

     
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>

