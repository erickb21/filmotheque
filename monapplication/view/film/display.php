<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
   <title>Filmothèque index</title>
   <!--<base href="http://localhost/todolist/www/"/>-->
</head>
<body>
    <header>
        <h1>film préféré</h1>
    </header>
    <h3><?php echo $this->film->titre_FILMS; ?>
    </h3>
    <p><?php echo $this->film->description_FILMS; ?></p>
    <p><img src="<?php echo $this->film->image_FILMS; ?> " alt="affiche du film" /></p>
    <footer>
        
        <p></p>
    </footer>
</body>


</html>
