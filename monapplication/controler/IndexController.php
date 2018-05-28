<?php

class IndexController extends Controler {
   
   public function display() {
      $this->view->list = Film::getList();
      $this->view->display();
   }

}
