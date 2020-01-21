<?php

/*     echo $_SERVER['SERVER_NAME'] . '<br/>';
    echo $_SERVER['REQUEST_METHOD'] . '<br/>';
    echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';
    echo $_SERVER['PHP_SELF'] . '<br/>'; */

if(isset($_POST['submit'])){
    
    // cookies for clan
    setcookie('clan', $_POST['clan'], time() + 86400);
    
    session_start();
    
    $_SESSION['name'] = $_POST['name'];
    
    header('location: index.php');
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name">
        <select name="clan">
            <option value="FPS">FPS</option>
            <option value="MOBA">MOBA</option>
            <option value="MMO">MMO</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>