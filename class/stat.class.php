<?php
class Stat{
    /**
     * Atribut qui comporte tous les élements qui vont être utilisés dans nos calculs
     *
     * @var array
     */
    private $data;

    /**
     * Permet d'ajouter une valeur à notre tableau de données statistiques
     *
     * @param array $value
     * @return void
     */
    public function addData($value = array()){
        $this->data[count($this->data)] = (array)$value;
    }
    /**
     * Retourne les données de la classe
     *
     * @return array
     */
    public function getData(){
        return $this->data;
    }
    /**
     * Setteur des donnees
     *
     * @param array $donnees
     * @return void
     */
    public function setData($donnees = array()){
        $this->data = $donnees;
    }
    /**
     * Retourne l'effectif de la série statistique
     *
     * @return int
     */
    public function effectif(){
        $nbre = 0;
        for ($i=0; $i < count($this->data); $i++) { 
            # code...
            $nbre += $this->data[$i][0];
        }
        return $nbre;
    }
    /**
     * Effectif cumulé croissant
     *
     * @return array
     */
    public function effectif_cumule_croissant(){
        $donnees[0] = $this->data[0][0] * $this->data[0][1];
        for ($i=0; $i <count($this->data); $i++) { 
            # code...
            if($i!=0){
                $donnees[$i] = $this->data[$i][0] * $this->data[$i][1] + $donnees[$i-1];
            }
        } 
        return $donnees;
    }
    /**
     * Effectif cumulé décroissant
     *
     * @return array
     */
    public function effectif_cumule_decroissant(){

        $donnees[0] = $this->somme();
        for ($i=0; $i < count($this->data); $i++) { 
            # code...
            if($i!=0){
                $donnees[$i] = $donnees[$i-1] - $this->data[$i-1][0]*$this->data[$i-1][1];
            }
        }
        return $donnees;
    }
    /**
     * Retourne le somme de notre suite statistique
     *
     * @return int
     */
    public function somme(){
        $nb = 0;
        for ($i=0; $i <count($this->data); $i++) { 
            # code...
            $nb += $this->data[$i][0]*$this->data[$i][1];
        }                           
        return $nb;
    }
    /**
     * Retourne la moyenne de note suite statistique
     *
     * @return float
     */
    public function moyenne(){

        return $this->somme()/$this->effectif();

    }
    /**
     * Retourne le tableau des fréquences
     *
     * @return array
     */
    public function frequence(){
        $donnees = array();
        for ($i=0; $i < count($this->data); $i++) { 
            # code...
            $donnees[$i] = $this->data[$i][0] / $this->effectif();
        }
        return $donnees;
    }
    /**
     * Retourne la variance de notre structure statistique
     *
     * @return float
     */
    public function variance(){
        $variance = 0;
        for ($i=0; $i < count($this->data); $i++) { 
            # code...
            $variance += $this->data[$i][0] * pow($this->data[$i][1]-$this->moyenne(),2);
        }
        return $variance/$this->effectif();
    }
    /**
     * Rétourne l'écart-type de notre suite statistique
     *
     * @return float
     */
    public function ecartType(){
        return sqrt($this->variance());
    }
    /**
     * Coefficient de variation
     *
     * @return float Coefficient de variation
     */
    public function coef_variation(){
        return 100*$this->ecartType() / $this->moyenne();
    }
    /**
     *  Initialise les éléments du tableau de la suite statisique 
     *
     * @param array $donnees Elements de le suite statistique
     */
    public function __construct($donnees = array()){

        $this->data = $donnees;

    }
}
?>