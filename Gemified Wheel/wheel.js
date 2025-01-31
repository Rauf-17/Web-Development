document.getElementById('spinButton').addEventListener('click', function() {
    const wheel = document.getElementById('wheel');
    const prizeModal = document.getElementById('prizeModal');
    const prizeText = document.getElementById('prizeText');

    const prizes = [
        '$10 Gift Card',
        'Free Shopping',
        '$5 Voucher',
        'Free Shipping',
        '$10 Cash',
        'Free Chocolate',
        '$20 Spree',
        'Free Membership'
    ];

    const randomDegree = Math.floor(Math.random() * 360) + 3600; 
    const finalAngle = randomDegree % 360; 
    const selectedIndex = Math.floor(finalAngle / 60);
    const selectedPrize = prizes[selectedIndex];

    wheel.style.transform = `rotate(${randomDegree}deg)`;

    setTimeout(() => {
        prizeText.textContent = selectedPrize;
        prizeModal.style.display = 'block';
    }, 3000);
});
