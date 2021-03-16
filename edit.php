<?php
$db = pg_connect("host=ec2-54-145-249-177.compute-1.amazonaws.com port=5432 dbname=d9or597utqf8fr user=avhuqttulgfnie password=89cb66cc15fb996c1a7336cd971e27484e8f5499e9f21390d641343d0e727a55");
?>
<html>
  <head>
    <style>
      
      * {box-sizing: border-box}
/* Add padding to containers */
.container {
  padding: 16px;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.registerbtn:hover {
  opacity:1;
}
/* Add a blue text color to links */
a {
  color: dodgerblue;
}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>
  </head>
  <body>
   
    <form action="#" method="POST">
  <div class="container">
    <h1>Edit Record</h1>
    <p>Please fill in this form to create an Contact.</p>
    <hr>
     <?php
 $cid=$_GET['id'];
$result = pg_query($db,"SELECT id,firstname,lastname,email,phone FROM salesforce.contact where id='$cid'");
$cn=1;
while($row=pg_fetch_assoc($result)){ 
  ?>
 
<label for="email"><b>FirstName</b></label>
    <input type="text" placeholder="Enter FirstName" name="fname" id="fname" value="<?php echo $row['firstname']; ?>" required>
   
    <label for="email"><b>LastName</b></label>
    
    <input type="text" placeholder="Enter LastName" name="lname" id="lname" value="<?php echo $row['lastname']; ?>" required>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email"  value="<?php echo $row['email']; ?>" required>
    <label for="psw"><b>Mobile Number</b></label>
    <input type="text" placeholder="Enter MobileNo" name="mob" id="mob" value="<?php echo $row['phone']; ?>" required>
  
    <hr>
   <?php
  $cn=$cn=1;
}
  ?>
    <button type="submit" class="registerbtn" name="submit">Submit</button>
  </div>
 
</form>
  </body>
</html>

<?php

   
if(isset($_POST['submit'])){


$fname=$_POST['fname'];
$lname=$_POST['lname'];
 $email=$_POST['email'];  
   $mob=$_POST['mob'];
   $sql ="INSERT INTO salesforce.contact(firstname,lastname,email,phone) values('$fname','$lname','$email','$mob')";

     


   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
}
?>
