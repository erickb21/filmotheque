<?php

class Controler {
   protected $route;
   protected $view;
   public function affichecontroleur()
{
echo $this.$route;
echo $this.$view;
}

   public function __construct( $route ) {
      $this->route = $route;
      $this->view = new View( $route );
   }

}
