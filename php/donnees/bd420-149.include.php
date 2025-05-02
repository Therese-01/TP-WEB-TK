<?php
require_once __DIR__.'/config.bd.include.php';


/** Retourne le id et le nom d'un enregistrement selon le id */
function selectToutById(int $id)
{
    try {
    
        $maConnexionPDO = getConnexionBd();
        $pdoRequete = $maConnexionPDO->prepare("select * from utilisateurs where id=:id");

        $pdoRequete->bindParam(":id",$id,PDO::PARAM_INT);
    
        $pdoRequete->execute();

        return $pdoRequete->fetch(PDO::FETCH_OBJ);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}

/** Retourne tous les enregistrements de la table fleurs */
function selectTout()
{
    try {

        $maConnexionPDO = getConnexionBd();
        $pdoRequete = $maConnexionPDO->prepare("select * from utilisateurs");
    
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);
    
        

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}


/** Retourne une connexion sur la bd. */
function getConnexionBd()
{
    try {
        $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

        return new PDO($chaineConnexion,BDUTILISATEUR_LIRE,BDMDP);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}