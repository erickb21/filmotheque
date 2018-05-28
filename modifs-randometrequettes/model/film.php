<?php
//
class Film extends Model {

   public static function getFromSlug( $id ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films, films_genres, films_realisateurs, realisateurs, genres WHERE films.id_FILMS = :id AND films_genres.id_FILMS_FG=films.id_FILMS and films_realisateurs.id_FILMS_FR=films.id_FILMS group by films.id_FILMS";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Film");
      $stmt->bindValue( ':id', $id, PDO::PARAM_STR); 
      $stmt->execute();
      return $stmt->fetch();
   }

   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Film");
      return $stmt->fetchAll();

   }

      public static function getListRandom($limit) {
      $db = Database::getInstance();
      $sql = "SELECT id_FILMS, titre_FILMS, image_FILMS  FROM films ORDER BY RAND() LIMIT :limit";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Film");
      $stmt->bindValue( ':limit', intval($limit), PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll();

       
   }

}



