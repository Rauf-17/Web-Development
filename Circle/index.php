<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle</title>
</head>
<body>

    <img src="https://www.thecalculator.co/includes/forms/assets/img/sphere%20formulas.jpg" alt="Circle">

    <form action="process.php" method="post">
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
   <input type="reset" name="reset" value="Reset" style="background-color:teal; color:aliceblue; padding: 2px;">
    </form>
    

</body>
</html>
