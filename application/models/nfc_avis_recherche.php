<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nfc_avis_recherche
 *
 * @author Tafitasoa
 */
class Nfc_avis_recherche extends CI_Model {
    //put your code here
    protected $table = 'avis_recherche';
    
    public function liste_avis_recherche(){
        try{
            $query = $this->db->get('avis_recherche');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function avisRechercheById($id){
        try{
            $this->db->select('*')
                    ->where('ID_RECHERCHE', $id);
            
            $query = $this->db->get('avis_recherche');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function avisRechercheByIdPersonne($idPers){
        try{
            $this->db->select('*')
                    ->where('ID_PERSONNE', $idPers);
            
            $query = $this->db->get('avis_recherche');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function ifExistAvisRechercheByIdPersonne($idPers){
        try{
            $this->db->select('*')
                    ->where('ID_PERSONNE', $idPers)
                    ->where('DATE_FIN', null);
            
            $query = $this->db->get('avis_recherche');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
}
