<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
   <title>Filmothèque index</title>
   <!--<base href="http://localhost/todolist/www/"/>-->
       <link rel="stylesheet" href="../../../css/StyleSheet.css">
</head>
<body>
    <header>
        <h1>film préféré</h1>
    </header>
    <h3><?php
    //echo var_dump($this);
echo $this->film->id_FILMS .'&nbsp;-&nbsp;';
echo $this->film->titre_FILMS.'<br />';
echo 'Année de parution : ' .$this->film->annee_FILMS.'<br />'; 
echo 'Genre : ' .$this->film->label_GENRES.'<br />'; 
echo 'Réalisateur : ' .$this->film->prenom_REALISATEURS .'&nbsp;'.$this->film->nom_REALISATEURS .'<br>'; 
?>    </h3>
    <p><?php echo $this->film->description_FILMS; ?></p>
    <p><img class="affiche" src="<?php echo $this->film->image_FILMS; ?> " alt="affiche du film" /></p>
    <footer>
        
        <p></p>
    </footer>
</body>


</html>
