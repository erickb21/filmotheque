<?php

class Router {
   public static function analyze( $query ) {
      $result = array(
         "controler" => "Error",
         "action" => "error404",
         "params" => array()
      );

      if( $query === "" || $query === "/" ) {
         $result["controler"] = "index";
         $result["action"] = "display";
      } else {
         $parts = explode("/", $query);
         //echo var_dump($parts);
         if($parts[0] == "item" && count($parts) == 2) {
            $result["controler"] = "Item";
            $result["action"] = "display";
            $result["params"]["id"] = $parts[1];            
         }
      }
      return $result;
   }

}
