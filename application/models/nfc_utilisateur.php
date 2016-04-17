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
class Nfc_utilisateur extends CI_Model {
    //put your code here
    public function liste_utilisateur(){
        try{
            $query = $this->db->get('utilisateur');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function get_utilisateur_id($id){
        try{
            $this->db->select('*')
                    ->where('ID_UTILISATEUR', $id);
            
            $query = $this->db->get('utilisateur');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function get_utilisateur_user_mdp($user, $mdp){
        try{
            $this->db->select('*')
                    ->where('USERNAME', $user)
                    ->where('MDP', $mdp);
            
            $query = $this->db->get('utilisateur');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function get_pseudo($login, $mdp){
        try{
            $sql = "select username, mdp from utilisateur where username = ? and mdp = ? and TYPE = ?";
            $query = $this->db->query($sql, array($login, $mdp, "admin"));
            if($query->num_rows() > 0){
                $row = $query->row();
                $data_session = array(
                    'login' => $row->username,
                    'mdp' => $row->mdp
                );
                $this->session->set_userdata($data_session);
                return true;
            }
            else{ return false; }
        } catch (Exception $e){
            throw $e;
        }
    }
}

?>
