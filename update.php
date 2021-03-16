<?php

   $db = pg_connect("host=ec2-54-145-249-177.compute-1.amazonaws.com port=5432 dbname=d9or597utqf8fr user=avhuqttulgfnie password=89cb66cc15fb996c1a7336cd971e27484e8f5499e9f21390d641343d0e727a55");
if(isset($_POST['submit'])){


$fname=$_POST['fname'];
$lname=$_POST['lname'];
 $email=$_POST['email'];  
   $mob=$_POST['mob'];
  $cid=$_POST['id'];
   $sql ="update salesforce.contact set firstname='$fname',lastname='$lname',email='$email',phone='$phone' where id='$cid' ";

     


   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
}
?>
