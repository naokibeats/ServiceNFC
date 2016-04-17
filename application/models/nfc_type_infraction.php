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
class Nfc_type_infraction extends CI_Model {
    //put your code here
    public function liste_type_infraction(){
        try{
            $query = $this->db->get('type_infraction');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function get_type_infraction_id($id){
        try{
            $this->db->select('*')
                    ->where('ID_TYPE_INFRACTION', $id);
            
            $query = $this->db->get('type_infraction');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
}

?>
