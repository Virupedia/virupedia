<?php

class livraison
{


    
    private $date_livraison;
    private $etat_livraison;
    private $Adresse_livraison;
    private $idUsers;
    

    public function getid()
    {
        return $this->id;
    }

    public function getdate_livraison()
    {
        return $this->date_livraison;
    }

    public function getetat_livraison()
    {
        return $this->etat_livraison;
    }
    public function getAdresse_livraison()
    {
        return $this->Adresse_livraison;
    }
   

    public function setdate_livraison($date_livraison)
    {
        $this->date_livraison = $date_livraison;
    }
    public function setetat_livraison($etat_livraison)
    {
        $this->etat_livraison = $etat_livraison;
    }
    public function setAdresse_livraison($Adresse_livraison)
    {
        $this->Adresse_livraison = $Adresse_livraison;
    }
    
    public function __construct($date_livraison,$etat_livraison,$Adresse_livraison)
    {
        $this->date_livraison = $date_livraison;
        $this->etat_livraison = $etat_livraison;
        $this->Adresse_livraison = $Adresse_livraison;
        
    }
}
?>