<?php
class Projetos_model extends CI_Model {


    /**
     * author: TI Poli Júnior 
     * email: polijunior.eng@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
    }
    /*
     function get($perpage=0,$start=0,$one=false){
        
        $this->db->from('projetos');
        $this->db->select('projetos.*, permissoes.nome as permissao');
        $this->db->limit($perpage,$start);
        $this->db->join('permissoes', 'projetos.permissoes_id = permissoes.idPermissao', 'left');
  
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }*/
    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idProjetos','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->where('idProjetos',$id);
        $this->db->limit(1);
        return $this->db->get('projetos')->row();
    }
    
    function add($table,$data, $returnId = false){
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

    public function autoCompleteCliente($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nomeCliente', $q);
        $query = $this->db->get('clientes');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nomeCliente'].' | Telefone: '.$row['telefone'],'id'=>$row['idClientes']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteAssociado($q){

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

    public function getEquipe($id = null){
        $this->db->select('projetos_equipe.*, associados.*');
        $this->db->from('projetos_equipe');
        $this->db->join('associados','associados.idAssociados = projetos_equipe.associado_id');
        $this->db->where('projeto_id',$id);
        return $this->db->get()->result();
    }
}