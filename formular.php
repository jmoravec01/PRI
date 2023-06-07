<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>FORM</title>
</head>

<body>
    <?php
    include 'template.html';

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pri_db';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Step 7: Insert the data into the database
        $sql = "INSERT INTO formular (jmeno, email, zprava) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($conn, $sql)) {
            echo '
            <div style="position: absolute">
            <div class="success alert">
            <div class="content">
            <div class="icon">
            <svg width="50" height="50" id="Layer_1" style="enable-background:new 0 0 128 128;" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><circle fill="#fff" cx="64" cy="64" r="64"/></g><g><path fill="#3EBD61" d="M54.3,97.2L24.8,67.7c-0.4-0.4-0.4-1,0-1.4l8.5-8.5c0.4-0.4,1-0.4,1.4,0L55,78.1l38.2-38.2   c0.4-0.4,1-0.4,1.4,0l8.5,8.5c0.4,0.4,0.4,1,0,1.4L55.7,97.2C55.3,97.6,54.7,97.6,54.3,97.2z"/></g></svg>
            </div>
            <p>Zpráva byla odeslána</p>
            </div>
            <button class="close">
            <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
            </button>
            </div>
            </div>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>

    <main>
        <div class="center">
            <form action="" method="post">
                <label for="name">Jméno: </label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>

                <textarea name="message" id="message" placeholder="Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." required></textarea>

                <input type="submit" value="Potvrdit">
            </form>
        </div>
    </main>
    <script>
        $(".close").click(function() {
            $(this).parent().fadeOut();
        });
        $(document).ready(function() {
            // Function to close elements with class "close" after a specified duration
            function autoClose() {
                $(".close").parent().fadeOut();
            }

            // Set the duration (in milliseconds) after which the elements should be automatically closed
            var duration = 1500; // 5000 milliseconds = 5 seconds

            // Call the autoClose function after the specified duration
            setTimeout(autoClose, duration);
        });
    </script>
</body>

</html>