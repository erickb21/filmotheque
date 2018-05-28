<?php
//
class Film extends Model {
   //public $id, $titre, $description, $annee, $image ; //$slug;

   public static function getFromSlug( $id ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films WHERE id_FILMS = :id";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Film");//FETCH_ASSOC

      $stmt->bindValue( ':id', $id, PDO::PARAM_STR); 


      $stmt->execute();//array(":id" => $id
      return $stmt->fetch();
   }

   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Film");
      return $stmt->fetchAll();

   }

}



