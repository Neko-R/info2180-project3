
<html>
    <head>
        <title> HireMe </title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="scripts.js" type="text/javascript"></script>
        <script src="clientValidation.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="grid">
            <div id="header">HireMe</div>
        
           <div id="navigator">
                <p id="home" onclick="sideDisplay('home.php')"> <img class="icons" src = "./icon/home.png"> <strong> Home </strong></p>
                <p id="addUser" onclick="sideDisplay('addUser.html')"> <img class="icons" src = "./icon/add-user.png"> <strong> Add New User </strong></p>
               <p id="newJob" onclick="sideDisplay('newJob.html')"> <img class="icons" src = "./icon/job.png"> <strong> New Job </strong></p>
                <p id="logout" onclick="logOut()"> <img class="icons" src = "./icon/logout.png"> <strong> Logout </strong></p>
           </div>
        
            <div id="display">
                <?php include_once('home.php'); ?>
            </div>
        </div>        
    </body>
</html>