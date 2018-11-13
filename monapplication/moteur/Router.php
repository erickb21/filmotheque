<?php

class Router {

   public static function analyze( $query ) {
	   //echo $query;
	   //print_r($query ."<br/>");
	   //var_dump($query ."<br/>");
	   ////print_r("post : " .$_POST ."<br/>");
	   //var_dump ("saisie : " .$_GET["saisie"]);
	   //die();
      $result = array(
         "controler" => "Error",
         "action" => "error404",
         "params" => array()
      );

	  //if (isset($_POST["saisie"])){kernel::initListSearch("find");}

      //if($query === "find"){
	  //echo "query : " .$query;
	  //die();
	  if($query === "autocomplete")
	    {   $saisie = strip_tags($_GET['saisie']);
	        $result["controler"] = "Index";
	        $result["action"] = "initListSearch";
	        $result["params"]["saisie"] =$saisie;
			//print_r($result);
			//var_dump($result);
			//var_dump($saisie);
			//die();
	        }

      if( $query === "" || $query === "/" ) {
         $result["controler"] = "index";
         $result["action"] = "display";
         //$result["action"] = "random";
         $result["params"]["limit"] = 3;

      } else {
         $parts = explode("/", $query);
        //var_dump($parts);

         switch ($parts[0]):
         case "film" :
			 //var_dump($parts);
			 //die;
             if (count($parts) == 2)
                {
                $result["controler"] = "Film";
                $result["action"] = "display";
                $result["params"]["id"] = $parts[1];
                //print_r($result);
                }
              else {break;}
         break;
         case "random" :
            if (count($parts) == 2)
            {
            $result["controler"] = "Index";
            $result["action"] = "random";
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
//print_r($result);

return $result;

   }







}
