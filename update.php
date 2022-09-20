<?php require_once('config.php') ?>
<?php $page_title = 'Update an idea'; ?>
<?php $page_heading = 'Idea Updating'; ?>

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
        <?php $id = $_GET['id']; ?>
        <div style="background:#eee;padding:10px;">
            <p>You are updating the idea #<?php echo $id; ?></p>
        </div>

        <br>
        <hr>
        <hr>
        <br>
        <?php
        // display Idea in textbox
        $connection = new PDO($dsn, $dbuser, $dbupassword);
        $sql = " SELECT * FROM ideastable WHERE id=:id";
        $statement =  $connection->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $idea = $statement->fetch(PDO::FETCH_ASSOC); //to get data in array form and store it in $idea

        ?>
        <?php if (isset($_POST['submit'])) : ?>
            <?php if (isset($_POST['title'])) :
                $idea_title = $_POST['title'];
            endif;


            if (isset($_POST['text'])) :
                $idea_text = $_POST['text'];
            endif; ?>
        <?php $idea = array('id'=> $_POST['id'],
            'title' => $_POST['title'],
            'text' => $_POST['text']);
      ?>
            <?php
            // Update Idea 
            $connection = new PDO($dsn, $dbuser, $dbupassword);
            $sql =
                " UPDATE `ideastable` SET title=:title,text=:text WHERE id =:id";
            $statement =  $connection->prepare($sql);
            $statement->execute($idea);

            ?>

            <div style="background:green;color:white;padding:10px;">
                <p>Your have updated your idea succesfully</p>
            </div>

        <?php endif; ?>
        <form action="" method="POST">
        <?php foreach($idea as $key=>$value): ?>
        <?php if ($key =='text'): ?>
        <textarea name="<?php echo $key; ?>" rows="8" cols="80"><?php echo $value; ?>
    </textarea>
        <?php else: ?>
        <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" id="<?php echo $key; ?>"
            <?php if ($key =='id'){echo 'readonly';} ?>>
        <?php endif; ?>
        <br><br>

        <?php endforeach; ?>
        <input type="submit" name="submit" value="Save your idea">
    </form>
    <?php endif; ?>



</body>

</html>