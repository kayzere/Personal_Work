<?php

    include('config/db_connect.php');

    // write query for all teams 
    $sql = 'SELECT id, teamname, players FROM teams ORDER BY created_at';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close conneciton 
    mysqli_close($conn);

    // exemple explode

    //explode(',',$teams[0]['players']);


?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Teams</h4>

    <div class="container">
        <div class="row">

            <?php foreach($teams as $team) : ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/img3.png" class="teemo">
                        <div class="card-content center"> 
                            <h6><?php echo htmlspecialchars($team['teamname']); ?></h6>
                            <ul>
                                <?php foreach(explode(',',$team['players']) as $player) : ?>
                                    <li><?php echo htmlspecialchars($player) ?> </li>
                                <?php endforeach; ?> 
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $team['id']?>">plus d'info</a>                       
                        </div>
                    </div>
                </div>
            
            <?php endforeach; ?>

        </div>
    </div>

    <?php include('templates/footer.php'); ?>
</html>