<?php

class Kernel {
   public static function autoload($class)
   {

// cette fonction autoload est essentielle, elle permet de d�finir les chemins vers les fichiers qui instancient les classes routeur models etc ... de sorte � pouvoir appeller les fonctions qu'elles ex�cutent...

      if(file_exists(ROOT."/monapplication/moteur/".$class.".php"))
	  { require_once(ROOT."/monapplication/moteur/".$class.".php");}//print_r(ROOT."/monapplication/moteur/".$class.".php" ."<br/>");


      else if(file_exists(ROOT."/monapplication/controler/".$class.".php"))

	  { require_once(ROOT."/monapplication/controler/".$class.".php");} //print_r(ROOT."/monapplication/controler/".$class.".php"."<br/>");

      else if(file_exists(ROOT."/monapplication/model/".$class.".php"))

	  { require_once(ROOT."/monapplication/model/".$class.".php");} //print_r(ROOT."/monapplication/model/".$class.".php" ."<br/>");
   }

//public static function initListSearch($saisie){
//        spl_autoload_register(array("Kernel", "autoload"));
//        $route = Router::analyze( "find" );
//        var_dump($_POST);
//        var_dump($route);
//        Kernel::getInstanceControleur($route);
//}

//public static function SearchFilm($idFilm){
//        spl_autoload_register(array("Kernel", "autoload"));
//        $query="film/".$idFilm;
//        $route = Router::analyze( $query);

//        Kernel::getInstanceControleur($route);
//}


   public static function run()
   {
      // Autoload
      spl_autoload_register(array("Kernel", "autoload"));

      // Analyser la requete


      $query = isset($_GET["query"]) ? $_GET["query"] : "";
	  //print_r($_GET["query"]);
      $route = Router::analyze( $query );
        Kernel::getInstanceControleur($route);
}

      // Instancier le controleur et
      // executer l'action

      public static function getInstanceControleur($route){
      $class = $route["controler"]."Controller";

      if(class_exists($class)) {
         $controler = new $class ($route);
         $method = array($controler, $route["action"]);
         if( is_callable( $method ))
            call_user_func($method);
      }
                //print_r($method);
      // Gestion des erreurs
      // �a reste � faire : par exemple si l'url n'existe pas ou qu'elle a trop de param�tres etc ...

   }

}
