<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle</title>
</head>
<body>

    <img src="https://www.thecalculator.co/includes/forms/assets/img/sphere%20formulas.jpg" alt="Circle">

    <form action="index.php" method="post">
    <label for="radius">Radius (R): </label>
    <input type="text" name="radius" id="radius" placeholder="Enter radius of the Circle" required><br><br>

    <label for="circle">Calculate: </label>
    <select name="circle" id="circle" required>
        <option value="" disabled selected>Select what you want to Calculate</option>
        <option value="digonal">Digonal</option>
        <option value="area">Area</option>
        <option value="volume">Volume</option>
        <option value="circumference">Circumference</option>
    </select><br><br>

   <input type="submit" name="submit" value="Calculate" style="background-color:orangered; color:aliceblue; padding: 2px;">
   <input type="reset" name="reset" value="Reset" style="background-color:teal; color:aliceblue; padding: 2px;"> <br><br>
    </form>
    

    
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["radius"]) && trim($_POST["radius"]) != '' )
            {
                $radius = $_POST["radius"];
                
                if(!is_numeric($radius))
                {
                    echo "<b style='color: red;'>Error: Radius should be numerical.</b> <br>
                    Please provide a numerical value.";
                    exit;
                }
            }

            if($radius < 0)
            {
                echo "<b style='color: red;'>Error: Radius cannot be negative.</b> <br>
                Please provide a positive value.";
                exit;
            }

            $radius = floatval($radius);

            $digonal = 2 * $radius;
            $area = pi() * pow($radius,2);
            $volume = (4/3) * pi() * pow($radius,3);
            $circumference = 2 * pi() * $radius;

            echo "<h2><u>Calculated Value!</u></h2>";

        if(preg_match('/^[0-9]+([\.0-9]+)?$/',$radius))
        {
            if($_POST["circle"]=='digonal')
            {
                echo "<b>Digonal = </b>" . round($digonal,2). " cm";
            }
            elseif($_POST["circle"]=='area')
            {
                echo "<b>Area = </b>" . round($area,2). " cm<sup>2</sup>";
            }
            elseif($_POST["circle"]=='volume')
            {
                echo "<b>Volume = </b>" . round($volume,2). " m<sup>3</sup>";
            }
            elseif($_POST["circle"]=='circumference')
            {
                echo "<b>Circumference = </b>" . round($circumference,2). " cm";
            }
            else
            {
                echo "<b>Error Occured!</b>";
            }
        }
        else
        {
            echo "<b>Error Occured!</b>";
        }
    }

?>

</body>
</html>
