<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<canvas id="canvas" width="350" height="450"></canvas>
<script>

    var boxes = [[110, 340, 4, 5, "white", "../sounds/1.wav"]];
    var canvas;
    var ctx;
    var cw;
    var ch;

    $(document).ready(function() {
        //Canvas stuff
        canvas = $("#canvas")[0];
        ctx = canvas.getContext("2d");
        cw = $("#canvas").width();
        ch = $("#canvas").height();
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, cw, ch);
        ctx.strokeStyle = "black";
        ctx.strokeRect(0, 0, cw, ch);




        //alert(boxes[0][5].toString());
        var fillCounter = 1;
       var game_loop = setInterval(paint, 10);

    });

    function paint(){

    for (i = 0; i < boxes.length; i++) {
        var audio1 = new Audio(boxes[i][5].toString());
        if (boxes[i][0] >= 340 || boxes[i][0]< 0) {
            boxes[i][2] *= -1;
            audio1.play();
        }
        if (boxes[i][1] >= 450 || boxes[i][1] < 0) {
            boxes[i][3] *= -1;
            audio1.play();
        }
        boxes[i][0] += boxes[i][2];
        boxes[i][1] += boxes[i][3];

        ctx.fillStyle = boxes[i][4];
        ctx.fillRect(boxes[i][0], boxes[i][1], 10, 10);
        ctx.strokeStyle = "black";
        ctx.strokeRect(boxes[i][0], boxes[i][1], 10, 10);
             }
        }

    /*$(document).keydown(function(e){
        var key = e.which;

        if(key == "37"){x--;
        }
        else if(key == "38"){ y--;
        }
        else if(key == "39"){x++;
        }
        else if(key == "40"){ y++;
        }
        else if(key == "40"){ y++;
        }


    })*/

        function addSquare(){

            var color = document.getElementById("colorMenu").value;
            var pitch = document.getElementById("pitchMenu").value;
            var xSpeed = document.getElementById("xSpeed").value;
            var ySpeed = document.getElementById("ySpeed").value;
            boxes.push([10, 340, parseInt(xSpeed), parseInt(ySpeed), color, "../sounds/" + pitch]);
        }

        function clearBoard(){
            boxes = [];

            ctx.fillStyle = "white";
            ctx.fillRect(0, 0, cw, ch);
            ctx.strokeStyle = "black";
            ctx.strokeRect(0, 0, cw, ch);
        }

</script>
Color:
<select id="colorMenu">
    <option value="red">red</option>
    <option value="yellow">yellow</option>
    <option value="green">green</option>
    <option value="blue">blue</option>
    <option value="orange">orange</option>
    <option value="brown">brown</option>
    <option value="purple">purple</option>
    <option value="white">white</option>
</select> Harmonic Interval:
<select id="pitchMenu">
    <option value="1.wav">1</option>
    <option value="min2.wav">b2</option>
    <option value="M2.wav">2</option>
    <option value="min3.wav">b3</option>
    <option value="M3.wav">3</option>
    <option value="4.wav">4</option>
    <option value="b5.wav">b5</option>
    <option value="5.wav">5</option>
    <option value="min6.wav">b6</option>
    <option value="M6.wav">6</option>
    <option value="min7.wav">b7</option>
    <option value="M7.wav">7</option>
    <option>No Sound</option>
</select>X Speed:
<select id="xSpeed">
    <option value=5>5</option>
    <option value=4 selected>4</option>
    <option value=3>3</option>
    <option value=2>2</option>
    <option value=1>1</option>
    <option value=0>0</option>
    <option value=-1>-1</option>
    <option value=-2>-2</option>
    <option value=-3>-3</option>
    <option value=-4>-4</option>
    <option value=-5>-5</option>
</select>Y Speed:
<select id="ySpeed">
    <option value=5 selected>5</option>
    <option value=4>4</option>
    <option value=3>3</option>
    <option value=2>2</option>
    <option value=1>1</option>
    <option value=0>0</option>
    <option value=-1>-1</option>
    <option value=-2>-2</option>
    <option value=-3>-3</option>
    <option value=-4>-4</option>
    <option value=-5>-5</option>
</select>

<button onClick="addSquare()">Add</button>
<br>
<button onClick="clearBoard()">Clear Board</button>
</body>
</html>