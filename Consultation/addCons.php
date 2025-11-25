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

    $consultID = $_POST['consultID'];
    $petID = $_POST['petID'];
    $vetID = $_POST['vetID'];
    $consultDate = $_POST['consultDate'];
    $diagnoses = $_POST['diagnoses'];
    $prescription = $_POST['prescription'];

    $sql = "INSERT INTO consultation(consultID, petID, vetID, consultDate, diagnoses, prescription) VALUES ('$consultID','$petID','$vetID','$consultDate','$diagnoses', '$prescription')";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Added Successfully');
        window.location.href = '../Consultation/viewCons.php';
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
    <title>Add Consultation</title>
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
    <form action = "" method = "post">
        <h1 style = "text-align: center;">Add Consultation</h1>
        <label for = "consultID">Consultation ID: </label>
        <input type = "text" id = "consultID" name = "consultID" required><br><br>
        
        <label for = "petID">Pet ID: </label>
        <input type = "text" id = "petID" name = "petID" required><br><br>

        <label for = "vetID">Vet ID: </label>
        <input type = "text" id = "vetID" name = "vetID" required><br><br>
        
        <label for = "consultDate">Consultation Date: </label>
        <input type = "date" id = "consultDate" name = "consultDate" required><br><br>
        
        <label for = "diagnoses">Diagnoses: </label>
        <input type = "text-box" id = "diagnoses" name = "diagnoses" required><br><br>
        
        <label for = "prescription">Prescription: </label>
        <input type = "text-box" id = "prescription" name = "prescription" required><br><br>
        
        <button type = "submit" id = "saveBtn">Add Consultation</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>