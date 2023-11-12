<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Project</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="heading"><h1>Banker's Algorithm</h1> </div>
    <div class="banner">
        <div class="form">
            <h1>Maximum Needed Resources</h1>
            <form class="mul-res" method="post">
                <label for="val1">Cash Units</label>
                <input id="val1" name="val1" type="text">
                <br><br>
                <label for="val2">Receipt Paper</label>
                <input id="val2" name="val2" type="text">
                <br><br>
                <label for="val3">Maintenance Personnel</label>
                <input id="val3" name="val3" type="text">
                <br><br>
                <label for="process">ATM ID:</label>
                <input id="process" name="process" type="text">
                <br><br>
                <input id="btn" type="submit" value="Submit">    
            </form>
        </div>
        <div class="result">
            <div>
            <?php
                error_reporting(E_ERROR | E_PARSE);
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project"; 

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $val1 = $_POST["val1"];
                    $val2 = $_POST["val2"];
                    $val3 = $_POST["val3"];
                    $process = $_POST["process"];

                    // SQL query to insert data into the table
                    $sql = "INSERT INTO max (val1, val2, val3, process) VALUES ('$val1', '$val2', '$val3', '$process')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Maximum Resources Entered <br>";
                        echo "<br><a href=\"page2.php\">Next</a>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                    $sql1 = "SELECT * FROM max";
                    $result = $conn->query($sql1);
                    $index=0;
                    if ($result->num_rows > 0) {
                        echo "<h2>Stored Values:</h2>";
                        while ($row = $result->fetch_assoc()) {
                            echo "Cash Units: " . $row["val1"] . "<br>";
                            echo "Receipt Paper: " . $row["val2"] . "<br>";
                            echo "Maintenance Personnel: " . $row["val3"] . "<br>";
                            echo "Process: " . $row["process"] . "<br>";
                            echo "----------------------------------------<br>";
                        }
                    } else {
                        echo "No records found";
                    }
                $conn->close();
                ?>

            </div>
        </div>
    </div>
</body>
</html>
