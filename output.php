<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="show">
        <div class="result-box">
            <h2>Maximum Resources:</h2>
            <div class="result1">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }            
                $sql1 = "SELECT * FROM store";
                $result = $conn->query($sql1);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "Cash Units: " . $row["res1"] . "<br>";
                        echo "Receipt Paper: " . $row["res2"] . "<br>";
                        echo "Maintenance Personnel: " . $row["res3"] . "<br>";
                        echo "ATM ID: " . $row["process"] . "<br>";
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

    <div class="show">
        <div class="result-box">
            <h2>Allocated:</h2>
            <div class="result2">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }  

                $sql1 = "SELECT * FROM max";
                $result = $conn->query($sql1);
                $index=0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "Cash Units: " . $row["val1"] . "<br>";
                        echo "Receipt Paper: " . $row["val2"] . "<br>";
                        echo "Maintenance Personnel: " . $row["val3"] . "<br>";
                        echo "ATM ID: " . $row["process"] . "<br>";
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

    <div class="show">
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from store table
$sql = "SELECT * FROM store";
$result = $conn->query($sql);
$alloc = array();
while ($row = $result->fetch_assoc()) {
    $alloc[$row['process']] = array($row['res1'], $row['res2'], $row['res3']);
}

// Fetch data from max table
$sql = "SELECT * FROM max";
$result = $conn->query($sql);
$max = array();
while ($row = $result->fetch_assoc()) {
    $max[$row['process']] = array($row['val1'], $row['val2'], $row['val3']);
}

// Fetch data from total table
$sql = "SELECT * FROM total";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$avail = array($row['total1'], $row['total2'], $row['total3']);

// Function to check for safe sequence
function isSafe($processes, $avail, $max, $alloc) {
    $need = array();
    foreach ($processes as $i) {
        $need[$i] = array(
            $max[$i][0] - $alloc[$i][0],
            $max[$i][1] - $alloc[$i][1],
            $max[$i][2] - $alloc[$i][2]
        );
    }

    $work = $avail;
    $finish = array_fill(0, count($processes), false);
    $safetySeq = array();
    $count = 0;

    while ($count < count($processes)) {
        $found = false;
        for ($i = 0; $i < count($processes); $i++) {
            if (!$finish[$i] &&
                $need[$processes[$i]][0] <= $work[0] &&
                $need[$processes[$i]][1] <= $work[1] &&
                $need[$processes[$i]][2] <= $work[2]
            ) {
                $work[0] += $alloc[$processes[$i]][0];
                $work[1] += $alloc[$processes[$i]][1];
                $work[2] += $alloc[$processes[$i]][2];
                $finish[$i] = true;
                $safetySeq[] = $processes[$i];
                $count++;
                $found = true;
            }
        }

        if (!$found) {
            echo "No safe sequence found.";
            break;
        }
    }

    if ($found) {
        echo "Safe Sequence: " . implode(" -> ", $safetySeq);
    }
}

// Call the isSafe function
isSafe(array_keys($max), $avail, $max, $alloc);

// Close connection
$conn->close();
?>

    </div>

    <!-- Next button -->
    <div class="next-button">
        <form action="clear_data.php" method="post">
            <input type="submit" value="Next">
        </form>
    </div>
</body>
</html>
