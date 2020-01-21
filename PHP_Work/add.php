<?php

    include('config/db_connect.php');

    $email = $teamname = $players = '';
    $errors = array('email'=>'','name'=>'','players'=>'');

    if(isset($_POST['submit'])){
        
        // check name
        if (empty($_POST['name'])){
            $errors['name'] = 'Name is required <br />';
        } else {
                $teamname = $_POST['name'];
                if(!preg_match('/^[a-zA-Z\s]+$/', $teamname)){
                    $errors['name'] = 'Name must be letters and spaces only';
                }
        }

        // check email
        if (empty($_POST['email'])){
            $errors['email'] = 'A correct email is required <br />';
        } else {
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = 'Email must be a valid email address';
                }
        }

        // check players
        if (empty($_POST['players'])){
            $errors['players'] = 'Please entre at least one players is required <br />';
        } else {
                $players = $_POST['players'];
                if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $players)){
                    $errors['players'] = 'Name must be letters and spaces only separated by comma';
                }
        }

        if(array_filter($errors)){
            //echo 'errors in the form';

        } else {
           
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $teamname = mysqli_real_escape_string($conn, $_POST['name']);
            $players = mysqli_real_escape_string($conn, $_POST['players']);

            // creat sql
            $sql = "INSERT INTO teams(teamname,players,email) VALUES('$teamname', '$players', '$email')";

            // save to db and check
            if (mysqli_query($conn, $sql)){
                // successfully inserted data
                header('location: index.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }

        }


    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Ajouter une équipe</h4>
        <form class="whith" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Team name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($teamname) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>
            <label>Email team:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Player of the team:("," separated)</label>
            <input type="text" name="players" value="<?php echo htmlspecialchars($players) ?>">
            <div class="red-text"><?php echo $errors['players']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</html>