document.getElementById('spinButton').addEventListener('click', function() {
    let wheel = document.getElementById('wheel');
    let randomDegree = Math.floor(3600 + Math.random() * 360);
    wheel.style.transform = `rotate(${randomDegree}deg)`;
    setTimeout(() => {
        let finalDegree = randomDegree % 360;
        let prize;
        if (finalDegree >= 0 && finalDegree < 60) prize = "$10 Coupon";
        else if (finalDegree >= 60 && finalDegree < 120) prize = "Free Shipping";
        else if (finalDegree >= 120 && finalDegree < 180) prize = "5% Discount";
        else if (finalDegree >= 180 && finalDegree < 240) prize = "Mystery Gift";
        else if (finalDegree >= 240 && finalDegree < 300) prize = "$5 Coupon";
        else prize = "Try Again";
        document.getElementById('prizeText').innerText = `You won: ${prize}`;
        document.getElementById('prizeModal').style.display = 'flex';
    }, 3000);
});
