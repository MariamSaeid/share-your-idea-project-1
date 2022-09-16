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

    <?php if(isset($_GET['id'])): ?>
        <?php $id=$_GET['id']; ?>
        <div style="background:#eee;padding:10px;">
            <p>You are updating the idea #<?php echo $id; ?></p>
        </div>

        <br>
        <hr>
        <hr>
        <br>

        <?php if (isset($_POST['submit'])): ?>

            <?php $idea = array('id'=> $_POST['id'],
                    'title' => $_POST['title'],
                    'text' => $_POST['text']);
            ?>

            <div style="background:green;color:white;padding:10px;">
                <p>Your have updated your idea succesfully</p>
            </div>
            <br>
        <?php endif; ?>
    <?php endif; ?>


</body>

</html>