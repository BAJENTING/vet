<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM veterinarian";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View veterinarian</title>
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
    <a href = "addVets.php"><button id = "addBtn">+ Add</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 1 style = "width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Specialization</th>
            <th>Actions</th>
        </tr>
        <?php
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['vetID']."</td>";
                    echo "<td>".$row['vetLName'].", ".$row['vetFName']."</td>";
                    echo "<td>".$row['vetAddress']."</td>";
                    echo "<td>".$row['vetSpecial']."</td>";
                    echo "<td>
                        <a href = 'editVets.php?vetID=".$row['vetID']."'><button id = 'editBtn'>Edit</button></a>
                        <a href = 'delVets.php?vetID=".$row['vetID']."'><button id = 'delBtn'>Del</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '5'>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>