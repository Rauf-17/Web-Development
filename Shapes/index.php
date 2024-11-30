<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometric Measurements</title>
</head>
<body>
<h2>Geometric Measurements</h2>
<img src="https://i.pinimg.com/474x/a6/e7/2c/a6e72caea01fea2373aa6b0d3c1a9169.jpg" alt="Shapes" height="400px" width="400px">

<div>
    <form action="process.php" method="post">
        <label for="shapes"><b>Shapes:</b></label>
        <select name="shapes" id="shapes" style="background-color:lightgray;" required>
            <option value="" disabled selected>Select a Shape (e.g.,Triangle, Rectangle etc.)</option>
            <option value="triangle">Triangle</option>
            <option value="rectangle">Rectangle</option>
            <option value="square">Square</option>
            <option value="circle">Circle</option>
            <option value="hexagon">Hexagon</option>
        </select><br><br>
        <button type="submit" name="process" style="background-color:#28a745; color:white;">Process</button>
        <button type="reset" name="reset" style="background-color:lightgrey; color: black; margin-right: 5px;">Reset</button>

    </form>
</div>

</body>
</html>


