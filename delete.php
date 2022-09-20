<?php require_once('config.php') ?>
<?php $page_title = 'Delete an idea'; ?>
<?php $page_heading = 'Idea Deletion'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>

</head>
    
<body>
    <h1> <?php echo $page_heading; ?> </h1>
    <p> <a href="index.php">Go back to the homepage</a> </p>

    <?php if (isset($_GET['id'])) : ?>

        <?php
        // delete Idea 
        $id = $_GET['id'];
        $connection = new PDO($dsn, $dbuser, $dbupassword);

        $sql = "DELETE FROM `ideastable` WHERE id = :id  ";
        $statement =  $connection->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        ?>

        <div style="background:red;color:white;padding:10px">
            <p>The idea is deleted</p>
        </div>
    <?php endif; ?>

</body>

</html>