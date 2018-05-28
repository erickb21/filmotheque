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

         switch ($parts[0]):
         case "film" :
             if (count($parts) == 2) 
                {            
                $result["controler"] = "Film";
                $result["action"] = "display";
                $result["params"]["id"] = $parts[1]; 
                }
              else {break;}
         break;
         case "random" :
            if (count($parts) == 2) 
            {            
            $result["controler"] = "Random";
            $result["action"] = "display";
            $result["params"]["limit"] = $parts[1]; 
            }
            else {break;}
         break;
         default:
         endswitch;

         //if($parts[0] == "film" && count($parts) == 2) {
         //   $result["controler"] = "Film";
         //   $result["action"] = "display";
         //   $result["params"]["id"] = $parts[1];            
         //}
      }
      return $result;
   }

}
