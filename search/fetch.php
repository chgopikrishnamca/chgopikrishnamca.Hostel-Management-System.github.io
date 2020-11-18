<?php
$connect = mysqli_connect("localhost", "root", "", "myhostel");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT s.rollno, s.name, s.branch, s.course, s.year, s.join_date, sh.bill FROM student as s, student_hostel as sh 
	WHERE s.rollno LIKE '%".$search."%'
	s.branch LIKE '%".$search."%'
	s.course LIKE '%".$search."%'
	s.name LIKE '%".$search."%'
	";
}
else
{
	$query = "SELECT s.rollno, s.name, s.branch, s.course, s.year, s.join_date, sh.bill FROM student as s, student_hostel as sh WHERE s.rollno=sh.rollno ORDER BY s.rollno";
}
$result = mysqli_query($connect, "$query");
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Roll No</th>
                            <th>Name</th>
                            <th>Branch</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Date of Joined</th>
                            <th>Mess Due</th>
						</tr>';
	while(($row = mysqli_fetch_array($result))>0)
	{
		$output .= '
			<tr>
				<td>'.$row['rollno'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['branch'].'</td>
                            <td>'.$row['course'].'</td>
                            <td>'.$row['year'].'</td>
                            <td>'.$row['join_date'].'</td>
                            <td>'.$row['bill'].'</td>
				
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