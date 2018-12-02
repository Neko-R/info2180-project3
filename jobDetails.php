
 <?php
 session_start();
 if (isset($_SESSION["id"])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well
    $_SESSION["id"] = $_SESSION["id"];
  }
  ?>
  
  <?php

 require_once('./test/connect.php'); #executing of file to connect database for use
 $jobTitle =$_GET['jobtitle'];
   $result = $conn->prepare("SELECT * FROM jobs WHERE job_title='$jobTitle';");
   $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
    ?>
    <div id="jobDisplay">
     <div id="homeTop">
    <h1 class="nowrap"> <?php  echo $row['job_title'];?></h1><input type="button" id="apply" value="Apply Now" onclick="apply(<?php echo "" . $row["id"]; ?>, <?php echo "" . $_SESSION["id"]; ?>)">
    </div>
    <p1> <?php echo $row['date_posted'];?></p1>
    <p1> <?php echo $row['category'];?></p1>
    <h3><strong><?php echo $row['company_name'];?></strong></h3>
    <h3 class="nospace"><?php echo $row['company_location'];?></h3>
    
    <div>
     <hr>
    <h2>Job Description</h2>
    <p><?php echo $row['job_description'];?></p>
    </div>
    <?php } ?>
    </div>
    
   