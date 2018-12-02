<?php
$message = "";

require_once('connect.php'); #'inclusion' of php file to connect database for use

// prepare and bind
$stmt = $conn->prepare("INSERT INTO jobs_applied_for (job_id, user_id, date_applied) VALUES (:job, :user, :date)");
$stmt->bindParam(':job', $jobId);
$stmt->bindParam(':user', $userId);
$stmt->bindParam(':date', $date);

$jobId = $_POST['job_id'];
$userId = $_POST['user_id'];
$date = date("Y-m-d");

$stmt->execute();
echo "New records created successfully";
header("location: ../parentPage.php");
