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
class Nfc_personne extends CI_Model {
    //put your code here
    protected $table = 'personne';
	
    public function liste_personne(){
        try{
            $query = $this->db->get('personne');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function liste_personne_recherche(){
        try{
            $query = $this->db->get('personne_recherche');
            return $query->result();
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function getPersonneId($id){
        try{
            $this->db->select('*')
                    ->where('ID_PERSONNE', $id);
            
            $query = $this->db->get('personne');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function getPersonneTag($tag){
        try{
            $this->db->select('*')
                    ->where('NUMERO_TAG', $tag);
            
            $query = $this->db->get('personne');
            return $query->row();
                            
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function ajout_personne($data){
       try{
            $this->db->set('NOM', $data['nom']);
            $this->db->set('PRENOM', $data['prenom']);
            $this->db->set('SEXE', $data['sexe']);
            $this->db->set('DATE_NAISS', $data['date_naiss']);
            $this->db->set('ADRESSE', $data['adresse']);
            $this->db->set('IMAGE', $data['image']);
            $this->db->set('LIEU_NAISS', $data['lieu_naiss']);
            $this->db->set('IMMATRICULATION', $data['immatriculation']);
            $this->db->set('PROFESSION', $data['profession']);
            $this->db->set('NOM_PERE', $data['non_pere']);
            $this->db->set('NOM_MERE', $data['nom_mere']);
            $this->db->set('SITUATION_MAT', $data['situation_mat']);
            $this->db->set('NUMERO_TAG', $data['numero_tag']);
            $this->db->set('STATUT', $data['statut']);
           
            $this->db->insert($this->table);
           
           return $this->candidat_cin($data['numero_tag']);
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function update_personne($data){
        try{
		 
            $this->db->set('NOM', $data['nom']);
            $this->db->set('PRENOM', $data['prenom']);
            $this->db->set('SEXE', $data['sexe']);
            $this->db->set('DATE_NAISS', $data['date_naiss']);
            $this->db->set('ADRESSE', $data['adresse']);
            $this->db->set('IMAGE', $data['image']);
            $this->db->set('LIEU_NAISS', $data['lieu_naiss']);
            $this->db->set('IMMATRICULATION', $data['immatriculation']);
            $this->db->set('PROFESSION', $data['profession']);
            $this->db->set('NOM_PERE', $data['non_pere']);
            $this->db->set('NOM_MERE', $data['nom_mere']);
            $this->db->set('SITUATION_MAT', $data['situation_mat']);
            $this->db->set('NUMERO_TAG', $data['numero_tag']);
            $this->db->set('STATUT', $data['statut']);
           
           $this->db->where('ID_PERSONNE', (int) $data['id_personne']);

           
           return $this->db->update($this->table);
        } catch (Exception $e){
            throw $e;
        }
    }
	
    public function supprime_personne($id){
        try{
            return $this->db->where('ID_PERSONNE', (int)$id)
                            ->delete($this->table);
        } catch (Exception $e){
            throw $e;
        }
    }
    
    public function recherche_multicriteres($critere){
        $data = array();
        
        $nom = $this->db->escape_like_str($critere['nom']);
        $prenom= $this->db->escape_like_str($critere['prenom']);
        $date_naiss_min = $critere['date_naiss_min'];
        $date_naiss_max = $critere['date_naiss_max'];
        $immatriculation = $this->db->escape_like_str($critere['immatriculation']);
        $numero_tag = $this->db->escape_like_str($critere['numero_tag']);
        $sexe = 1;
        if($critere['sexe'] != null && $critere['sexe'] != ''){
            if($critere['sexe'] == 'femme'){
                $sexe = 0;
            }
        }
        
        try{            
            $sql = "select * from personne p
                    where p.NOM LIKE '%$nom%'
                    AND p.PRENOM LIKE '%$prenom%'
                    AND p.IMMATRICULATION LIKE '%$immatriculation%'
                    AND p.NUMERO_TAG LIKE '%$numero_tag%'
                    AND p.SEXE = ?";
            if($date_naiss_min != '' && $date_naiss_max != ''){
               $sql = $sql + " AND p.DATE_NAISS between '$date_naiss_min' and '$date_naiss_max'"; 
            }
            $query = $this->db->query($sql, array($sexe));
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                     $data[] = $row;
                }
            }
            return $data;
        } catch (Exception $e){
            throw $e;
        }
    }
}

?>
