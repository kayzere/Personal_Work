<?php 

    session_start();

    if($_SERVER['QUERY_STRING']=='noname'){
        unset($_SESSION['name']);
        //session_unset();
    }

    $name = $_SESSION['name'] ?? 'Guest';

    //get cookies

    $clan = $_COOKIE['clan'] ?? 'Unknown';

?>


<head>
            <title>Test de mon header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background: blue !important;
        }
        .brand-text{
            color: blue !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .teemo{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

    </style>
</head>
    <body class="grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text">Mon site pour tournoi</a>
                <ul id="nab-mobile" class="right hide-on-small-and-down">
                    <li class="grey-text">Hey! <?php echo htmlspecialchars($name); ?></li>
                    <li class="grey-text"> (Clan <?php echo htmlspecialchars($clan); ?>)</li>
                    <li><a href="add.php" class="btn brand z-depth-0"> add team </a> </li>
                </ul>
            </div>
        </nav>