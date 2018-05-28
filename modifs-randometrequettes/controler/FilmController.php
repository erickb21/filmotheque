<?php

class FilmController extends Controler {
   public function display() {
      $slug = $this->route["params"]["id"];
      $this->view->film = Film::getFromSlug($slug);
      $this->view->display();
   }

}
