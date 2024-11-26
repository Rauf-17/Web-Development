<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Library Management</title>
</head>
<body>
    <main>
        <aside class="box3"></aside>
        <div>
            <section>
                <div class="box1"></div>
                <div class="box1"></div>
                <div class="box1"></div>
            </section>
            <section class="section2">
                <div class="box2"></div>
                <div class="box2"></div>
                <div class="box2"></div>
            </section>
            <section class="section2">
                <div class="box22">
                    <form action="process.php" method="post">
                       <label for="studentname">Name: </label>
                       <input type="text" placeholder="Full Name" name="studentname" id="studentname" required><br>
                       <label for="studentid">ID: </label>
                       <input type="text" placeholder="Student ID" name="studentid" id="studentID" required><br>
                       <label for="email">Email: </label>
                       <input type="email" placeholder="Student Email" name="email" id="email" required><br>
                        <label for="booktitle">Choose A Book Title: </label>
                        <select name="booktitle" id="booktitle" required>
                            <option value="Select a Book" disabled selected>Select a book</option>
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
                        <label for="borrowdate">Borrow date: </label>
                        <input type="date" name="borrowdate" id="borrowdate" required><br>
                        <label for="returndate">Return date: </label>
                        <input type="date" name="returndate" id="returndate" required><br>
                        <label for="token">Token: </label>
                        <input type="number" placeholder="Token Number" name="token" id="token" required><br>
                        <label for="fees">Fees: </label>
                        <input type="number" placeholder="Fees" name="fees" id="fees" required><br><br>
                        <button type="submit" name="submit" style="float: auto; background-color: darkred; color:aliceblue; padding:4px">Submit</button>
                    </form>
                </div>
                <div class="box22"></div>
            </section>
        </div>
        <aside class="box3"></aside>
    </main>
</body>
</html>


