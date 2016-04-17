<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accueil
 *
 * @author Tafitasoa
 */
class accueil extends CI_Controller {
    //put your code here
    public function index(){        
        $var['err'] = null;
        $this->load->view('index', $var);
    }
    
    public function connexion(){
        try{
            $this->load->model('nfc_utilisateur', 'util');
            $res = $this->util->get_pseudo($this->input->post('username'), $this->input->post('mdp'));

            if($res){
                redirect('boControler/typeInfraction'); 
            }
            else{
                $var['err'] = 'Erreur username ou mot de passe!!!';
                $this->load->view('index', $var);
            }
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function deconnexion(){
        // Détruit la session
        $this->session->sess_destroy();
        // Redirige vers la page login
        redirect('accueil');
    }
}
