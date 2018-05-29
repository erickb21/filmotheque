<?php

class FilmController extends Controler {
   public function display() {
      $slug = $this->route["params"]["id"];
      $film = Film::getFromSlug($slug);
      /* $realisateur = Film::getRealisateur($film['id_FILMS']); */
      $template = $this->twig->loadTemplate('/film/display.html.twig');
      echo $template->render(array(
        'film' => $film,
        /* 'realisateur' => $realisateur */
      ));
   }

    

}
