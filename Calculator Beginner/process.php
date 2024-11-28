<?php

    echo "<h2>Calculated Value</h2>";
    
    if($_POST["operator"]=='+')
    {
        echo "<b>Addition =</b>";
        echo $_POST["num1"] + $_POST["num2"];
    }
    elseif($_POST["operator"]=='-')
    {
        echo "<b>Substraction =</b>";
        echo $_POST["num1"] - $_POST["num2"];
    }
    elseif($_POST["operator"]=='*')
    {
        echo "<b>Multiplication =</b>";
        echo $_POST["num1"] * $_POST["num2"];
    }
    elseif($_POST["operator"]=='/')
    {
        echo "<b>Division =</b>";
        echo $_POST["num1"] / $_POST["num2"];
    }
    elseif($_POST["operator"]=='%')
    {
        echo "<b>Modulus =</b>";
        echo $_POST["num1"] % $_POST["num2"];
    }
    else
    {
        echo "text-color:red; <b>Error Occured</b>";
    }



?>