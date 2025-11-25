<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" ){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $vetID = $_GET['vetID'];
    $vetFName = $_POST['vetFName'];
    $vetLName = $_POST['vetLName'];
    $vetAddress = $_POST['vetAddress'];
    $vetSpecial = $_POST['vetSpecial'];

    $sql = "UPDATE veterinarian SET vetFName = '$vetFName', vetLName = '$vetLName', vetAddress = '$vetAddress', vetSpecial = '$vetSpecial' WHERE vetID = '$vetID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Updated Successfully');
        window.location.href = '../Veterinarian/viewVets.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Veterinarian</title>
</head>
<body>
    <form action = "" method = "post">
        <label for = "vetFName">First Name: </label>
        <input type = "text" id = "vetFName" name = "vetFName" required><br><br>

        <label for = "vetLName">Last Name: </label>
        <input type = "text" id = "vetLName" name = "vetLName" required><br><br>
        
        <label for = "vetAddress">Address: </label>
        <input type = "text" id = "vetAddress" name = "vetAddress" required><br><br>
        
        <label for = "vetSpecial">Specialization: </label>
        <input type = "text" id = "vetSpecial" name = "vetSpecial" required><br><br>
        
        <button type = "submit" id = "saveBtn">Edit</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>