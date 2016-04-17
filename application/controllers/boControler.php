<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of boControler
 *
 * @author Tafitasoa
 */
class boControler extends CI_Controller {
    //put your code here
    public function __construct(){

        parent::__construct();
        //echo 'Bonjour !';
        $session_dat = $this->session->userdata('login');
        if($session_dat){
            
        }
        else{
            redirect('accueil');
        }
    }
    
    public function typeInfraction(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Type Infraction');
        $crud->set_table('type_infraction');
        $crud->set_rules('LIBELLE','libelle','required');
        $crud->set_crud_url_path(site_url('boControler/typeInfraction'));
        $crud->unset_export();
        $crud->unset_print();
        
        
        $output = $crud->render();
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Type infraction administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
    public function infraction(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Infraction');
        $crud->set_table('infraction');
        $crud->set_crud_url_path(site_url('boControler/infraction'));
        $crud->set_relation('ID_PERSONNE','personne','NOM');
        $crud->set_relation('ID_TYPE_INFRACTION','type_infraction','LIBELLE');
        $crud->set_relation('ID_UTILISATEUR','utilisateur','USERNAME');
        $crud->field_type('DETENTION','dropdown', array('1' => 'Oui', '0' => 'Non'));
        $crud->field_type('ETAT','dropdown', array('1' => 'Payé', '0' => 'Non Payé'));
        $crud->unset_export();
        $crud->unset_print();
        
        
        $output = $crud->render();
        
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Type infraction administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
    public function personne(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Personne');
        $crud->set_table('personne');
        $crud->columns(array('NOM','PRENOM','DATE_NAISS','ADRESSE','IMMATRICULATION','PROFESSION'));
        $crud->set_rules('NOM','nom','required');
        $crud->set_rules('ADRESSE','Adresse','required');
        $crud->set_rules('IMMATRICULATION','Immatriculation','required');
        $crud->set_rules('NUMERO_TAG','Numeros Tag','required');
        $crud->field_type('SEXE','dropdown', array('0' => 'Femme', '1' => 'Homme'));
        $crud->field_type('SITUATION_MAT','dropdown', array('Marié', 'Célibataire'));
        $crud->set_crud_url_path(site_url('boControler/personne'));
        $crud->unset_export();
        $crud->unset_print();
        $crud->set_field_upload('IMAGE','assets/uploads/files');
        
        
        $output = $crud->render();
        
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Personne administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
    public function avisDeRecherche(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Avis de Recherche');
        $crud->set_table('avis_recherche');
        $crud->set_relation('ID_PERSONNE','personne','NOM');
        $crud->set_crud_url_path(site_url('boControler/avisDeRecherche'));
        $crud->unset_export();
        $crud->unset_print();
        
        
        $output = $crud->render();
        
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Avis de Recherche administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
    public function permisDeConduire(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Permis de conduire');
        $crud->set_table('permis_de_conduire');
        $crud->set_relation('ID_PERSONNE','personne','NOM');
        $crud->set_crud_url_path(site_url('boControler/permisDeConduire'));
        $crud->field_type('CATEGORIE_A','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->field_type('CATEGORIE_B','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->field_type('CATEGORIE_C','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->field_type('CATEGORIE_D','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->field_type('CATEGORIE_E','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->field_type('CATEGORIE_F','dropdown', array('0' => 'Non', '1' => 'Oui'));
        $crud->unset_export();
        $crud->unset_print();
        
        
        $output = $crud->render();
        
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Permis de Conduire administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
    public function utilisateur(){
        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->set_theme('twitter-bootstrap');
        $crud->set_subject('Utilisateur');
        $crud->set_table('utilisateur');
        $crud->set_relation('ID_PERSONNE','personne','NOM');
        $crud->set_rules('USERNAME','Username','required');
        $crud->set_rules('MDP','Mot de passe','required');
        $crud->field_type('MDP','password');
        $crud->field_type('TYPE','dropdown', array('admin' => 'Administrateur', 'civil' => 'Civil', 'controleur' => 'Contrôleur'));
        $crud->set_crud_url_path(site_url('boControler/utilisateur'));
        $crud->unset_export();
        $crud->unset_print();
        
        
        $output = $crud->render();
        
        $this->template->set_master_template('template/tmpl_admin');
        $this->template->write('title', "Type infraction administration");
        $this->template->write_view('content', 'administration/view_admin', $output);
        $this->template->render();
    }
}
