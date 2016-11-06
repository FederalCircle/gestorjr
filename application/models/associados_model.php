<?php
class Associados_model extends CI_Model {


    /**
     * author: TI Poli Júnior 
     * email: polijunior.eng@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
    }
     function get($perpage=0,$start=0,$one=false){
        
        $this->db->from('associados');
        $this->db->select('associados.*, permissoes.nome as permissao');
        $this->db->limit($perpage,$start);
        $this->db->join('permissoes', 'associados.permissoes_id = permissoes.idPermissao', 'left');
  
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
     function getDesempenho($perpage=0,$start=0,$one=false){
        
        $this->db->from('desempenho');
        $this->db->select('desempenho.*');
        $this->db->limit($perpage,$start);  
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

     function DesempenhogetById($id){
        $this->db->where('associados_id',$id);
        $this->db->limit(1);
        return $this->db->get('desempenho')->row();
      }
    function getById($id){
        $this->db->where('idAssociados',$id);
        $this->db->limit(1);
        return $this->db->get('associados')->row();
    }
    
     function addDesempenho($table,$data,$returnId = false){

        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
        {
                        if($returnId == true){
                            return $this->db->insert_id($table);
                        }
            return TRUE;
        }
        
        return FALSE;       
    }
    function add($table,$data,$returnId = false){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{             
                            if($returnId == true){
                            return $this->db->insert_id($table);
                        }
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}
     public function autoCompleteAssociados($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $this->db->where('situacao',1);
        $query = $this->db->get('associados');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nome'],'id'=>$row['idAssociados']);
            }
            echo json_encode($row_set);
        }
    }
}