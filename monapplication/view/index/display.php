<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Filmothèque item</title>
    <!-- <base href="http://localhost/todolist/www/"/> -->
</head>

<body>
    <header>
        <h1>Liste de films</h1>
    </header>
    <ul>
        <?php
            foreach($this->list as $film) : 
        ?>
        <li><a href="film/<?php echo $film->id_FILMS;?>"><?php echo $film->titre_FILMS;?></a></li><?php endforeach;?>
    </ul>
    <footer>
        <p></p>
    </footer>
</body>


</html>