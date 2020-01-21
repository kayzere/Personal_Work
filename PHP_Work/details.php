<?php 
    
    include('config/db_connect.php');

    if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM teams WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            // successful
            header('location: index.php');
        } else {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // check GET request id Param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM teams WHERE id = $id";

        // get the query result 
        $result = mysqli_query($conn, $sql);

        // fetch reult in array format
        $team = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>
    
    <div class="container center grey-text">
        <?php if($team): ?>

            <h4><?php echo htmlspecialchars($team['teamname']);?></h4>
            <p>Created by: <?php echo htmlspecialchars($team['email']);?></p>
            <p><?php echo date($team['created_at']); ?></p>
            <h5>Players:</h5>
            <p><?php echo htmlspecialchars($team['players']); ?></p>

            <!-- delete form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $team['id'] ?>">
                <input type="submit" name="delete" value="Delete" classe="btn brand z-depth-0">
            </form>

        <?php else: ?>

            <h5> Cette équipe n'existe pas encore </h5>

        <?php endif; ?>
   
    </div>
    
<?php include('templates/footer.php'); ?>

</html>