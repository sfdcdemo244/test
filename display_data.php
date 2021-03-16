<?php
$db = pg_connect("host=ec2-54-145-249-177.compute-1.amazonaws.com port=5432 dbname=d9or597utqf8fr user=avhuqttulgfnie password=89cb66cc15fb996c1a7336cd971e27484e8f5499e9f21390d641343d0e727a55");

if(isset($_GET['id'])){
$id=$_GET['id'];
  

$sql=pg_query($,"delete from salesforce.contact where id='$id'");  

 if ($sql) {
         
echo"<script>alert('Record Deleted');</script>";
  }
  else
    {
    
         
echo"<script>alert('Error');</script>";
       
    }                 
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>

<h2>Zebra Striped Table</h2>
<p>For zebra-striped tables, use the nth-child() selector and add a background-color to all even (or odd) table rows:</p>

<table>
  
  <tr>
    <th>Sr.No.</th>
    <th>FirstName</th>
    <th>Last Name</th>
    <th>Email</th>
        <th>Phone</th>
      <th>Action</th>
  </tr>
  
  <?php
//$db = pg_connect("host=ec2-54-145-249-177.compute-1.amazonaws.com port=5432 dbname=d9or597utqf8fr user=avhuqttulgfnie password=89cb66cc15fb996c1a7336cd971e27484e8f5499e9f21390d641343d0e727a55");
$result = pg_query($db,"SELECT id,firstname,lastname,email,phone FROM salesforce.contact");
$cn=1;
while($row=pg_fetch_assoc($result)){ 
  ?>
  
  <tr>
     <td><?php echo $cn; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['email']; ?></td>
     <td><?php echo $row['phone']; ?></td>
    
    <td><a href="edit.php?id=<?=$row['id']?>">Edit</a></td>
      <td><a href="#?id=<?=$row['id']?> onclick="return confirm('Do you want to Delete');">delete</a></td>
  </tr>

<?php
  $cn=$cn+1;
}
  ?>
</table>

</body>
</html>
