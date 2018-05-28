<?php

class RandomController extends Controler {
   
   public function display() {
    $slug = $this->route["params"]["limit"];
    $this->view->list = Film::getListRandom($slug);
    $this->view->display();
   }

}
