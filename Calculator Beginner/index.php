<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Beginner</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="num1">Number-1:</label>
        <input type="text" name="num1" id="num1" placeholder="Enter Number 1" required><br><br>

        <label for="num2">Number-2:</label>
        <input type="text" name="num2" id="num2" placeholder="Enter Number 2" required><br><br>

        <label for="operator">Select Operator</label>
        <select name="operator" id="operator" required>
            <option value="" selected disabled>Select An Operator</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select><br> <br>

        <input type="submit" name="submit" value="Calculate">
        <input type="reset" name="reset" value="Reset">
    </form>
    

</body>
</html>