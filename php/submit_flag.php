<?php
$host = 'localhost';
$username = 'flag_master';
$password = '$F1@9M@$73R';
$database = 'problem_flag';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SELECT 실행
$query = "SELECT flag FROM problems WHERE id = 6";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && $row['flag'] === $_POST['flag']) {
    // FLAG 맞을 때: UPDATE 실행
    $update_query = "UPDATE problems SET isSolved = 1 WHERE id = 6";
    mysqli_query($conn, $update_query);

    echo "<script>alert('Correct flag!'); window.location.href = '/starmap';</script>";
} else {
    echo "<script>alert('Incorrect flag. Please try again.'); history.back();</script>";
}
?>
<html>
    <body>
    </body>
</html>
