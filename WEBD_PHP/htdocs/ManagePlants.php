<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <link rel="icon" href="Images/logoicon.png">
    <link rel="stylesheet" href="mpStyle.css">
    <title>Manage Plants</title>
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
        padding: 5px;
    }


    .gray {
        background-color: rgb(197, 195, 195);
        display: flex;
        flex-direction: column;
        width: 20%;
        height: 100%;
        padding-left: 3%;
        padding-right: 3%;
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
    .newtask {
        width: fit-content;
        display: flex;
        flex-direction: row;
        background-color: chartreuse;
        border-radius: 5%;
        padding-left: 10px;
        padding-right: 10px;
        color: white;
        position: absolute;
        right: 5%;
    }
    .filter {
        width: fit-content;
        display: flex;
        align-items: center;
        flex-direction: row;
        border: 1px solid black;
        border-radius: 5%;
        padding-left: 20px;
        padding-right: 20px;
        margin-right: 130px;
        color: white;
        position: absolute;
        right: 5%;
    }

/*each tower boxes EUEUUE*/
    .rowTowerbox{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 3%;
        width: 100%;
    }
    h2, h4{
        margin: 0;
    }
    p{
        margin: 0;
        color: rgb(80, 80, 80);
    }
    .towerBox {
        width: 30%;
        height: fit-content;
        border: 1px solid  rgb(197, 195, 195);
        border-radius: 3%;
        display: flex;
        flex-direction: column;
        padding: 15px;
        gap: 10px;
        box-shadow: 0px 8px 10px -10px rgba(0,0,0,0.6);
    }
    h5 {
        color: chartreuse;
        background-color: #F6FFF5;
        border: 1px solid chartreuse;
        border-radius: 50px;
        margin: 10px;
        padding-left: 20px;
        padding-right: 20px;
        align-items: center;
    }
    .rowIbox {
        display: flex;
        flex-direction: row;
        width: 100%;
        align-items: center;
        gap: 5%;
    }
    .columnIbox {
        display: flex;
        flex-direction: column;
    }
    .imgTowerCont{
        width: 30%;
        overflow: hidden;
        margin: 0;
    }
    .imgTower {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background-color: green;
        margin: 0;
    }
    progress{
        accent-color: darkgreen;
        width: 100%;
    }
    .enviImg {
        width: 30%;
        height: 30%;
    }
    .enviBoxes {
        height: 100%;
        width: 100%;
        border: 1px solid darkgreen;
        border-radius: 7%;
        display: flex;
        gap: 10%;
        flex-direction: row;
        align-items: center;
        padding: 2%;
    }
	</style>
</head>



<body>
    <div class="allover">
        <div class="gray" id="text">
            <div class="horizontal">
                <img src="Images/logoicon.png" style="height: 45px; width: 45px; padding-bottom: 8px;"></img>
                <h1 style="color: darkgreen;">VertiPlant</h1>
            </div>
            <div class="navcontainer">
                <img src="Images/dashboard.png"></img>
                Dashboard
            </div>
            <div class="navcontainer">
                <img src="Images/ManagePlants.png"></img>
                Manage Plants
            </div>
            <div class="navcontainer">
                <img src="Images/settings.png"></img>
                Settings
            </div>
            <a class="username" href="logout.php" aria-label="Log out" title="Log out">
                <img src="Images/profile.png" style="height: 20px; width: 25px;">
                Username
            </a>
        </div>


        <div class="white">
            <h1>Manage Plants</h1>
            <div class="row">
                    <p>Monitoring 3 active vertical farming units in Sector A & B.</p>
                <div class="filter">
                    <img src="Images/filter.webp">
                    <button class="greenbutton">Filter </button>
                </div>
                <div class="newtask">
                    <button class="greenbutton">+ New Tower </button>
                </div>
            </div>

            <div class="rowTowerbox">
                <div class="towerBox">
                    <div class="rowIbox">
                        <h2>Tower A-1</h2>
                        <h5>• Optimal</h5>
                    </div>
                    <p>Hydrophonic Rack</p>
                    <div class="rowIbox">
                        <div class="imgTowerCont">
                            <img class="imgTower" src="Images/lettuce.jpg">
                        </div>
                        <div class="columnIbox">
                            <h4>Butterhead Lettuce</h4>
                            <p>Growth Stage: Vegetation</p>
                            <progress id="loading-bar" max="100" value="80"></progress>
                        </div>
                    </div>
                    <p>October 19, 2025</p>
                    <div class="rowIbox">
                        <div class="enviBoxes">
                            <img src="Images/DLI.png" class="enviImg">
                            85%
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/TEMP.png" class="enviImg">
                            22℃
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/humidity.png" class="enviImg">
                            5.8
                        </div>
                    </div>
                </div>

                <div class="towerBox">
                    <div class="rowIbox">
                        <h2>Tower A-2</h2>
                        <h5>• Optimal</h5>
                    </div>
                    <p>Aeroponic Tower</p>
                    <div class="rowIbox">
                        <div class="imgTowerCont">
                            <img class="imgTower" src="Images/basil.jpeg">
                        </div>
                        <div class="columnIbox">
                            <h4>Sweet Basil</h4>
                            <p>Growth Stage: Harvesting</p>
                            <progress id="loading-bar" max="100" value="80"></progress>
                        </div>
                    </div>
                    <p>October 19, 2025</p>
                    <div class="rowIbox">
                        <div class="enviBoxes">
                            <img src="Images/DLI.png" class="enviImg">
                            85%
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/TEMP.png" class="enviImg">
                            22℃
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/humidity.png" class="enviImg">
                            5.8
                        </div>
                    </div>
                </div>

                <div class="towerBox">
                    <div class="rowIbox">
                        <h2>Tower B-1</h2>
                        <h5>• Optimal</h5>
                    </div>
                    <p>Hydrophonic Rack</p>
                    <div class="rowIbox">
                        <div class="imgTowerCont">
                            <img class="imgTower" src="Images/cherrytomatoes.jpeg">
                        </div>
                        <div class="columnIbox">
                            <h4>Cherry Tomatoes</h4>
                            <p>Growth Stage: Flowering</p>
                            <progress id="loading-bar" max="100" value="80"></progress>
                        </div>
                    </div>
                    <p>October 19, 2025</p>
                    <div class="rowIbox">
                        <div class="enviBoxes">
                            <img src="Images/DLI.png" class="enviImg">
                            85%
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/TEMP.png" class="enviImg">
                            22℃
                        </div>
                        <div class="enviBoxes">
                            <img src="Images/humidity.png" class="enviImg">
                            5.8
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</body>
</html>