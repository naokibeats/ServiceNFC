<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of candidat
 *
 * @author tafitasoa.andriamana
 */
class NfcControler extends CI_Controller {
    
    public function __construct(){

        parent::__construct();
        
    }
	
	//Type Infraction
    public function getTypeInfraction(){
        try{
            $this->load->model('nfc_type_infraction', 'typeInf');
            $data = $this->typeInf->liste_type_infraction();
            $json = json_encode($data);
            echo $json;
        } catch (Exception $e){
            echo json_encode($e);
        }
    }
	
    public function getTypeInfractionById($param){
        $this->load->model('nfc_type_infraction', 'typeInf');
        $data = $this->typeInf->get_type_infraction_id($param);
        $json = json_encode($data);
        echo $json;
    }
    //Fin Type infraction
	
    //Infraction
    public function infractionById($param){
        $this->load->model('nfc_infraction', 'Inf');
        $data = $this->Inf->getInfractionById($param);
        $json = json_encode($data);
        echo $json;
    }
	
    public function infractionByIdPersonne($param){
        $this->load->model('nfc_infraction', 'Inf');
        $data = $this->Inf->getInfractionByIdPersonne($param);
        $json = json_encode($data);
        echo $json;
    }
    
    public function infractionByIdUtilisateur($param){
        $this->load->model('nfc_infraction', 'Inf');
        $data = $this->Inf->getInfractionByIdUtilisateur($param);
        $json = json_encode($data);
        echo $json;
    }
    
    public function insertInfraction(){
        $this->load->model('nfc_infraction', 'Inf');
        $data = array();
        $data['id_personne'] = $_POST['id_personne'];
        $data['id_type_infraction'] = $_POST['id_type_infraction'];
        $data['id_utilisateur'] = $_POST['id_utilisateur'];
        $data['date_infraction'] = $_POST['date_infraction'];
        $data['remarque'] = $_POST['remarque'];
        $data['detention'] = $_POST['detention'];
        $this->Inf->ajout_infraction($data);
        echo 'true';
    }
    
    public function updateInfraction(){
        $this->load->model('nfc_infraction', 'Inf');
        $data = array();
        $data['id_infraction'] = $_POST['id_infraction'];
        $data['id_personne'] = $_POST['id_personne'];
        $data['id_type_infraction'] = $_POST['id_type_infraction'];
        $data['id_utilisateur'] = $_POST['id_utilisateur'];
        $data['date_infraction'] = $_POST['date_infraction'];
        $data['remarque'] = $_POST['remarque'];
        $data['detention'] = $_POST['detention'];
        $this->Inf->modif_infraction($data);
        echo 'true';
    }
    
    public function deleteInfraction($id){
        $this->load->model('nfc_infraction', 'Inf');
        $this->Inf->supprime_infraction($id);
        echo 'true';
    }
    //Fin Infraction
	
    //Personne
    public function personneById($param){
        $this->load->model('nfc_personne', 'pers');
        $data = $this->pers->getPersonneId($param);
        $json = json_encode($data);
        echo $json;
    }
	
    public function getAllInfoPersonneByTag($tagParam){
        $this->load->model('nfc_personne', 'pers');
        $this->load->model('nfc_permis_conduire', 'permis');
        $this->load->model('nfc_infraction', 'infraction');
        $this->load->model('nfc_avis_recherche', 'recherche');
        $data = array();
        $data['personne'] = $this->pers->getPersonneTag($tagParam);
        if($data['personne'] != null){
            $data['permis_conduire'] = $this->permis->getPermisByIdPersonne($data['personne']->ID_PERSONNE);
            $data['liste_infraction'] = $this->infraction->getInfractionByIdPersonne($data['personne']->ID_PERSONNE);
            $avis_recherche = $this->recherche->ifExistAvisRechercheByIdPersonne($data['personne']->ID_PERSONNE);
            if($avis_recherche != null){
                $data['avis_recherche'] = 1;
            }else{
                $data['avis_recherche'] = 0;
            }
            $json = json_encode($data);
            echo $json;
        }else{
            echo 'echec';
        }
        
    }
    
    public function findPersonneMultiple(){
        $this->load->model('nfc_personne', 'pers');
        $data = array();
        $data['nom'] = $_POST['nom'];
        $data['prenom'] = $_POST['prenom'];
        $data['date_naiss_min'] = $_POST['date_naiss_min'];
        $data['date_naiss_max'] = $_POST['date_naiss_max'];
        $data['immatriculation'] = $_POST['immatriculation'];
        $data['numero_tag'] = $_POST['numero_tag'];
        $data['sexe'] = $_POST['sexe'];
        $retour = $this->pers->recherche_multicriteres($data);
        if($retour != null){
            $json = json_encode($retour);
            echo $json;
        }else{
            echo 'Aucune personne trouve';
        }
        
    }
    //Fin Personne
    
    //Utilisateur
    public function authentification(){
        $this->load->model('nfc_utilisateur', 'util');
        $data = null;
        if(isset($_POST["username"]) && isset($_POST['mdp'])){
            $user = $_POST['username'];
            $mdp = $_POST['mdp'];
            $data = $this->util->get_utilisateur_user_mdp($user, $mdp);
            $json = json_encode($data);
            echo $json;
        }else{
            echo 'echec';
        }
        
    }
    //Fin Utilisateur
    
    //Avis de recherche
    public function getAllAvisRecherche(){
        try{
            $this->load->model('nfc_avis_recherche', 'recherche');
            $data = $this->recherche->liste_avis_recherche();
            $json = json_encode($data);
            echo $json;
        } catch (Exception $e){
            echo json_encode($e);
        }
    }
    //fin avis de recherche
}

?>