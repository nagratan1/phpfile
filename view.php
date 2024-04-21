<?php include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>

*{
	margin: 0; padding: 0; box-sizing: border-box;
}
body{
	justify-content: center;
	align-items: center;
}
.form-input{
	max-width: 400px;
}
table{
	border-collapse: collapse;
	background-color: #fff;
	border-radius: 10px;
	margin: auto;
}
th,td{
	border: 1px solid #dfdede;
	padding: 8px 25px;
	justify-content: center;
	text-align: center;
	align-items: center;
	color: grey;
}
th{
	text-transform: uppercase;
	font-weight: 900;
}
td{ font-size: 1.2rem; }
</style>
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<strong>Fill UserName and Upload PDF</strong>
				<form method="post" enctype="multipart/form-data">
					<?php
						
						if (isset($_POST['submit']))
						{
						$name = $_POST['name'];					

						if (isset($_FILES['pdf_file']['name']))
						{
						$file_name = $_FILES['pdf_file']['name'];
							$file_tmp = $_FILES['pdf_file']['tmp_name'];
							$target = "uploads/".basename($file_name);
							move_uploaded_file($file_tmp,"".$file_name);
							$insertquery =
							"INSERT INTO pdf_data(name,filename) VALUES('$name','$file_name')";
							$iquery = mysqli_query($con, $insertquery);	

								if ($iquery)
							{							
					?>	<div class=
								"alert alert-success alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Success!</strong> Data submitted successfully.
								</div>
								<?php
								}
								else
								{
								?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Failed!</strong> Try Again!
								</div>
								<?php
								}
							}
							else
							{
							?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
								<a class="close" data-dismiss="alert" aria-label="close">
									×
								</a>
								<strong>Failed!</strong> File must be uploaded in PDF format!
								</div>
							<?php
							}
						}
					?>
					<div class="form-input py-2">
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter your name" name="name">
						</div>								
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept="any" required/>
						</div>
						<div class="form-group">
							<input type="submit"
								class="btnRegister" name="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>		
			
			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Records from Database</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>ID</th>
							<th>UserName</th>
							<th>FileName</th>
							
							<th>Download file</th>
							<th>Delete</th>
						</thead>
						<tbody>
						<?php
							$selectQuery = "select * from pdf_data";
							$squery = mysqli_query($con, $selectQuery);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['filename']; ?></td>
							
							<td><a href="download.php?id=<?php echo $result['id'];?>">Dowmload</a></td>
							<td><a href="delete1.php?id=<?php echo $result['id'];?>" onclick="return confirm('Are you sure you want to delete this entry?')"> delete</a>
							</td>			
						</tr>
						<?php
							}
						?>
						</tbody>
					</table>			
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php


?>