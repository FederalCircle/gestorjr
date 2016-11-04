<?php

class Associados extends CI_Controller {
    

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
        $this->load->model('associados_model', '', TRUE);
        $this->data['menuAssociados'] = 'Associados';
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
        
        
        $config['base_url'] = base_url().'index.php/associados/gerenciar/';
        $config['total_rows'] = $this->associados_model->count('associados');
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

        /*$this->data['results'] = $this->associados_model->get('associados','idAssociados,nome,curso,cpf,rua,numero,bairro,cidade,estado,email,senha,telefone,celular,situacao,dataAss','',$config['per_page'],$this->uri->segment(3));
       */
        $this->data['results'] = $this->associados_model->get($config['per_page'],$this->uri->segment(3));
        $this->data['view'] = 'associados/associados';
        $this->load->view('tema/topo',$this->data);

       
        
    }
    
    function adicionar() {
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aOs')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar O.S.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        
        if ($this->form_validation->run('associados') == false) {
           $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataAss = $this->input->post('dataAss');

            try {
                
                $dataAss = explode('/', $dataAss);
                $dataAss = $dataAss[2].'-'.$dataAss[1].'-'.$dataAss[0];

            } catch (Exception $e) {
               $dataAss = date('d/m/y'); 
            }

            $this->load->library('encrypt');     
            $data = array(
                'nome' => set_value('nome'),
                'rua' => set_value('descricao'),
                'curso' => set_value('curso'),
                'cpf'=> set_value('cpf'),
                'rua'=> set_value('rua'),
                'numero'=> set_value('numero'),
                'bairro'=> set_value('bairro'),
                'cidade'=> set_value('cidade'),
                'estado'=> set_value('estado'),
                'email'=> set_value('email'),
                'senha'=> set_value('senha'),
                'telefone'=> set_value('telefone'),
                'celular'=> set_value('celular'),
                'situacao'=> set_value('situacao'),
                'dataAss' => $dataAss,
                'permissoes_id' => $this->input->post('permissoes_id'),
                //'dataAss' => set_value('dataAss'),
            );

            if ($this->associados_model->add('associados', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Serviço adicionado com sucesso!');
                redirect(base_url() . 'index.php/associados');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 
        $this->data['view'] = 'associados/adicionarAssociado';
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
        $this->form_validation->set_rules('curso', 'Curso', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rua', 'Rua', 'trim|xss_clean');
        $this->form_validation->set_rules('numero', 'Número', 'trim|xss_clean');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|xss_clean');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|xss_clean');
        $this->form_validation->set_rules('dataAss', 'dataAss', 'trim|required|xss_clean');
        $this->form_validation->set_rules('situacao', 'Situação', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permissoes_id', 'Permissão', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        { 
            $dataAss = $this->input->post('dataAss');

            try {
                
                $dataAss = explode('/', $dataAss);
                $dataAss = $dataAss[2].'-'.$dataAss[1].'-'.$dataAss[0];

            } catch (Exception $e) {
               $dataAss = date('d/m/Y'); 
            }

            if ($this->input->post('idAssociados') == 1 && $this->input->post('situacao') == 0)
            {
                $this->session->set_flashdata('error','O usuário super admin não pode ser desativado!');
                redirect(base_url().'index.php/associados/editar/'.$this->input->post('idAssociados'));
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
                        'dataAss' => $dataAss,
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
                        'dataAss' => $dataAss,
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );

            }  

           
            if ($this->associados_model->edit('associados',$data,'idAssociados',$this->input->post('idAssociados')) == TRUE)
            {
                $this->session->set_flashdata('success','Usuário editado com sucesso!');
                redirect(base_url().'index.php/associados/');
                            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';

            }
        }
        $this->data['desempenho'] = $this->associados_model->DesempenhogetById($this->uri->segment(3));
        $this->data['result'] = $this->associados_model->getById($this->uri->segment(3));
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 

        $this->data['view'] = 'associados/editarAssociado';
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
        $this->data['desempenho'] = $this->associados_model->DesempenhogetById($this->uri->segment(3));
        $this->data['result'] = $this->associados_model->getById($this->uri->segment(3));
        $this->data['view'] = 'associados/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
    public function autoCompleteAssociados(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->associados_model->autoCompleteAssociados($q);
        }

    }
     function adicionarDesempenho() {
         if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aOs')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar O.S.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        
        if ($this->form_validation->run('desempenho') == false) {
           $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataInicial = $this->input->post('dataInicial');
            $dataDeslig = $this->input->post('dataDeslig');

            try {
                
                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];

                if($dataDeslig){
                    $dataDeslig = explode('/', $dataDeslig);
                    $dataDeslig = $dataDeslig[2].'-'.$dataDeslig[1].'-'.$dataDeslig[0];
                }else{
                    $dataDeslig = date('Y/m/d');
                }

            } catch (Exception $e) {
               $dataInicial = date('Y/m/d'); 
               $dataDeslig = date('Y/m/d');
            }
            
            $data = array(
                'associados_id' => $this->input->post('idAssociados'),
                'dataInicial' => $dataInicial,
                'responsavel_id' =>$this->input->post('responsavel_id'),//set_value('idCliente'),
                'dataDeslig' => $dataDeslig,
                'dpTrainee' => set_value('dpTrainee'),
                'dpSelecao' => set_value('dpSelecao'),
                'status' => set_value('status'),
                'observacoes' => set_value('observacoes'),
                'notaDesligamento' => set_value('notaDesligamento')
            );

            if ( is_numeric($id = $this->associados_model->addDesempenho('desempenho', $data, true)) ) {
                $data2 = array(
                    'desempenho_id'=> $id
                    );
                if(is_numeric($id2 = $this->associados_model->edit('associados', $data2,'idAssociados',$this->input->post('idAssociados' ) ))){
                $this->session->set_flashdata('success','OS adicionada com sucesso, você pode adicionar produtos ou serviços a essa OS nas abas de "Produtos" e "Serviços"!');
                redirect('associados/associados');
               }
            } else {
                
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }
    $this->data['result'] = $this->associados_model->getById($this->uri->segment(3));
    $this->data['view'] = 'associados/adicionarDesempenho';
    $this->load->view('tema/topo', $this->data);
     }
     
   function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dServico')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir serviços.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir serviço.');            
            redirect(base_url().'index.php/associados/gerenciar/');
        }
        $this->associados_model->delete('desempenho','associados_id',$id);
        $this->associados_model->delete('associados','idAssociados',$id);             
      

        $this->session->set_flashdata('success','Serviço excluido com sucesso!');            
        redirect(base_url().'index.php/associados/gerenciar/');
    }
    function excluirDesempenho(){

         if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dServico')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir serviços.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir serviço.');            
            redirect(base_url().'index.php/associados/gerenciar/');
        }
        $this->associados_model->delete('desempenho','idDesempenho',$id);
                    
        
        $this->session->set_flashdata('success','Serviço excluido com sucesso!');            
       redirect(base_url().'index.php/associados/gerenciar/');
    }

    
}

