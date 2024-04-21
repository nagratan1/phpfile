<?php 
include "config.php";

?>
<!doctype html>
<html>
    <head>
        <title>Makitweb - How to Export MySQL Table data as CSV file in PHP</title>
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            
            
                
            <table border='1' style='border-collapse:collapse;'>
                
            <?php 
            
            $query = "SELECT * FROM customerdetails WHERE id =".$_REQUEST['id']."";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            foreach($result as $row){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $photopic = $row['user_photo_file'];
                $phone = $row['phone'];
                $address= $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $country = $row['country'];
                $zip = $row['zip'];
                $qualification = $row['qualification'];

                $user_arr[] = array($id,$name,$email,$photopic,$phone,$address,$city,$state,$country,$zip,$qualification);
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $photopic; ?></td>
                    <td><?php echo $phone; ?></td> 
                    <td><?php echo $address; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $state; ?></td>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $zip; ?></td>
                    <td><?php echo $qualification; ?></td>
                </tr>
            <?php
            }
            ?>
            </table>
            <?php 
            $serialize_user_arr = serialize($user_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
            </form>
        </div>
    </body>
</html>

<?php
$filename = 'customerdetails.exl';
$export_data = unserialize($_POST['export_data']);

// file creation
$file = fopen($filename,"w");

foreach ($export_data as $line){
  fputcsv($file,$line);
}

fclose($file); 

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/exl; "); 

readfile($filename);

// deleting file
unlink($filename);
exit();
?>