<?php

namespace App\Model;

use App\Model\Connexion;

class DataManager
{ 
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $this->pdo = (new Connexion())->getPdoConnection();
    }

    /**
     * Return All colis
     */
    public function findAll() : array
    {
        $query = 'SELECT * FROM colis ORDER BY date_expedition DESC';
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }

    /**
     * Return All distinct dates
     */
    public function findAllDates() : array
    {
        $query = 'SELECT DISTINCT date_expedition FROM colis ORDER BY date_expedition DESC';
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }

    /**
     * Insert datas in colis
     */
    public function insert($datas)
    {
        foreach($datas as $data) {
            
                $query = "INSERT INTO colis (expediteur,date_expedition,numero_envoi,destinataire,reference,bon_de_transport,montant_ht_total)
                    VALUES (:expediteur,:date_expedition,:numero_envoi,:destinataire,:reference,:bon_de_transport,:montant_ht_total)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindValue(':expediteur', $data['expediteur'], \PDO::PARAM_STR);
                $stmt->bindValue(':date_expedition', $data['date_expedition'], \PDO::PARAM_STR);
                $stmt->bindValue(':numero_envoi', $data['numero_envoi'], \PDO::PARAM_STR);
                $stmt->bindValue(':destinataire', $data['destinataire'], \PDO::PARAM_STR);
                $stmt->bindValue(':reference', $data['reference'], \PDO::PARAM_STR);
                $stmt->bindValue(':bon_de_transport', $data['bon_de_transport'], \PDO::PARAM_STR);
                //TODO : float truncated
                $stmt->bindValue(':montant_ht_total', strval($data['montant_ht_total']), \PDO::PARAM_STR);
                $stmt->execute();
        }
    }
}