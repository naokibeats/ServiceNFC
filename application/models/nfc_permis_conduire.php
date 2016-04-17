<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statut_offre_model
 *
 * @author tafitasoa.andriamana
 */
class Nfc_permis_conduire extends CI_Model {
    //put your code here
    public function getAllPermis(){
        try{
            $query = $this->db->get('permis_de_conduire');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function getPermisById($id){
        try{
            $this->db->select('*')
                    ->where('ID_PERMIS', $id);
            
            $query = $this->db->get('permis_de_conduire');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function getPermisByIdPersonne($idPers){
        try{
            $this->db->select('*')
                    ->where('ID_PERSONNE', $idPers);
            
            $query = $this->db->get('permis_de_conduire');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
}

?>
