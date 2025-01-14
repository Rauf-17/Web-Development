<?php
/* This is the main page of the library management system. It contains the list of all books, the form to add or remove a book, the form to edit a book, and the form to borrow a book. */ 
?>


<?php

//SQL query to select all books from the database
$conn = new mysqli("localhost", "root", "", "library_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, title, author, yearofpublication, genre FROM books";
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
$conn->close();

$tokens = [];
if (file_exists('token.json')) {
    $json = file_get_contents('token.json');
    $tokens = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Library Management</title>
    
<!-- Token Selection and Used Token-->
    <script>
    function selectToken(token) {
        document.getElementById('token').value = token;
        const tokenButton = document.getElementById('token-' + token);
        tokenButton.style.display = 'none';

        const usedTokenList = document.getElementById('used-token-list');
        const newUsedToken = document.createElement('li');
        newUsedToken.textContent = token;
        usedTokenList.appendChild(newUsedToken);

        let usedTokens = JSON.parse(localStorage.getItem('usedTokens')) || [];
        usedTokens.push(token);
        localStorage.setItem('usedTokens', JSON.stringify(usedTokens));
    }

    document.addEventListener('DOMContentLoaded', function() {
        let usedTokens = JSON.parse(localStorage.getItem('usedTokens')) || [];
        const usedTokenList = document.getElementById('used-token-list');
        usedTokens.forEach(function(token) {
            const newUsedToken = document.createElement('li');
            newUsedToken.textContent = token;
            usedTokenList.appendChild(newUsedToken);
        });
    });
</script>
</head>
<body>
    <main>
        <!-- Used Token section -->
        <aside class="box3">
            <h2>Token Used</h2> <hr>
            <ul class="token-list" id="used-token-list">
            </ul>
        </aside>
        <div>
            <!-- All Books -->
            <section>
                <div class="box1">
                    <h2 style="text-align: center; border: 2px aliceblue solid; background-color: cornflowerblue; color: black;">All Books</h2>
                    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black; padding: 8px; width: 25%;">Title</th>
                                <th style="border: 1px solid black; padding: 8px; width: 25%;">Author</th>
                                <th style="border: 1px solid black; padding: 8px; width: 25%;">Year of Publication</th>
                                <th style="border: 1px solid black; padding: 8px; width: 25%;">Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book): ?>
                                <tr>
                                    <td style="border: 1px solid black; padding: 8px; text-align: center;"><?php echo htmlspecialchars($book['title']); ?></td>
                                    <td style="border: 1px solid black; padding: 8px; text-align: center;"><?php echo htmlspecialchars($book['author']); ?></td>
                                    <td style="border: 1px solid black; padding: 8px; text-align: center;"><?php echo htmlspecialchars($book['yearofpublication']); ?></td>
                                    <td style="border: 1px solid black; padding: 8px; text-align: center;"><?php echo htmlspecialchars($book['genre']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Add & Remove Books -->
                <div class="box1">
                    <h2 style="text-align: center; border: 2px aliceblue solid; background-color:cornflowerblue; color:black;">Add or Remove Book</h2>
                    <form action="add_remove_book.php" method="post">
                        <input type="text" name="title" placeholder="Book Title" required>
                        <input type="text" name="author" placeholder="Author" required>
                        <input type="number" name="yearofpublication" placeholder="Year of Publication" required>
                        <input type="text" name="genre" placeholder="Genre" required>
                        <button type="submit" name="action" value="add" id="buttonAdd"><b>Add</b></button>
                        <button type="submit" name="action" value="remove" id="buttonRemove"><b>Remove</b></button>
                    </form>
                </div>
                <!-- Edit Book Info -->
                <div class="box1">
                    <h2 style="text-align: center; border: 2px aliceblue solid; background-color:cornflowerblue; color:black;">Edit Book Information</h2>
                    <form action="edit_book.php" method="post">
                        <input type="text" name="title" placeholder="New Title">
                        <input type="text" name="author" placeholder="New Author">
                        <input type="number" name="yearofpublication" placeholder="New Year of Publication">
                        <input type="text" name="genre" placeholder="New Genre">
                        <button type="submit" id="buttonUpdate"><b>Update</b></button>
                    </form>
                </div>
            </section>
            <!-- About Library -->
            <section class="section2">
                <div class="box2">
                    <strong>About Library</strong> <br>
                    <p>
                        The fictional universe of George R.R. Martin's A Song of Ice and Fire novels is called the World of A Song of Ice and Fire. The world is made up of several continents, but most of the story takes place on Westeros and in the Seven Kingdoms. Martin's novels were adapted into the HBO television series Game of Thrones (2011–2019) and its prequel series House of the Dragon (2022–present).
                    </p>
                </div>
                <div class="box2">
                    <strong>Here are some books in the A Song of Ice and Fire series:</strong> <br>
                    <ul style="list-style-type: square;">
                        <li>A Game of Thrones (1996)</li> 
                        <li>A Clash of Kings (1999) </li>
                        <li>A Storm of Swords (2000)</li> 
                        <li>A Feast for Crows (2005) </li>
                        <li>A Dance with Dragons (2011) </li>
                        <li>The World of Ice & Fire (2014)</li> 
                        <li>A Knight of the Seven Kingdoms (2015)</li> 
                        <li>Fire & Blood (2018) </li>
                    </ul>
                </div>
                <div class="box2">
                    <strong style="text-align: center;">Library Timing</strong> <br>
                    <ul>
                        <li>Friday: Closed </li>
                        <li>Saturday: 9:00 AM - 5:00 PM</li>
                        <li>Sunday: 9:00 AM - 5:00 PM</li>
                        <li>Monday: 9:00 AM - 5:00 PM</li>
                        <li>Tuesday: 9:00 AM - 5:00 PM</li>
                        <li>Wednesday: 9:00 AM - 5:00 PM</li>
                        <li>Thursday: 9:00 AM - 5:00 PM</li>
                    </ul>
                </div>
            </section>
            <!-- Borrow Book -->
            <section class="section2">
                <div class="box22a">
                    <form action="process.php" method="post">
                        <b>Student Name</b> 
                        <br><input type="text" placeholder="Student Full Name" name="studentname" id="studentname" required><br>
                        <b>Student ID</b>
                        <br><input type="text" placeholder="Student ID" name="studentid" id="studentID" required><br>
                        <b>Student Email</b>
                        <br><input type="email" placeholder="Student Email" name="email" id="email" required><br>
                        <label for="booktitle"><b>Choose A Book Title: </b></label><br>
                        <select name="booktitle" id="booktitle" required>
                            <option value="Select a Book" disabled selected>Select a Book</option>
                            <option value="The Song of Ice & Fire">The Song of Ice & Fire</option>
                            <option value="Fire & Blood">Fire & Blood</option>
                            <option value="A Game of Thrones">A Game of Thrones</option>
                            <option value="Wind of Winters">Wind of Winters</option>
                            <option value="Dance of the Dragon">Dance of the Dragon</option>
                            <option value="A Knight of the Seven Kingdom">A Knight of the Seven Kingdom</option>
                            <option value="The Rouge Prince">The Rouge Prince</option>
                            <option value="A Storm of Swords">A Storm of Swords</option>
                            <option value="The Rise of the Dragon">The Rise of the Dragon</option>
                        </select><br>
                        <b>Borrow date</b>
                        <br><input type="date" name="borrowdate" id="borrowdate" required><br>
                        <b>Return date</b>
                        <br><input type="date" name="returndate" id="returndate" required><br>
                        <b>Token</b>
                        <br><input type="text" placeholder="Choose from Availabe Tokens" name="token" id="token" disabled required><br>
                        <b>Fees</b>
                        <br><input type="text" placeholder="Fees" name="fees" id="fees" required><br> <br><br>
                        <button type="submit" name="submit" id="buttonBorow"><b>Borrow</b></button>
                    </form>
                </div>

                <!-- Available Token Picking -->
                <?php
                if (file_exists('token.json')) {
                    $tokens_json = file_get_contents('token.json');
                    $tokens = json_decode($tokens_json, true);
                    if ($tokens === null) {
                        echo "Error decoding JSON.";
                    }
                } else {
                    echo "token.json file not found.";
                }
                ?>

                <div class="box22b">
                    <h3 style="text-align: center;">Available Tokens</h3>
                    <ul>
                        <?php if (isset($tokens) && is_array($tokens)): ?>
                            <?php foreach ($tokens as $token): ?>
                                <?php if (isset($token['token'])): ?>
                                    <button id="token-<?php echo $token['token']; ?>" style="background-color:darkslateblue; color:white; padding:10px; margin:10px; width:75%;" onclick="selectToken('<?php echo $token['token']; ?>')">
                                        <strong><?php echo $token['token']; ?></strong>
                                    </button><br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No tokens available or an error occurred while loading the tokens.</p>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>
        </div>
        <!-- Developer Details -->
        <div class="box3">
            <h2 style="text-align: center;">Developer Details</h2> <hr>
            <img src="photos/Profile - Copy.png" alt="Profile" width="250px" height="250px" style="border-radius: 50%; border: 1px solid black;">
            <p>
                <i class="fa-solid fa-user"></i> Raufull Islam Rauf  <br>
                <i class="fa-solid fa-id-card"></i> 21-45779-3 <br>
                <i class="fa-solid fa-school"></i> American International University- Bangladesh <br>
            </p>

            <hr>

            <Label><b>About</b></Label>
            <p>Final-semester student at American International University-Bangladesh with a passion for web development, chatbots, data science, and software engineering. Skilled in building innovative solutions, including multilingual chatbots and intelligent systems. Data analyst skilled in visualization, statistical analysis, and machine learning for actionable insights.</p>

            <hr>

            <a href="https://www.facebook.com/profile.php?id=100009549156449" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="mailto: rauf.shuvo3272@gmail.com" target="_blank"><i class="fa-solid fa-envelope"></i></a>
            <a href="https://www.linkedin.com/in/raufislam17/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://x.com/rauf_shuvo" target ="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://github.com/Rauf-17/" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </main>
</body>
</html>
