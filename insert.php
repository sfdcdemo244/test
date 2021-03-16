<?php

include('connection.php');


$query = "INSERT INTO salesforce.contact(firstname,lastname,email,phone) VALUES ($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mob'])";

$result = pg_query($query); 


echo"print";

?>
