<?php

class IndexController extends Controler {

    public function display()
    {
        $limit = $this->route["params"]["limit"];

        $randomFilms = Film::getListRandom($limit);
		//print_r($randomFilms . "<br/>");

        $template = $this->twig->loadTemplate('/index/display.html.twig');
        echo $template->render(array(
            'randomFilms'  => $randomFilms
        ));

    }

    public function initListSearch(){
		//$saisie = $_POST("saisie"); //$this->route["params"]["saisie"];
		$saisie=$this->route["params"]["saisie"];
		//print_r("SAISIE : " .$saisie);
		//die();
		$listeFilms = Film::lookforSearch($saisie);
		//echo count(($listeFilms));

		//if (count($listeFilms)===0)
		//{
		//    $listeFilms = Film::lookforSearch("%".$saisie);
		//}
		////echo count($listeFilms);
		if (count($listeFilms)===0)
		{
			echo "";
			die();
		}

		foreach ($listeFilms as $films ) :
			echo $films['id_FILMS'] .':'.$films['titre_FILMS'] .';';
		endforeach;
	}
}
