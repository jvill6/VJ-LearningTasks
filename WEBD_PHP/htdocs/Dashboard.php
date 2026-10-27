<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: index.php');
    exit;
}

$displayName = trim(($_SESSION['user_fName'] ?? '') . ' ' . ($_SESSION['user_lName'] ?? ''));
if ($displayName === '') {
    $displayName = $_SESSION['user_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <link rel="icon" href="Images/logoicon.png">
    <title>Dashboard</title>
</head>

<style>
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        background-color: #2c653d;
        width: 100%;
    }
    .allover{
        height: 100vh;
        display: flex;
        flex-direction: row;
    }
    img {
        width: 21px;
        height: 15px;
        padding-right: 7px;
    }
    button {
        background: none;
        border: 0;
        
    }
    .greenbutton {
        background: none;
        border: 0;
        color: white;
    }


    
    .gray {
        background-color: rgb(197, 195, 195);
        display: flex;
        flex-direction: column;
        width: 20%;
        height: 100%;
        padding-left: 3%;
        padding-right: 3%;
        border-style: solid;
        border: 0px 0px 0px 0px;
        border-left: 2px #ccc;
        border-color: #73A473;
    }
    .navcontainer {
        display: flex;
        flex-direction: row;
        border-radius: 50px;
        margin: 20px;
        padding-left: 20px;
        align-items: center;
    } .navcontainer:hover {
        background-color: chartreuse;
        padding: 10px;
    }
    .horizontal {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .horizontal2 {
        display: flex;
        flex-direction: row;
    }
    .username {
        display: flex;
        flex-direction: row;
        position: absolute;
        bottom: 0;
        align-items: center;
        margin-left: 25px;
        margin-bottom: 20px;
        color: inherit;
        text-decoration: none;
        cursor: pointer;
    }
    


    .white {
        width: 100%;
        height: 100%;
        padding-left: 5%;
        padding-right: 5%;
        background-color: white;
        display: flex;
        flex-direction: column;
    }
    .row {
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 30px;
        margin-bottom: 30px;
    }
    .incontainer {
        display: flex;
        flex-direction: row;
        width: fit-content;
        gap: 70px;
        align-items: center;
    }
    .container {
        width: 100%;
        border: solid;
        border-color: rgb(197, 195, 195);
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        padding-left: 20px;
        padding-right: 20px;
        box-shadow: 0px 8px 10px -5px rgba(0,0,0,0.6)
    }
    .newtask {
        width: fit-content;
        display: flex;
        flex-direction: row;
        background-color: #2c653d;
        border-radius: 50px;
        padding-left: 10px;
        padding-right: 10px;
        color: white;
        position: absolute;
        right: 5%;
    }
    .circleimg{
        background-color: darkseagreen;
        border-radius: 100px;
        height: fit-content;
        width: fit-content;
    }



    .row2 {
        height: 100%;
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 30px;
    }
    .taskcontainer {
        width: 100%;
        height: fit-content;
        border: solid;
        border-color: rgb(197, 195, 195);
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        padding-left: 20px;
        padding-right: 20px;
        box-shadow: 0px 8px 10px -5px rgba(0,0,0,0.6)
    }
    /* .filter {
        width: fit-content;
        display: flex;
        flex-direction: row;
        background-color: darkgreen;
        border-radius: 50px;
        padding-left: 10px;
        padding-right: 10px;
        color: white;
        position: absolute;
    } */
    .listcontainer {
        width: 100%;
        height: 100%;
        border: solid;
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
        align-items: center;
        padding: 10px;
        gap: 1px;
    }
    .bglist {
        display: flex;
        flex-direction: row;
        width: 98%;
        background-color: #2c653d;
        border-radius: 10px;
        margin: 5px;
        gap: 5px;
        padding-left: 10px;
        padding-right: 10px;   
    }
    .textWhite{
        color: white;
    }


    .alertscontainer {
        width: 40%;
        height: fit-content;
        border: solid;
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        padding-left: 20px;
        padding-right: 20px;
        align-items: center;
        padding-bottom: 15px;
        box-shadow: 0px 8px 10px -5px rgba(0,0,0,0.6)
    }
    .alerts2container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .red {
        display: flex;
        flex-direction: row;
        background-color:lightpink;
        border-radius: 10px;
        width: 100%;
        border: solid;
        border-color: darksalmon;
        border-width: 1px;
        height: fit-content;
        padding:15px;
    }
    .redcontainer {
        display: flex;
        flex-direction: column;
        height: fit-content;
        font-size: 13.5px;
        gap: 10px;
    }
    .green {
        display: flex;
        flex-direction: row;
        background-color: darkseagreen;
        border-radius: 10px;
        width: 100%;
        border: solid;
        border-color: limegreen;
        border-width: 1px;
        padding:15px;
    }
    .viewlogsbutton {
        width: 100%;
        display: flex;
        flex-direction: row;
        border: solid;
        border-color: darkgreen;
        border-radius: 50px;
        border-width: 1px;
        justify-content: center;
        align-items: center;
    }
	.fonttime {
        font-size: 10px;
    }

    


    .footer {
        color: white;
        margin: 0;
        width: 100%;
        height: fit-content;
        display: flex;
        flex-direction: row;
        padding-left: 50px;
        gap: 10%;
    }
    .footcontainer {
        display: flex;
        flex-direction: column;
    }
    .gobackbutton {
        width: 100%;
        display: flex;
        flex-direction: row;
        border: solid;
        border-color: white;
        color: white;
        border-radius: 50px;
        border-width: 1px;
        justify-content: center;
    }
    .otherbutton {
        width: 100%;
        display: flex;
        flex-direction: row;
        color: white;
        border-radius: 50px;
        border-width: 1px;
    }

</style>



<body>
    <div class="allover">
        <div class="gray">
            <div class="horizontal">
                <img src="Images/logoicon.png" style="height: 45px; width: 45px; padding-bottom: 8px;"></img>
                <h1 style="color: #2c653d;">VertiPlant</h1>
            </div>
            <div class="navcontainer">
                <img src="Images/dashboard.png"></img>
                <p style="font-size: 13.5px;">Dashboard</p>
            </div>
            <div class="navcontainer">
                <img src="Images/ManagePlants.png"></img>
                <p style="font-size: 13.5px;">Manage Plants</p>
            </div>
            <div class="navcontainer">
                <img src="Images/settings.png"></img>
                <p style="font-size: 13.5px;">Settings</p>
            </div>
            <a class="username" href="logout.php" aria-label="Log out" title="Log out">
                <img src="Images/profile.png" style="height: 20px; width: 25px;">
                <p><?= htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8') ?></p>
            </a>
        </div>


        <div class="white">
            <h1>Good morning, <?= htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8') ?></h1>
             <div class="row">
                    System status is optional 2 alerts require attention.
                <div class="newtask">
                    <button class="greenbutton">+ New Task </button>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="incontainer">
                        <p>Overall Farm Towers</p>
                        <img src="Images/farmtowers.png" style="height: 25px; width: 25px;" class="circleimg"></img>
                    </div>
                    <h1>2/3</h1>
                </div>
                <div class="container">
                    <div class="incontainer">
                        <p>Average Humidity</p>
                        <img src="Images/humidity.png" style="height: 25px; width: 25px;" class="circleimg"></img>
                    </div>
                    <h1>65%</h1>
                </div>
                <div class="container">
                    <div class="incontainer">
                        <p>Water Reservoir</p>
                        <img src="Images/reservoir.png" style="height: 25px; width: 25px;" class="circleimg"></img>
                    </div>
                    <h1>82%</h1>
                </div>
            </div>


            <div class="row2">
                <div class="taskcontainer">
                    <h2>Task List:</h2>
                    <!-- <button class="filter">Filter</button> -->
                    <div class="listcontainer">
                        <div class="bglist">
                            <p class="textWhite">TOWER A:</p>
                            <p class="textWhite">Needs cleaning</p>
                        </div>
                        <div class="bglist">
                            <p class="textWhite">TOWER B:</p>
                            <p class="textWhite">Needs cleaning</p>
                        </div>
                    </div>
                </div>
                
                <div class="alertscontainer">
                    <div class="horizontal">
                        <img src="Images/alert.png">
                        <h2>Quick Alerts</h2>
                    </div>
                    <div class="alerts2container">
                    <div class="red">
                        <div class="redcontainer">
                            <img src="Images/info.png" style="height: 15px; width: 22px;">
                        </div>
                        <div class="redcontainer">
                            <span>Tower A: Risk of overwatering</span>
                            <span>See tower A to adjust water pressure.</span>
                            <span class="fonttime">5 mins ago</span>
                        </div>
                    </div>
                    <div class="green">
                        <div class="redcontainer">
                            <img src="Images/info.png" style="height: 15px; width: 22px;">
                        </div>
                        <div class="redcontainer">
                            <span>Tower B: Harvest Window Approaching</span>
                            <span>Lettuce Butterhead in Tower A ready in 48 hours.</span>
                            <span class="fonttime">2 hours ago</span>
                        </div>
                    </div>
                    <button class="viewlogsbutton">View All Logs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php';?>
    
</body>
</html>