<!DOCTYPE html>

<head>
    <title> HireMe </title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" type="text/javascript"></script>
</head>

<body>

    <div id="grid">
        <div id="header">HireMe</div>

        <div id="navigator">
            <p id="home" onclick="sideDisplay('home')"> <img class="icons" src = "./icon/home.png"> <strong> Home </strong></p>
            <p id="addUser" onclick="sideDisplay('addUser')"> <img class="icons" src = "./icon/add-user.png"> <strong> Add User </strong></p>
            <p id="newJob" onclick="sideDisplay('newJob')"> <img class="icons" src = "./icon/job.png"> <strong> New Job </strong></p>
            <p id="logout" onclick="sideDisplay('logout')"> <img class="icons" src = "./icon/logout.png"> <strong> Logout </strong></p>
        </div>
    
        <div id="display">
    
        </div>
    </div>
    
</body>