<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentname = $_POST['studentname'];
    $studentid = $_POST['studentid'];
    $email = $_POST['email']; 
    $bt = $_POST['booktitle'];
    $bd = $_POST['borrowdate'];
    $rn = $_POST['returndate'];
    $tn = $_POST['token'];
    $fees = $_POST['fees'];

    $errors = [];
    $borrowDate = strtotime($bd);
    $returnDate = strtotime($rn);

    if (empty($studentname) || !preg_match('/^[a-zA-Z\s]+$/', $studentname)) {
        $errors[] = '<b> Student Name is invalid</b> <br>';
    }
    if (empty($studentid) || !preg_match('/^\d{2}-\d{5}-\d{1}$/', $studentid)) {
        $errors[] = '<b> Invalid Student ID format</b> <br>';
    }
    if (empty($email) || !preg_match('/^\d{2}-\d{5}-\d@student\.aiub\.edu$/', $email)) {
        $errors[] = '<b> Invalid email format</b> <br>';
    }
    if (!$borrowDate || !$returnDate || $returnDate <= $borrowDate) {
        $errors[] = '<b> Invalid Borrow/Return Dates</b> <br>';
    }
    $dateDiff = ($returnDate - $borrowDate) / 86400;
    if ($dateDiff > 10 || $dateDiff <= 0) {
        $errors[] = '<b> Borrow period must be between 1 and 10 days</b> <br>';
    }
    if (!ctype_digit($tn)) {
        $errors[] = '<b> Token Number must contain only numbers</b> <br>';
    }
    if (!is_numeric($fees) || $fees <= 0) {
        $errors[] = '<b> Fees must be a positive number</b> <br>';
    }

    if (isset($_COOKIE["borrowed_books"])) {
        $borrowedBooks = json_decode($_COOKIE["borrowed_books"], true);
        if (in_array($bt, $borrowedBooks)) {
            $errors[] = "You can't borrow '$bt' as it's already taken by you <br>";
        }
    } else {
        $borrowedBooks = [];
    }

    if ($errors) {
        foreach ($errors as $error) {
            echo '<b style="color: red; text-align:center;">Error: ' . $error .'</b>';
        }
    } else {
        $borrowedBooks[] = $bt;
        setcookie("borrowed_books", json_encode($borrowedBooks), time() + 30);

        echo "<h1 style= 'color:black; text-align:center;'>Invoice!</h1>";
        echo "<table style='width:30%; border-collapse: collapse; margin: auto;'>";
        echo "<tr style='background-color: green; color: white;'>
                <th style='border: 1px solid black; padding: 6px;'>Item</th>
                <th style='border: 1px solid black; padding: 6px;'>Details</th>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Student Name</td>
                <td style='padding: 6px; background-color: lightgreen;'>$studentname</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Student ID</td>
                <td style='padding: 6px; background-color: lightgreen;'>$studentid</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Email</td>
                <td style='padding: 6px; background-color: lightgreen;'>$email</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Book Title</td>
                <td style='padding: 6px; background-color: lightgreen;'>$bt</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Borrow Date</td>
                <td style='padding: 6px; background-color: lightgreen;'>$bd</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Return Date</td>
                <td style='padding: 6px; background-color: lightgreen;'>$rn</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Token Number</td>
                <td style='padding: 6px; background-color: lightgreen;'>$tn</td>
            </tr>";
        echo "<tr>
                <td style='border-right: 1px solid black; padding: 6px; background-color: lightgreen;'>Fees</td>
                <td style='padding: 6px; background-color: lightgreen;'>$fees</td>
            </tr>";
        echo "</table> <br>";

        echo '<div style="text-align: center;">
                <button onclick="window.print()">Print Invoice</button>
                <button onclick="window.location.href=\'index.php\'">Back</button>
            </div>';

    }
} else {
    echo '<b>Error: Invalid request method</b>';
}
 

?>
