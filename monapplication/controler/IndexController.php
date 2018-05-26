<?php

class IndexController extends Controler {
   
   public function display() {
      $this->view->list = Item::getList();
      $this->view->display();
   }

}
