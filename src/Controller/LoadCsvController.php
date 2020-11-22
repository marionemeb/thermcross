<?php 

namespace App\Controller;

use App\Model\DataManager;
use App\Controller\Renderer;

class LoadCsvController
{
    /**
     * @var DataManager
     */
    private $manager;

    /**
     * @var Renderer
     */
    private $render;

    public function __construct()
    {
        $this->manager = new DataManager();
        $this->render = new Renderer();
    }

    /**
     * Load csv file
     */
    function loadCsv()
    {
        if (isset($_POST["submit"]) ) {

            if (isset($_FILES["file"])) {
                $name = $_FILES["file"]["name"];
                $dirUpload = __DIR__ . "\..\..\upload\\";

                //if there was an error uploading the file
                if ($_FILES["file"]["error"] > 0) {
                    echo "Erreur: " . $_FILES["file"]["error"] . "<br/>";

                //if file already exists
                } elseif (file_exists( $dirUpload . $name)) {
                    echo "Ce fichier a déja été uploadé!";

                //check file type
                } elseif (explode( '.', $name)[1] !== 'csv') {
                    echo "Seul les fichier csv sont autorisés!";

                //storage csv file
                } else {
                    $datas = [];
                    move_uploaded_file($_FILES["file"]["tmp_name"], $dirUpload . $name);;
                    echo "Fichier enregistré sous: " . $dirUpload . $name . "<br/>";

                    $csv = fopen($dirUpload.$name, "r");
                    if ($csv !== false) {
                        while (!feof($csv)) {
                            $row = fgetcsv($csv, 1000, ";");
                            if (!empty($row)){
                                $datas[] = [
                                    'expediteur' => $row[11],
                                    'date_expedition' => $row[3],
                                    'numero_envoi' => $row[4],
                                    'destinataire' => $row[18],
                                    'reference' => $row[25],
                                    'bon_de_transport' => $row[26],
                                    'montant_ht_total' => intval($row[30]),
                                ];
                            } 
                        }
                        //remove first row in $datas
                        unset($datas[0]);
                    }
                    fclose($csv);
                    //insert in DB
                    $this->manager->insert($datas);
                    echo "Les données ont bien été insérées en base de donnée <br/>";
                    header('Location:/Data/index/');
                }
                return $this->render->render('welcome');
                
            } else {
                echo "Aucun fichier sélectionné <br/>";
                return $this->render->render('welcome');
            }
        }
    }
}

