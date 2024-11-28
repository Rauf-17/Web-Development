
<?php

    if(isset($_POST["radius"]) && trim($_POST["radius"]) != '' )
    {
        $radius = $_POST["radius"];
        
        if(!is_numeric($radius))
        {
            echo "<h2>Wrong Input! Radius Should be Numerical.</h2>";
            exit;
        }
    }

    if($radius < 0)
    {
        echo "<h2>Wrong Input! Radius Can't be Negative.</h2>";
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
    

    


?>