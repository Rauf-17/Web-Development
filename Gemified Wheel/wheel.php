<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin the Wheel Game</title>
    <link rel="stylesheet" href="wheel.css">
</head>
<body>
    <div class="game-container">
        <div class="wheel" id="wheel"></div>
        <button id="spinButton">Spin for Prize</button>
    </div>
    <div class="modal" id="prizeModal">
        <div class="modal-content">
            <p id="prizeText"></p>
            <button id="claimPrize" onclick="window.location.href='https://adplaytechnology.com'">Claim Prize</button>
        </div>
    </div>
    <script src="wheel.js"></script>
</body>
</html>