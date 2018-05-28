<?php

class IndexController extends Controler {
   
   public function display() {
      $films = Film::getList();
      
      $template = $this->twig->loadTemplate('/index/display.html.twig');
      echo $template->render(array(
          'films'  => $films
      ));
   }

}
