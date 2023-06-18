<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
</head>

<body>
    <?php
    include 'template.html';
    ?>
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pri_db';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    setcookie('browser_type', $userAgent, time() + 3600, '/');

    $sql = "INSERT INTO cookies_browser (browser, ip_address) VALUES ('$userAgent', '$ipAddress')";
    mysqli_query($conn, $sql);
    ?>

    <main>
        <div class="center">
            <img src="./files/earth.svg" alt="EARTH">
        </div>
    </main>
</body>

</html>