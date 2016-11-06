<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/associados/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Associado</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Associados</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Curso</th>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Associado Cadastrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Associados</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Setor</th>
        <th>Curso</th>
        <th>Telefone</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $a=0;
            echo '<tr>';
            echo '<td>'.$r->idAssociados.'</td>';
            echo '<td>'.$r->nome.'</td>';
            echo '<td>'.$r->permissao.'</td>';
             echo '<td>'.$r->curso.'</td>';
            echo '<td>'.$r->telefone.'</td>';
            echo '<td>'; foreach ($desempenho as $d) {
                # code...
             if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                if($d->associados_id == $r->idAssociados){$a ++;}
                
             }

        }
                if($a<1){echo '<a href="'.base_url().'index.php/associados/adicionarDesempenho/'.$r->idAssociados.'" style="margin-right: 1%" class="btn btn-danger  tip-top" title="Clique para cadastrar desempenho"><i class="icon-warning-sign"></i></a>'; 
    } '</td>';
            echo '<td>';
             if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                echo '<a href="'.base_url().'index.php/associados/visualizar/'.$r->idAssociados.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'index.php/associados/editar/'.$r->idAssociados.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Associado"><i class="icon-pencil icon-white"></i></a>'; 
            }

            if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" associado="'.$r->idAssociados.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Associado"><i class="icon-remove icon-white"></i></a>'; 
            }
             
              
            echo '</td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
<?php echo $this->pagination->create_links();}?>



 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/associados/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Associados</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idAssociado" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este cliente e os dados associados a ele (OS, Vendas, Receitas)?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var associado = $(this).attr('associado');
        $('#idAssociado').val(associado);

    });

});

</script>
