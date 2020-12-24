<?php

class livreur
{


    
    private $nom_livreur;
    private $prenom_livreur;
    private $Address_livreur;
    private $login_livreur;
    private $Cin_livreur;
    private $Password_livreur;
    private $ImageUsers_livreur;
    private $role_livreur;
    private $nblivraison_livreur;
    

    public function getid()
    {
        return $this->id;
    }

    public function getnom_livreur()
    {
        return $this->nom_livreur;
    }

    public function getprenom_livreur()
    {
        return $this->prenom_livreur;
    }
    public function getAddress_livreur()
    {
        return $this->Address_livreur;
    }
    public function getlogin_livreur()
    {
        return $this->login_livreur;
    }
    public function getCin_livreur()
    {
        return $this->Cin_livreur;
    }
    public function getPassword_livreur()
    {
        return $this->Password_livreur;
    }
    public function getImageUsers_livreur()
    {
        return $this->ImageUsers_livreur;
    }
    public function getrole_livreur()
    {
        return $this->role_livreur;
    }
    public function getnblivraison_livreur()
    {
        return $this->nblivraison_livreur;
    }





    public function setnom_livreur($nom_livreur)
    {
        $this->nom_livreur = $nom_livreur;
    }
    public function setprenom_livreur($prenom_livreur)
    {
        $this->prenom_livreur = $prenom_livreur;
    }
    public function setAddress_livreur($Address_livreur)
    {
        $this->Address_livreur = $Address_livreur;
    }
    public function setlogin_livreur($login_livreur)
    {
        $this->login_livreur = $login_livreur;
    }
    public function setCin_livreur($Cin_livreur)
    {
        $this->Cin_livreur = $Cin_livreur;
    }
    public function setPassword_livreur($Password_livreur)
    {
        $this->Password_livreur = $Password_livreur;
    }
    public function setImageUsers_livreur($ImageUsers_livreur)
    {
        $this->ImageUsers_livreur = $ImageUsers_livreur;
    }
    public function setrole_livreur($role_livreur)
    {
        $this->role_livreur = $role_livreur;
    }
    public function setnblivraison_livreur($nblivraison_livreur)
    {
        $this->nblivraison_livreur = $nblivraison_livreur;
    }

    public function __construct($nom_livreur,$prenom_livreur,$Address_livreur,$login_livreur,$Cin_livreur,$Password_livreur,$ImageUsers_livreur,$role_livreur,$nblivraison_livreur)
    {
        $this->nom_livreur = $nom_livreur;
        $this->prenom_livreur = $prenom_livreur;
        $this->Address_livreur = $Address_livreur;
        $this->login_livreur = $login_livreur;
        $this->Cin_livreur = $Cin_livreur;
        $this->Password_livreur = $Password_livreur;
        $this->ImageUsers_livreur = $ImageUsers_livreur;
        $this->role_livreur = $role_livreur;
        $this->nblivraison_livreur = $nblivraison_livreur;
    }
}
?>