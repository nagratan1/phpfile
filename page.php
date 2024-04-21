<?php
 include_once 'dbconn.php';

 if(isset($_REQUEST['page'])){
    $page_name=1;
 }else{
    $page_name ="";
 }
 $pagelimit = 2;
 $initial = ($page_name) * $pagelimit;

 $quary = "SELECT * FROM customerdetails";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_num_rows($result);
 $pages = ceil($row/$pagelimit);

 $quary="SELECT * FROM customerdetails LIMIT".$initial.','.$pagelimit;
 $result = mysqli_query($conn,$quary);
foreach($result as $row){
    echo $row['name'];
}
for($page_name = 1; $page_name<=$total_page;$page_name++){

}


?>