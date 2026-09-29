<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    * {
    box-sizing: border-box;
    }
    body {
        margin: 0;
        background-color: darkgreen;
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
    }
    .navcontainer {
        display: flex;
        flex-direction: row;
        background-color: chartreuse;
        border-radius: 50px;
        margin: 10px;
        padding-left: 20px;
        align-items: center;
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
    }
    .newtask {
        width: fit-content;
        display: flex;
        flex-direction: row;
        background-color: darkgreen;
        border-radius: 50px;
        padding-left: 10px;
        padding-right: 10px;
        color: white;
        position: absolute;
        right: 5%;
    }
    .circleimg{
        background-color: darkgreen;
        border-radius: 100px;
        height: 50px;
        width: 50px;
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
        border-color: rgb(197, 195, 195);
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
        align-items: center;
        gap: 1px;
    }
    .bglist {
        display: flex;
        flex-direction: row;
        width: 93%;
        background-color: darkgreen;
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
        border-color: rgb(197, 195, 195);
        border-color: green;
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        padding-left: 20px;
        padding-right: 20px;
        align-items: center;
        padding-bottom: 15px;
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
    }
    .redcontainer {
        display: flex;
        flex-direction: column;
        padding-left: 10px;
        padding-right: 10px;
        height: fit-content;
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
                <h1 style="color: darkgreen;">VertiPlant</h1>
            </div>
            <div class="navcontainer">
                <img src="Images/dashboard.png"></img>
                <p>Dashboard</p>
            </div>
            <div class="navcontainer">
                <img src="Images/ManagePlants.png"></img>
                <p>Manage Plants</p>
            </div>
            <div class="navcontainer">
                <img src="Images/settings.png"></img>
                <p>Settings</p>
            </div>
            <div class="username">
                <img src="Images/profile.png" style="height: 20px; width: 25px;">
                <p>Username</p>
            </div>
        </div>


        <div class="white">
            <h1>Good morning, User</h1>
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
                            <img src="Images/info.png" style="height: 20px; width: 27px; margin-top: 15px;">
                        </div>
                        <div class="redcontainer">
                            <p>Tower A: Risk of overwatering <br>
                            See tower A to adjust water pressure.</p>
                        </div>
                    </div>
                    <div class="green">
                        <div class="redcontainer">
                            <img src="Images/info.png" style="height: 20px; width: 27px; margin-top: 15px;">
                        </div>
                        <div class="redcontainer">
                            <p>Tower A: Risk of overwatering <br>
                            See tower A to adjust water pressure.</p>
                        </div>
                    </div>
                    <button class="viewlogsbutton">View All Logs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footcontainer">
            <div class="horizontal2">
            <img src="Images/logoicon.png" style="height: 45px; width: 45px; padding-top: 8px;"></img>
            <h2>VertiPlant</h2>
            </div>
            <button class="gobackbutton">Go back to top</button>
        </div>
        <div class="footcontainer">
            <p>We aim to contribute to a sustainable future<br>through our services.</p>
            <p>img</p>
        </div>
        <div class="footcontainer">
            <h3>Site Map</h3>
            <button class="otherbutton">Dashboard</button>
            <button class="otherbutton">Manage Plants</button>
            <button class="otherbutton">Settings</button>
        </div>
        <div class="footcontainer">
            <h3>Legal</h3>
            <button class="otherbutton">Privacy Policy</button>
            <button class="otherbutton">Terms of Services</button>
        </div>
        <div class="footcontainer">
            <h3>Help & Support</h3>
            <button class="otherbutton">s2343849@gmail.com</button>
            <button class="otherbutton">+65 348 303 0494</button>
        </div>
    </div>
    
</body>
</html>