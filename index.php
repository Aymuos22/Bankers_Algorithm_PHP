<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Project</title>
    <link rel="stylesheet" href="css/style0.css">
</head>

<body>
    <div class="header">
        <h1>ATM Resource Manager</h1>
    </div>
    <div>
        <h1>Total Resources</h1>
        <form action="process.php" method="POST">
            Cash Units: <input type="number" name="total1" required><br>
            Receipt Paper: <input type="number" name="total2" required><br>
            Maintenance Personnel: <input type="number" name="total3" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="info">
    <h1>Project Description:</h1>
The ATM Resource Management System is a dynamic web application utilizing PHP for backend development, alongside HTML, CSS, and JavaScript for frontend interactivity. Employing the Banker's Algorithm, the system ensures efficient allocation of resources (cash, receipt paper, maintenance personnel) for a bank's ATM network. Administrators can manage resource requests, prevent deadlocks, and receive real-time alerts when resources are critically low. The system offers secure user authentication and data encryption. Through robust analytical tools, the project optimizes resource usage, enhances customer service, and maintains uninterrupted ATM operations, contributing significantly to efficient banking services.
    </div>
    <div class="info">
        <h1>Contributors</h1>
        <ul>
            <li>Soumya Darshan</li>
        </ul>
    </div>
</body>

</html>
