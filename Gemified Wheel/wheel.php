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
        <div class="wheel-container">
            <div class="selector"></div>
            <div class="wheel" id="wheel">
                <div class="prize" style="transform: rotate(22.5deg);"><span>$10 Gift Card</span></div>
                <div class="prize" style="transform: rotate(67.5deg);"><span>Free Shopping</span></div>
                <div class="prize" style="transform: rotate(112.5deg);"><span>$5 Voucher</span></div>
                <div class="prize" style="transform: rotate(157.5deg);"><span>Free Shipping</span></div>
                <div class="prize" style="transform: rotate(202.5deg);"><span>$10 Cash</span></div>
                <div class="prize" style="transform: rotate(247.5deg);"><span>Free Chocolate</span></div>
                <div class="prize" style="transform: rotate(292.5deg);"><span>$20 Spree</span></div>
                <div class="prize" style="transform: rotate(337.5deg);"><span>Free Membership</span></div>
            </div>
            <button id="spinButton">Spin for Prize</button>
        </div>
        
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
