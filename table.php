<?php
include_once ('connection.php');
include_once ('student.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table table-bodered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$query = "SELECT * FROM students";
						$result = mysqli_query($connection, $query);

						if (!is_null($result)) {
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$student = new Student;
									$student->name = $row["name"];
									$student->email = $row["email"];
									$student->phone = $row["phone"];
									
									echo '<tr>
										<td>'.$student->name.'</td>
										<td>'.$student->email.'</td>
										<td>'.$student->phone.'</td>
									</tr>';
								}
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>