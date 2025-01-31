function startCountdown(duration) {
    let timerElement = document.getElementById('timer');
    let endTime = Date.now() + duration * 1000;

    function updateTimer() {
        let timeLeft = endTime - Date.now();
        if (timeLeft <= 0) {
            timerElement.textContent = '00:00:00:00';
            clearInterval(interval);
            return;
        }
        let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        timerElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    let interval = setInterval(updateTimer, 1000);
    updateTimer();
}

document.addEventListener('DOMContentLoaded', function() {
    startCountdown(2 * 24 * 60 * 60);
});
