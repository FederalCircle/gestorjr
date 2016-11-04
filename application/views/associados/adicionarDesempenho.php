<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Cadastro de OS</h5>
            </div>
            <div class="widget-content nopadding">

                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formAssociados" class="form-horizontal">
                                    <?php echo form_hidden('idAssociados',$result->idAssociados) ?>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        
                                        <div class="span6">
                                            <label for="Responsavel">Responsável<span></span></label>
                                            <input id="Responsavel" class="span12" type="text" name="Responsavel" value=""  />
                                            <input id="responsavel_id" class="span12" type="hidden" name="responsavel_id" value=""  />
                                        </div>
                                    </div>
                                     <div class="span6" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option value="Selecao">Seleção</option>
                                                <option value="Trainee">Trainee</option>
                                                <option value="Associado">Associado</option>
                                                <option value="Desligado">Desligado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        
                                        <div class="span3">
                                            <label for="dataInicial">Data Inicial<span class="required">*</span></label>
                                            <input id="dataInicial" class="span12 datepicker" type="text" name="dataInicial" value=""  />
                                        </div>
                                        <div class="span3">
                                            <label for="dataDeslig">Data Desligamento</label>
                                            <input id="dataDeslig" class="span12 datepicker" type="text" name="dataDeslig" value=""  />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="dpSelecao">Desempenho Seleção</label>
                                            <textarea class="span12" name="dpSelecao" id="dpSelecao" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="dpTrainee">Desempenho Trainee</label>
                                            <textarea class="span12" name="dpTrainee" id="dpTrainee" cols="30" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="observacoes">Observações</label>
                                            <textarea class="span12" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="notaDesligamento">Notas de Delisgamento</label>
                                            <textarea class="span12" name="notaDesligamento" id="notaDesligamento" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                          <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/associados" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                                        </div>
                                    </div>
                                    </div>
                            </form>
                            </div>

                        </div>

                    </div>

                </div>

                
.
             
        </div>
        
    </div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function(){

      $("#Responsavel").autocomplete({
            source: "<?php echo base_url(); ?>index.php/associados/autoCompleteAssociados",
            minLength: 1,
            select: function( event, ui ) {

                 $("#responsavel_id").val(ui.item.id);
                

            }
      });      
      
      $("#formDesempenho").validate({
          rules:{
             status: {required:true},
             Responsavel: {required:true},
             dataInicial: {required:true},
             dpTrainee: {required:true},
             dpSelecao: {required:true}
          },
          messages:{
             status: {required: 'Campo Requerido.'},
             Responsavel: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'},
             dpSelecao: {required: 'Campo Requerido.'},
             dpTrainee: {required: 'Campo Requerido.'}
          },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
       });

    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
   
});

</script>

