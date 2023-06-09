<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DB</title>
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
    ?>

    <main>
        <div class="center" style="overflow: auto; height: 100%; margin-top: 25px; margin-bottom: 25px">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM formular");

            if ($result) {
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $column1 = $row['jmeno'];
                    $column2 = $row['email'];
                    $column3 = $row['zprava'];

                    echo "<li>$counter &rarr; $column1 &rarr; $column2 &rarr; $column3</li>";
                    $counter++;
                }

                mysqli_free_result($result);
            } else {
                echo "Error executing the query: " . mysqli_error($conn);
            }
            ?>
        </div>

    </main>
</body>

</html>