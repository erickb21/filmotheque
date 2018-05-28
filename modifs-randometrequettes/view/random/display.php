<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Filmothèque item</title>
    <!-- <base href="http://localhost/todolist/www/"/> -->
       <link rel="stylesheet" href="../../../css/StyleSheet.css">
</head>

<body>
    <header>
        <h1>Liste de aleatoire</h1>
    </header>
        <?php         //echo var_dump($this);        //echo print_r($this); ?>
    <ul>
        <?php
        foreach($this->list as $film) : ?>
        <li><a href="../film/<?php echo $film->id_FILMS;?>"><?php echo $film->titre_FILMS;?></a></li><br />
        <img class="affiche" src=" <?php echo $film->image_FILMS;?> "/> <br />
            
        <?php endforeach;?>
    
    <footer>
        <p></p>
    </footer>
</body>


</html>