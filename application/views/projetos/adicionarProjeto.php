<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Cadastro de Projeto</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">'.$custom_error.'</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formProjeto" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="cliente" class="control-label">Cliente<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cliente" type="text" name="cliente" value="<?php echo set_value('cliente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="area" class="control-label">Área<span class="required">*</span></label>
                        <div class="controls">
                        <select name="area" id="area">
                                <option value=""></option>
                                <option value="Eng. Civil">Eng. Civil</option>
                                <option value="Eng. de Automação Industrial">Eng. de Automação Industrial</option>
                                <option value="Eng. da Computação">Eng. de Computação</option>
                                <option value="Eng. de Telecomunicações">Eng. de Telecomunicações</option>
                                <option value="Eng. Eletrônica">Eng. Eletrônica</option>
                                <option value="Eng. Eletrotécnica">Eng. EletroTécnica</option>
                                <option value="Eng. Mecânica">Eng. Mecânica</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="preco" class="control-label">Preço<span class="required">*</span></label>
                        <div class="controls">
                            <input id="preco" type="text" name="preco" value="<?php echo set_value('preco'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="dataContrato" class="control-label">Data do Contrato</label>
                        <div class="controls">
                            <input id="dataContrato" type="text" name="dataContrato" value="<?php echo set_value('dataContrato'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="horas" class="control-label">Horas do Projeto</label>
                        <div class="controls">
                            <input id="horas" type="text" name="horas" value="<?php echo set_value('horas'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="dataEntrega" class="control-label">Data de Entrega</label>
                        <div class="controls">
                            <input id="dataEntrega" type="text" name="dataEntrega" value="<?php echo set_value('dataEntrega'); ?>"  />
                        </div>
                    </div>
                    
                    <!--Tentar puxar infos de outros bancos de dados-->
                    <!--
                    <div class="control-group">
                        <label  class="control-label">Área<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permissoes_id" id="permissoes_id">
                                  <?php foreach ($permissoes as $p) {
                                      echo '<option value="'.$p->idPermissao.'">'.$p->nome.'</option>';
                                  } ?>
                            </select>
                        </div>
                    </div>
                    -->
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/projetos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>


<script  src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
        $(".money").maskMoney();

           $('#formProjeto').validate({
            rules : {
                  nome:{ required: true},
                  cliente:{ required: true},
                  area:{ required: true},
                  preco:{ required: true},
                  dataContrato:{ required: true},
                  horas:{ required: true},
                  dataEntrega:{ required: true},
            },
            messages: {
                  nome :{ required: 'Campo Requerido.'},
                  cliente:{ required: 'Campo Requerido.'},
                  area:{ required: 'Campo Requerido.'},
                  preco:{ required: 'Campo Requerido.'},
                  dataContrato:{ required: 'Campo Requerido.'},
                  horas:{ required: 'Campo Requerido.'},
                  dataEntrega:{ required: 'Campo Requerido.'},

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

      });
</script>




