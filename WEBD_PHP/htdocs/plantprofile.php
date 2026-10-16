<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title>VertiPlant | Plant Profile</title>
</head>
<style>
    p{
        margin: 0;
    }
    h1{
        margin: 0;
    }
    .button {
        border: none;
        color: white;
        padding: 0px 30px;
        text-align: center;
        display: inline-block;
        font-size: 15px;
        margin: 2px 2px;
        border-radius: 15px;
        cursor: pointer;
    }
    .button1 {background-color: #04AA6D;}

  .container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.container div {
  background-color: #f1f1f1;
  width: 100px;
  margin: 10px;
}
img {
  border-radius: 8px;
}
.box{
        display: flex;
        flex-direction: row;
        gap: 3%;
    }
.boxz{
        display: flex;
        flex-direction: column;
        gap: 3%;
        width: 30%;
        border: 1px solid blue;
    }
.boxy{
        display: flex;
        flex-direction: column;
        height: fit-content;
}
.identitybox{
        display: flex;
        flex-direction: column;
        border: 1px solid darkgreen;
        padding: 3%;
}
h4{
    margin: 0;
}


.boxu{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.estbox{
        display: flex;
        flex-direction: row;
        border: 1px solid darkgreen;
        padding: 3%;
        gap: 5%;
}
.datebox{
    display: flex;
    flex-direction: column;
    background-color: gray;
    border-radius: 10%;
    align-items: center;
}

</style>
<body>
    <b><p>Tower A-1</p></b>
<div class="container">
    <h1>Butterhead Lettuce</h1>
    <button class="button button1">+ Register Plant</button>
</div>

<div class="box">
    <div class="boxz">
        <img src="lettuce.jpg" width="330px" height="200">
        <div class="identitybox">
            <h4>Identity</h4>
            <div class="box">
                <div class="boxy">
                <p>Plant Type</p>
                <p>Asteraceae</p>
                <p>Phenotype</p>
                <p>Lactuca sativa</p>
            </div>
            <div class="boxy">
                <p>Date Planted</p>
                <p>Oct 12, 2026</p>
                <p>Fertilizer Level</p>
                <p>6 - 6 - 4</p>
            </div>
            </div>
        </div>
    </div>

    <div class="boxz">
        <div class="identitybox">
        <h4>Growth Stage</h4>
        <div class="boxu">
            <p>Consistent growth rate observed. Canopy closure expected in 4 days.</p>
        </div>
        </div>

        <div class="estbox">
            <div class="boxy">
                <p>EST. HARVEST</p>
                <p>Nov. 28, 2026</p>
            </div>
            <div class="boxy">
                <div class="datebox">
                    <h1>14</h1>
                    <p>Days</p>
                </div>
            </div>
        </div>
    </div>

    <div class="boxz">
        <div class="estbox">
                <div class="identitybox">
                    <p>Air Temp</p>
                    <h1>24.4 C</h1>
                </div>
                <div class="identitybox">
                    <p>Humidity</p>
                    <h1>65%</h1>
                </div> 
        </div>

        <div class="estbox">
            <div class="identitybox">
                <p>DLI</p>
                <h1>14.2</h1>
            </div>
            <div class="identitybox">
                <p>Water Pressure</p>
                <h1>25 PSI</h1>
            </div>
        </div>
        <div class="identitybox">
            <h2>RECOMMENDED ACTIONS:</h2>
            <p>Lower Water Pressure</p>
        </div>
    </div>
</div>
</body>
</html>