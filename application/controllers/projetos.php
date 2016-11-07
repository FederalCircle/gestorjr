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

            $this->load->library('encrypt');     
            $data = array(
                'nome' => set_value('nome'),
                'cliente' => set_value('cliente'),
                'area' => set_value('area'),
                'preco'=> set_value('preco'),
                'dataContrato'=> set_value('dataContrato'),
                'horas'=> set_value('horas'),
                'dataEntrega'=> set_value('dataEntrega'),
            );

            if ($this->projetos_model->add('projetos', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Projeto adicionado com sucesso!');
                redirect(base_url() . 'index.php/projetos');
            } else {
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

            if ($this->input->post('idProjetos') == 1 && $this->input->post('situacao') == 0)
            {
                $this->session->set_flashdata('error','O usuário super admin não pode ser desativado!');
                redirect(base_url().'index.php/projetos/editar/'.$this->input->post('idProjetos'));
            }

            $senha = $this->input->post('senha'); 
            if($senha != null){
                $this->load->library('encrypt');   
                $senha = $this->encrypt->sha1($senha);

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'curso' => $this->input->post('curso'),
                        'cpf' => $this->input->post('cpf'),
                        'rua' => $this->input->post('rua'),
                        'numero' => $this->input->post('numero'),
                        'bairro' => $this->input->post('bairro'),
                        'cidade' => $this->input->post('cidade'),
                        'estado' => $this->input->post('estado'),
                        'email' => $this->input->post('email'),
                        'senha' => $senha,
                        'telefone' => $this->input->post('telefone'),
                        'celular' => $this->input->post('celular'),
                        'dataAss' => $this->input->post('dataAss'),
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );
            }  

            else{

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'curso' => $this->input->post('curso'),
                        'cpf' => $this->input->post('cpf'),
                        'rua' => $this->input->post('rua'),
                        'numero' => $this->input->post('numero'),
                        'bairro' => $this->input->post('bairro'),
                        'cidade' => $this->input->post('cidade'),
                        'estado' => $this->input->post('estado'),
                        'email' => $this->input->post('email'),
                        'telefone' => $this->input->post('telefone'),
                        'celular' => $this->input->post('celular'),
                        'dataAss' => $this->input->post('dataAss'),
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );

            }  

           
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
        //$this->data['results'] = $this->projetos_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'projetos/visualizarProjeto';
        $this->load->view('tema/topo', $this->data);

        //Teste BD associado
        $this->data['resultAss'] = $this->associados_model->getById(3);

        
    }
/*
            $ID =  $this->uri->segment(3);
            $this->projetos_model->delete('projetos','idProjetos',$ID);             
            redirect(base_url().'index.php/projetos/gerenciar/');
    }*/
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
}

