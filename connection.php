<?php
$conn = mysqli_connect(hostname:'localhost',username:'root',password:'', database:'skydash');

if($conn) {
    echo "Connection successful";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>