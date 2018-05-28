<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Filmothèque item</title>
    <!-- <base href="http://localhost/todolist/www/"/> -->
    <meta http-equiv="refresh" content="0;./random/3">
        <link rel="stylesheet" href="../../../css/StyleSheet.css">
</head>

<body>
    <header>
        <h1>Liste de films</h1>
    </header>
    <ul>
        <?php
        //echo var_dump($this);
        foreach($this->list as $film) : ?>
        <li><a href="film/<?php echo $film->id_FILMS;?>"><?php echo $film->titre_FILMS;?></a><span> Parution : <?php echo $film->annee_FILMS;?></span> 
            
        </li><?php endforeach;?>
    
    <footer>
        <p></p>
    </footer>
</body>


</html>