<?php

class Film extends Model {

   public static function getFromSlug( $id ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films WHERE id_FILMS=:id";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      $stmt->bindValue( ':id', $id, PDO::PARAM_INT); 

      $stmt->execute();
      return $stmt->fetch();
   }

   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

   }

   public static function getListRandom($limit) 
   {
    $db = Database::getInstance();
    $sql = "SELECT id_FILMS, titre_FILMS, image_FILMS  FROM films ORDER BY RAND() LIMIT :limit";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindValue(':limit', intval($limit), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
   }
}