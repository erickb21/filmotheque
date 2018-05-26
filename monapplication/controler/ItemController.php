<?php

class ItemController extends Controler {
   public function display() {
      $slug = $this->route["params"]["id"];
      $this->view->item = Item::getFromSlug($slug);
      $this->view->display();
   }

}
