<?php
//
class Film extends Model {

   public static function getFromSlug( $id ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films WHERE id_FILMS = :id";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      $stmt->bindValue( ':id', $id, PDO::PARAM_STR); 

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

}



