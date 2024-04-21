<?php 
session_start ();
if(!isset($_SESSION["res"]))
	header("location:index.php");


?>
<!DOCTYPE html>
<html>
<head>





<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</style>
</head>
<body>

<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="add.php"> Add Frofile</a></li>
  <li><a href="view.php">File Description</a></li>
  <li style="float:right;text-color:red"><a class="active" href="logout.php">LogOut</a></li>
</ul>


<table style="margin-top:30px" >
  <tr>
    <th> Name</th>
    <th>Email</th>
    <th>Photo</th>
    <th>Download image</th>
    <th>Phone</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>country</th>
    <th>Zip Code</th>
    <th>Qualification</th>
   
    <th>Time_Stamp</th>
    <th>Download</th>
    <th>Action</th>

  </tr>
  

</thead>
<thody>       
<?php


$conn = mysqli_connect("localhost","root","","customers");

// echo '<pre>'; print_r($conn); 
// die;


   if(isset($_GET['page'])){
    $page_name=$_GET['page'];
 }else{
    $page_name =1;
 }
 $pagelimit = 5;
 $initial = ($page_name-1) * $pagelimit;

 $sql = "SELECT * FROM customerdetails";
 $result = mysqli_query($conn,$sql);
 $rows = mysqli_num_rows($result);
 $pages = ceil($rows/$pagelimit);

//  echo $pages; die;
   
   $select = "SELECT * FROM `customerdetails`LIMIT " .$initial.','.$pagelimit; 
   $resul2t = mysqli_query($conn, $select);
  //  echo '<pre>';
  //  print_r($select); // die;
   if ($rows2 = mysqli_num_rows($result) > 0){
   foreach($result as $rows){ 
      
   ?>
    <tr>
                                
                                <td> <?php echo $rows['name'];?> </td>
                                <td> <?php echo $rows['email']; ?> </td>
                                <td><?php echo $rows['user_photo_file'];?>"</td>
                                <td><a download="" target="_blank" href="http://localhost/customers/upload/<?php echo $rows['user_photo_file']; ?>">download</a></td>   
                                <td> <?php echo $rows['phone'];?> </td>
                                 <td> <?php echo $rows['address']; ?> </td>
                                 <td> <?php echo $rows['city']; ?> </td>
                                 <td> <?php echo $rows['state']; ?> </td>
                                 <td> <?php echo $rows['country']; ?> </td>
                                 <td> <?php echo $rows['zip']; ?> </td>
                                 <td> <?php echo $rows['qualification']; ?> </td>
                                
                                <td> <?php echo $rows['timpstamp']; ?> </td>
                                <td><a href="download.php?id=<?php echo $rows['id'];?>">download</a></td>
                                
                                <td >
                                   <a href="edit.php?id=<?php echo $rows['id'];?>">Edit</a>
                                    <a href="delete.php?id=<?php echo $rows['id'];?>" onclick="return confirm('Are you sure you want to delete this entry?')"> delete</a>
                                    
                                   
                                 </td>
                            
                            <?php }} ?>
                         </td>
                        
    </tr> 
                       

</table>
<?php
              
for($page_name=1; $page_name<=$pages; $page_name++)
echo '<a href="home1.php?page='  . $page_name .  '">'  .  $page_name  .  ' &nbsp</a>';
?>
</body>
</html>


