<?php

class Projetos extends CI_Controller {
    

    /**
     * author: TI Poli Júnior 
     * email: polijunior.eng@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('gestorjr/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('projetos_model', '', TRUE);
        $this->load->model('associados_model', '', TRUE);
        $this->data['menuProjetos'] = 'Projetos';
    }
    
    function index(){
        $this->gerenciar();
    }

    function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vServico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar serviços.');
           redirect(base_url());
        }

        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/projetos/gerenciar/';
        $config['total_rows'] = $this->projetos_model->count('projetos');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);     

        $this->data['results'] = $this->projetos_model->get('projetos','idProjetos,nome,cliente,area,preco,dataContrato,horas,dataEntrega','',$config['per_page'],$this->uri->segment(3));
        /*$this->data['results'] = $this->projetos_model->get($config['per_page'],$this->uri->segment(3));*/
        $this->data['view'] = 'projetos/projetos';
        $this->load->view('tema/topo',$this->data);


       
        
    }
    
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aServico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar serviços.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('projetos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $dataContrato = $this->input->post('dataContrato');
            $dataEntrega = $this->input->post('dataEntrega');
            try {  
                $dataContrato = explode('/', $dataContrato);
                $dataContrato = $dataContrato[2].'-'.$dataContrato[1].'-'.$dataContrato[0];
                $dataEntrega = explode('/', $dataEntrega);
                $dataEntrega = $dataEntrega[2].'-'.$dataEntrega[1].'-'.$dataEntrega[0];
            } catch (Exception $e) {
               $dataContrato = date('d/m/y'); 
               $dataEntrega = date('d/m/y');
            }
            $this->load->library('encrypt');     
            $data = array(
                'nome' => set_value('nome'),
                'cliente' => set_value('cliente'),
                'area' => set_value('area'),
                'preco'=> set_value('preco'),
                'dataContrato'=> $dataContrato,
                'horas'=> set_value('horas'),
                'dataEntrega'=> $dataEntrega,
            );

            if ( is_numeric($id = $this->projetos_model->add('projetos', $data, true)) ) {
                $this->session->set_flashdata('success','Projeto adicionado com sucesso!');
                redirect('projetos/editar/'.$id);
            }/*/
            if ($this->projetos_model->add('projetos', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Projeto adicionado com sucesso!');
                redirect(base_url() . 'index.php/projetos');
            }/**/ else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 
        $this->data['view'] = 'projetos/adicionarProjeto';
        $this->load->view('tema/topo', $this->data);

    }
function editar(){  
        
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('gestorjr');
        }

        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cliente', 'Cliente', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area', 'Área', 'trim|required|xss_clean');
        $this->form_validation->set_rules('preco', 'Preço', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dataContrato', 'Data do Contrato', 'trim|required|xss_clean');
        $this->form_validation->set_rules('horas', 'Horas do Projeto', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dataEntrega', 'Data de Entrega', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        { 

            $data = array(
                    'nome' => $this->input->post('nome'),
                    'cliente' => $this->input->post('cliente'),
                    'area' => $this->input->post('area'),
                    'preco' => $this->input->post('preco'),
                    'dataContrato' => $this->input->post('dataContrato'),
                    'horas' => $this->input->post('horas'),
                    'dataEntrega' => $this->input->post('dataEntrega')
                    ); 
       
            if ($this->projetos_model->edit('projetos',$data,'idProjetos',$this->input->post('idProjetos')) == TRUE)
            {
                $this->session->set_flashdata('success','Usuário editado com sucesso!');
                redirect(base_url().'index.php/projetos/');//.$this->input->post('idProjetos'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';

            }
        }

        $this->data['result'] = $this->projetos_model->getById($this->uri->segment(3));
        $this->data['equipe'] = $this->projetos_model->getEquipe($this->uri->segment(3));
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 

        $this->data['view'] = 'projetos/editarProjeto';
        $this->load->view('tema/topo',$this->data);
            
      
    }
    public function visualizar(){

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('gestorjr');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar clientes.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->projetos_model->getById($this->uri->segment(3));
        $this->data['view'] = 'projetos/visualizarProjeto';
        $this->load->view('tema/topo', $this->data);

        //Teste BD associado
        $this->data['resultAss'] = $this->associados_model->getById(3);

        
    }

   function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dServico')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir serviços.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir serviço.');            
            redirect(base_url().'index.php/projetos/gerenciar/');
        }

        //$this->db->where('projetos_id', $id);
       // $this->db->delete('projetos_os');

        $this->projetos_model->delete('projetos','idProjetos',$id);             
        

        $this->session->set_flashdata('success','Serviço excluido com sucesso!');            
        redirect(base_url().'index.php/projetos/gerenciar/');
    }

    public function adicionarAssociado(){

        
        $data = array(
            'associado_id'=> $this->input->post('idAssociados'),
            'projeto_id'=> $this->input->post('idProjetos'),
        );

        if($this->projetos_model->add('projetos_equipe', $data) == true){

            echo json_encode(array('result'=> true));
        }else{
            echo json_encode(array('result'=> false));
        }

    }

    function excluirAssociado(){
            $ID = $this->input->post('idServico');
            if($this->projetos_model->delete('servicos_os','idServicos_os',$ID) == true){

                echo json_encode(array('result'=> true));
            }
            else{
                echo json_encode(array('result'=> false));
            }
    }
    
    public function autoCompleteCliente(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->projetos_model->autoCompleteCliente($q);
        }

    }
    public function autoCompleteAssociado(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->projetos_model->autoCompleteAssociado($q);
        }

    }
}

