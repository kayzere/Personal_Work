<?php

    // connect to database
    $conn = mysqli_connect('localhost', 'jack', 'jack', 'gametournament');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>