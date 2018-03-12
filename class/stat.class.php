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
     * @param int $value
     * @return void
     */
    public function addData($value){
        $this->data[count($this->data)] = (int)$value;
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
        $nb = 0;
        foreach ($this->data as $key => $value) {
            # code...
            $nb += (int) $key;
        }
        return $nb;
    }
    /**
     * Retourne la moyenne de note suite statistique
     *
     * @return int
     */
    public function moyenne(){

        $somme = 0;

        foreach($this->data as $key => $value){
            $somme += (int) $key * (int) $value;
        }
        return $somme/$this->effectif();
    }
    /**
     * Retourne le tableau des fréquences
     *
     * @return array
     */
    public function frequence(){
        $donnees = array();
        $i = 0;
        foreach ($this->data as $key => $value) {
            # code...
            $donnees[$i] = (int) $key / $this->effectif();
            $i++;
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
        foreach ($this->data as $key => $value) {
            # code...
            $variance += (int) $key * pow( (int) $value - $this->moyenne(),2);
        }
        return $variance;
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