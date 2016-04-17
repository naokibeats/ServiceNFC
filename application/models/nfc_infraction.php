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
class Nfc_infraction extends CI_Model {
    //put your code here
    protected $table = 'infraction';
    
    public function getAllInfraction(){
        try{
            $query = $this->db->get('infraction');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function getInfractionById($id){
        try{
            $this->db->select('*')
                    ->where('ID_INFRACTION', $id);
            
            $query = $this->db->get('infraction');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function getInfractionByIdPersonne($idPers){
        try{
            $this->db->select('*')
                    ->where('ID_PERSONNE', $idPers);
            
            $query = $this->db->get('view_infraction_libelle');
            return $query->result();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function getInfractionByIdUtilisateur($idUtil){
        try{
            $this->db->select('*')
                    ->where('ID_UTILISATEUR', $idUtil);
            
            $query = $this->db->get('view_infraction_libelle');
            return $query->result();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function ajout_infraction($data){
        try{
		 
            $this->db->set('ID_PERSONNE', $data['id_personne']);
            $this->db->set('ID_TYPE_INFRACTION', $data['id_type_infraction']);
            $this->db->set('ID_UTILISATEUR', $data['id_utilisateur']);
            $this->db->set('DATE_INFRACTION', $data['date_infraction']);
            $this->db->set('REMARQUE', $data['remarque']);
            $this->db->set('DETENTION', $data['detention']);

           
           return $this->db->insert($this->table);
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function modif_infraction($data){
        try{
		 
            $this->db->set('ID_PERSONNE', $data['id_personne']);
            $this->db->set('ID_TYPE_INFRACTION', $data['id_type_infraction']);
            $this->db->set('ID_UTILISATEUR', $data['id_utilisateur']);
            $this->db->set('DATE_INFRACTION', $data['date_infraction']);
            $this->db->set('REMARQUE', $data['remarque']);
            $this->db->set('DETENTION', $data['detention']);
           
            $this->db->where('ID_INFRACTION', (int) $data['id_infraction']);
           
           return $this->db->update($this->table);
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function supprime_infraction($id){
        try{
            return $this->db->where('ID_INFRACTION', (int)$id)
                            ->delete($this->table);
        } catch (Exception $e){
            throw $e;
        }
    }
}

?>
