<?php
$serverName = "ROBERTG\MSSQLSERVER22";
$database = "Register";
$uid = ""; 
$pass = ""; 
$connectionOptions = [
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass,
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['fname']) 
&& isset($_POST['lname']) 
&& isset($_POST['selgender'])
&& isset($_POST['phone'])
&& isset($_POST['email'])
&& isset($_POST['dob'])
&& isset($_POST['id']) 
&& isset($_POST['password'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['selgender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $id = $_POST['id'];
    $password = $_POST['password'];

    $tsql = "INSERT INTO Signin_table (FirstName, LastName, Gender, PhoneNo, 
    EmailNo, Dob, IDNo, Passwrd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($fname, $lname, $gender, $phone, $email, $dob, $id, $password);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        echo 'Error: ' . print_r(sqlsrv_errors(), true);
    } else {
        
    }

    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);
?>

