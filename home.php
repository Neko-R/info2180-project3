<?php
  session_start();

  if (isset($_SESSION["id"])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well
    $_SESSION["id"] = $_SESSION["id"];
  }
?>
<div id="homeDisplay">
    <div id="homeTop">
        <h1>Dashboard</h1> <input type="button" id="post" value="Post a Job" onclick="sideDisplay('newJob.html')">
    </div>
    
    <div>
        <h4>Available Jobs</h4>
        <table id = "jobdetails">
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Category</th>
                <th>Date</th>
            </tr>
            
            
            <?php
        		require_once('./test/connect.php'); #executing of file to connect database for use
        		
        		$curDate=strtotime(date('M j, Y'));
        		
        		#retrival of records to be displayed
        		$result = $conn->prepare("SELECT * FROM jobs ORDER BY id DESC LIMIT 5");
        		$result->execute();
        		for($i=0; $row = $result->fetch(); $i++){
        		    $datePosted = strtotime($row['date_posted']);
        		    $diff = $curDate - $datePosted;
        		    $period = floor($diff/(60*60*24));
        	?>
        	<tr id="job-row">
        		<td><label><?php echo $row['company_name']; ?></label></td>
        		<td id="job_select" onclick="getJob(event)"><label><?php echo $row['job_title'];?></label></td>
        		<td><label><?php echo $row['category']; ?></label></td>
        		<td><label><?php echo date('M j, Y', strtotime($row['date_posted']));  ?></label><label><?php if($period <= 1){echo " <div class='new_tag'>New</div>"; }?></label></td>
        	</tr>
        	<?php } ?>
        </table>
    </div>
    
    
    <div>
        <h4>Jobs Applied For</h4>
        <table>
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Category</th>
                <th>Date</th>
            </tr>
            
            <?php
            	require_once('./test/connect.php'); #executing of file to connect database for use
            	
            	#retrival of records to be displayed
            	$result = $conn->prepare("SELECT J.*, JA.date_applied FROM jobs J inner join jobs_applied_for JA on J.id = JA.job_id and user_id = :id ORDER BY JA.id ASC");
            	$result->execute(array(':id' =>  $_SESSION["id"]));
            	for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr>
            	<td><label><?php echo $row['company_name']; ?></label></td>
            	<td id ="job_select" onclick="getJob(event)"><label><?php echo $row['job_title']; ?></label></td>
            	<td><label><?php echo $row['category']; ?></label></td>
            	<td><label><?php echo date('M j, Y', strtotime($row['date_applied'])); ?></label></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>