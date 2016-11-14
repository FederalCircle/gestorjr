<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/projetos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Projeto</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Projetos</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cliente</th>
                        <th>Data do Contrato</th>
                        <th>Horas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Projeto Cadastrado</td>
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
        <h5>Projetos</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Cliente</th>
        <th>Data do Contrato</th>
        <th>Horas</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idProjetos.'</td>';
            echo '<td>'.$r->nome.'</td>';
            echo '<td>'.$r->cliente.'</td>';
             echo '<td>'.date('d/m/Y',  strtotime($r->dataContrato)).'</td>';
            echo '<td>'.$r->horas.'</td>';
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                echo '<a href="'.base_url().'index.php/projetos/visualizar/'.$r->idProjetos.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'index.php/projetos/editar/'.$r->idProjetos.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Projeto"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" projeto="'.$r->idProjetos.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Projeto"><i class="icon-remove icon-white"></i></a>'; 
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
  <form action="<?php echo base_url() ?>index.php/projetos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Projetos</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idProjeto" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este cliente e os dados projetos a ele (OS, Vendas, Receitas)?</h5>
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
        
        var projeto = $(this).attr('projeto');
        $('#idProjeto').val(projeto);

    });

});

</script>
