<?php

class Kernel {
   public static function autoload($class) {

//      echo ROOT.str_replace("/","\\", "/monapplication/moteur/") .$class.".php"; // ça c'est une petite prise de tête en matière de syntaxe pour transformer les / en \ dans la chaîne ... mais ça ser à rien dans le contexte ;-)
//      echo "<br/>";
//      echo ROOT."/monapplication/moteur/" .$class.".php";
// cette fonction autoload est essentielle, elle permet de définir les chemins vers les fichiers qui instancient les classes routeur models etc ... de sorte à pouvoir appeller les fonctions qu'elles exécutent...

      if(file_exists(ROOT."/monapplication/moteur/".$class.".php"))
        { require_once(ROOT."/monapplication/moteur/".$class.".php");}
        
      else if(file_exists(ROOT."/monapplication/controler/".$class.".php"))
         //{
            require_once(ROOT."/monapplication/controler/".$class.".php");
        //echo ROOT ."/monapplication/controler/".$class.".php";}

      else if(file_exists(ROOT."/monapplication/model/".$class.".php"))
           //{
            require_once(ROOT."/monapplication/model/".$class.".php");
           //echo ROOT ."/monapplication/model/".$class.".php";}

   }


   public static function run() {
      // Autoload
      spl_autoload_register(array("Kernel", "autoload"));

      // Analyser la requete
      $query = isset($_GET["query"]) ? $_GET["query"] : "";
    //echo "<br/>get : " .$query;
    //echo "<br/>";
      //echo var_dump($query);
      //echo "<br/>";
      $route = Router::analyze( $query );
      //echo "ma route : " .var_dump($route);
      // Instancier le controleur et
      // executer l'action
      $class = $route["controler"]."Controller";
      //echo "<br/>";
      //echo "class" .var_dump($class);
      if(class_exists($class)) {
         $controler = new $class ($route);
         //echo "controleur : ".var_dump($controler);
         $method = array($controler, $route["action"]);
        //echo "controleur : ".var_dump($method);
         if( is_callable( $method ))
            call_user_func($method);   
      }
    
      // Gestion des erreurs
      // ça reste à faire : par exemple si l'url n'existe pas ou qu'elle a trop de paramètres etc ... 
     
   }
   
}
