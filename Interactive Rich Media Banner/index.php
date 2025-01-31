<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Interactive Rich Media Banner</title>
</head>
<body>
    <div class="banner" onclick="showVideo()">
        <button type="submit">Click to Watch Video</button>
    </div>
    <div class="video-overlay" id="videoOverlay">
        <button class="close-btn" onclick="closeVideo()">X</button>
        <video controls autoplay preload="auto">
            <source src="video\Countdown.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <script>
    function showVideo() {
        console.log('showVideo called');
        document.getElementById('videoOverlay').style.display = 'flex';
    }
    function closeVideo() {
        document.getElementById('videoOverlay').style.display = 'none';
    }
</script>
</body>
</html>