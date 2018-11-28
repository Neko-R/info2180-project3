<div id="homeDisplay">
    <div>
        <?php echo $_SESSION["id"]?>
        <h1>Dashboard</h1>

        <input type="button" value="Post a Job" onclick="msg()">
    </div>
    
    <div>
        <h4>Available Jobs</h4>
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
        		$result = $conn->prepare("SELECT * FROM jobs ORDER BY id ASC");
        		$result->execute();
        		for($i=0; $row = $result->fetch(); $i++){
        	?>
        	<tr>
        		<td><label><?php echo $row['company_name']; ?></label></td>
        		<td><label><?php echo $row['job_title']; ?></label></td>
        		<td><label><?php echo $row['category']; ?></label></td>
        		<td><label><?php echo $row['date_posted']; ?></label></td>
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
            	$result = $conn->prepare("SELECT J.* FROM jobs J inner join jobs_applied_for JA on J.id = JA.job_id and user_id = :id ORDER BY JA.id ASC");
            	$result->execute(array(':id' =>  $_SESSION["id"]));
            	for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr>
            	<td><label><?php echo $row['company_name']; ?></label></td>
            	<td><label><?php echo $row['job_title']; ?></label></td>
            	<td><label><?php echo $row['category']; ?></label></td>
            	<td><label><?php echo $row['date']; ?></label></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>