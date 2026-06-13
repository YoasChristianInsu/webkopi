<?php 
include 'koneksi.php';

$name=trim($_POST['name'] ??  '');
$email=trim($_POST['email'] ??  '');
$phone_number=trim($_POST['phone_number'] ??  '');
$course_id=(int)($_POST['course_id'] ??  0);
$perticipant_count=(int)($_POST['participant_count'] ??  0);

$sql = "insert into registrations (name, email, phone_number, course_id, participant_count) values(
    '$name', '$email', '$phone_number', $course_id, $perticipant_count
)";

$query = mysqli_query($conn, $sql);

header("Location: index.php");
exit;
?>