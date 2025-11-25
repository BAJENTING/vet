<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM consultation";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Consultation</title>
    <link rel = "stylesheet" href = "../CSS/styles.css">
</head>
<body>
    <div id = "navbar">
        <ul>
            <li><a href = "../dashboard.php">Home</a></li>
            <li><a href = "../Owners/viewOwners.php">Owners</a></li>
            <li><a href = "../Pets/viewPets.php">Pets</a></li>
            <li><a href = "../Veterinarian/viewVets.php">Veterinarian</a></li>
            <li><a href = "../Consultation/viewCons.php">Consultation</a></li>
        </ul>
    </div>
    <a href = "addCons.php"><button id = "addBtn">+ Add</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 1 style = "width: 100%">
        <tr>
            <th>ID</th>
            <th>Pet ID</th>
            <th>Vet ID</th>
            <th>Consultation Date</th>
            <th>Diagnoses</th>
            <th>Prescription</th>
            <th>Actions</th>
        </tr>
        <?php
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['consultID']."</td>";
                    echo "<td>".$row['petID']."</td>";
                    echo "<td>".$row['vetID']."</td>";
                    echo "<td>".$row['consultDate']."</td>";
                    echo "<td>".$row['diagnoses']."</td>";
                    echo "<td>".$row['prescription']."</td>";
                    echo "<td>
                        <a href = 'editCons.php?consultID=".$row['consultID']."'><button id = 'editBtn'>Edit</button></a>
                        <a href = 'delCons.php?consultID=".$row['consultID']."'><button id = 'delBtn'>Del</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '7'>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>