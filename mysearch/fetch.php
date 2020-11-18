<?php
$connect = mysqli_connect("localhost", "root", "", "myhostel");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM student as s, student_hostel as sh 
	WHERE s.name LIKE '%".$search."%'
	OR s.branch LIKE '%".$search."%' 
	OR s.course LIKE '%".$search."%' 
	OR s.rollno LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM student as s, student_hostel as sh where s.rollno=sh.rollno ORDER BY rollno";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Roll No</th>
							<th>Name</th>
							<th>Branch</th>
							<th>Course</th>
							<th>Mess Due</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["rollno"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["branch"].'</td>
				<td>'.$row["course"].'</td>
				<td>'.$row["bill"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>