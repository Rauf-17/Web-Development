<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Shape</title>
</head>
<body>

<button onclick="window.location.href='index.php';">Back</button> <hr>
<h2>Measurement for Selected Shape</h2>

<div>

<?php

    if(isset($_POST["process"]) && isset($_POST["shapes"]))
    {
        $shape = $_POST["shapes"];
        echo '<h3 style = "color:green;">You Selected '. ucfirst($shape). '!</h3>';
        echo '<form action="process.php" method="post">';
        echo '<input type = "hidden" name = "shapes" value = "'.$shape.'">';

        // Field for individual shape
        if($shape == 'triangle')
        {
            echo '<label for = "base"><b>Base:</b></label> <input type = "text" name = "base" id = "base" required><br><br> ';
            echo '<label for = "height"><b>Height:</b></label> <input type = "text" name = "height" id = "height" required><br><br> ';
        }
        elseif($shape == 'rectangle')
        {
            echo '<label for = "height"><b>Height:</b></label> <input type = "text" name = "height" id = "height" required><br><br> ';
            echo '<label for = "width"><b>Width:</b></label> <input type = "text" name = "width" id = "width" required><br><br> ';
        }
        elseif($shape == 'square')
        {
            echo '<label for = "side"><b>Side:</b></label> <input type = "text" name = "side" id = "side" required><br><br> ';
        }
        elseif($shape == 'circle')
        {
            echo '<label for = "radius"><b>Radius:</b></label> <input type = "text" name = "radius" id = "radius" required><br><br> ';
        }
        elseif($shape == 'hexagon')
        {
            echo '<label for = "side"><b>Side:</b></label> <input type = "text" name = "side" id = "side" required><br><br> ';
        }

        // Calculation Choose
        echo '<label for = "calculation"><b>Calculate:</b></label>
        <select name ="calculation" id = "calculation" style="background-color:lightgray;" required>
        <option value = "" disabled selected >Select(e.g., Area,Diagonal)</option>';

        if($shape == 'circle')
        {
            echo '<option value = "area">Area</option>';
            echo '<option value = "volume">Volume</option>';
            echo '<option value = "diagonal">Diagonal</option>';
        }
        else
        {
            echo '<option value = "area">Area</option>';
            echo '<option value = "diagonal">Diagonal</option>';
        }
        echo '</select> <br><br>';
        echo '<button type = "submit" name = "calculate" id = "calculate" style = "background-color:blue; color:white; margin-right: 5px;">Calculate</button>';
        echo '<button type="reset" name="reset" style="background-color:lightgrey; color: black;">Reset</button>';
        echo '</form>';   
    }

    if(isset($_POST['calculate']) && isset($_POST['shapes']) && isset($_POST['calculation']))
    {
        $shape = $_POST['shapes'];
        $calculation = $_POST['calculation'];
        $result = null;
        $error = false;

        // Validation and Calculation for each shape
        if($shape == 'triangle')
        {
            $base = $_POST['base'];
            $height = $_POST['height'];

            if(!preg_match('/^-?\d+(\.\d+)?$/', $base) || $base < 0)
            {
                echo '<h3 style = "color:red;">Base can\'t be letters or negative values! </h3>';
                echo '<></>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!preg_match('/^-?\d+(\.\d+)?$/', $height) || $height < 0)
            {
                echo '<h3 style = "color:red;">Height can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!$error)
            {
                if($calculation == 'area')
                {
                    $result = (1/2) * $base * $height;
                    echo '<h3>Area of Triangle: '. $result. ' cm<sup>2</sup> </h3>';
                }
                elseif($calculation == 'diagonal')
                {
                    $result = sqrt(pow($base, 2) + pow($height, 2));
                    echo '<h3>Diagonal of Triangle: '. $result. ' cm </h3>';
                }
            }
        }
        elseif($shape == 'rectangle')
        {
            $width = $_POST['width'];
            $height = $_POST['height'];

            if(!preg_match('/^-?\d+(\.\d+)?$/', $width) || $width < 0)
            {
                echo '<h3 style = "color:red;">Width can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!preg_match('/^-?\d+(\.\d+)?$/', $height) || $height < 0)
            {
                echo '<h3 style = "color:red;">Height can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!$error)
            {
                if($calculation == 'area')
                {
                    $result = $width * $height;
                    echo '<h3>Area of Rectangle: '. $result. ' cm<sup>2</sup> </h3>';
                }
                elseif($calculation == 'diagonal')
                {
                    $result = sqrt(pow($width, 2) + pow($height, 2));
                    echo '<h3>Diagonal of Rectangle: '. $result. ' cm </h3>';
                }
            }
        }
        elseif($shape == 'square')
        {
            $side = $_POST['side'];

            if(!preg_match('/^-?\d+(\.\d+)?$/', $side) || $side < 0)
            {
                echo '<h3 style = "color:red;">Side can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!$error)
            {
                if($calculation == 'area')
                {
                    $result = pow($side, 2);
                    echo '<h3>Area of Square: '. $result. ' cm<sup>2</sup> </h3>';
                }
                elseif($calculation == 'diagonal')
                {
                    $result = $side * sqrt(2);
                    echo '<h3>Diagonal of Square: '. $result. ' cm </h3>';
                }
            }
        }
        elseif($shape == 'circle')
        {
            $radius = $_POST['radius'];

            if(!preg_match('/^-?\d+(\.\d+)?$/', $radius) || $radius < 0)
            {
                echo '<h3 style = "color:red;">Radius can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }

            if(!$error)
            {
                if($calculation == 'area')
                {
                    $result = pi() * pow($radius, 2);
                    echo '<h3>Area of Circle: '. $result. ' cm<sup>2</sup> </h3>';
                }
                elseif($calculation == 'diagonal')
                {
                    $result = 2 * $radius;
                    echo '<h3>Diagonal of Circle: '. $result. ' cm </h3>';
                }
                elseif($calculation == 'volume')
                {
                    $result = (4/3) * pi() * pow($radius, 3);
                    echo '<h3>Volume of Sphere: '. $result. ' cm<sup>3</sup> </h3>';
                }
            }
        }
        elseif ($shape == 'hexagon') 
        {
            $side = $_POST['side'];
    
            if(!preg_match('/^-?\d+(\.\d+)?$/', $side) || $side < 0)
            {
                echo '<h3 style = "color:red;">Sides can\'t be letters or negative values! </h3>';
                echo '<b>Please Provide Real Number.</b>';
                $error = true;
            }
    
            if(!$error)
            {
                if($calculation == 'area')
                {
                    $result = ((3 * sqrt(3)) / 2) * pow($side, 2);
                    echo "<h3>Area of Hexagon: ". round($result, 2). " cm<sup>2</sup></h3>";
                }
                elseif($calculation == 'diagonal')
                {
                    $result = 2 * $side;
                    echo "<h3>Diagonal of Hexagon: ". round($result, 2). " cm</h3>";
                }
            }
        }
    }

?>

</div>

</body>
</html>
