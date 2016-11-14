
<div class="row-fluid" style="margin-top:0">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
						<i class="icon-wrench"></i>
				</span>
				<h5>Editar Projeto</h5>
			</div>

			<div class="widget-content nopadding ">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Dados do Projeto</a></li>
					<li><a data-toggle="tab" href="#tab2">Equipe do Projeto</a></li>
					<li><a data-toggle="tab" href="#tab3">Documentos</a></li>
				</ul>
				<div class="tab-content nopadding well">
					<div id="tab1" class="tab-pane active">
						<?php if ($custom_error != '') {
							echo '<div class="alert alert-danger">' . $custom_error . '</div>';
						} ?>
						<form action="<?php echo current_url(); ?>" id="formProjetos" method="post" class="form-horizontal" >
							<div class="control-group">
								<?php echo form_hidden('idProjetos',$result->idProjetos) ?>
								<label for="nome" class="control-label">Nome<span class="required">*</span></label>
								<div class="controls">
									<input id="nome" type="text" name="nome" value="<?php echo $result->nome; ?>"  />
								</div>
							</div>
							<div class="control-group">
								<label for="cliente" class="control-label">Cliente<span class="required">*</span></label>
								<div class="controls">
									<input id="cliente" type="text" name="cliente" value="<?php echo $result->cliente; ?>"  />
								</div>
							</div>
							<div class="control-group">
								<label for="area" class="control-label">Área<span class="required">*</span></label>
								<div class="controls">
									 <select name="area" id="area">
										<option <?php if($result->area == 'Eng. Civil'){echo 'selected';} ?> value="Eng. Civil">Eng. Civil</option>
										<option <?php if($result->area == 'Eng. de Automação Industrial'){echo 'selected';} ?> value="Eng. de Automação Industrial">Eng. de Automação Industrial</option>
										<option <?php if($result->area == 'Eng. da Computação'){echo 'selected';} ?> value="Eng. da Computação">Eng. de Computação</option>
										<option <?php if($result->area == 'Eng. de Telecomunicações'){echo 'selected';} ?> value="Eng. de Telecomunicações">Eng. de Telecomunicações</option>
										<option <?php if($result->area == 'Eng. Eletrônica'){echo 'selected';} ?> value="Eng. Eletrônica">Eng. Eletrônica</option>
										<option <?php if($result->area == 'Eng. EletroTécnica'){echo 'selected';} ?> value="Eng. EletroTécnica">Eng. EletroTécnica</option>
										<option <?php if($result->area == 'Eng. Mecânica'){echo 'selected';} ?> value="Eng. Mecânica">Eng. Mecânica</option>
										
									</select>
								</div>
							</div>

							<div class="control-group">
								<label for="preco" class="control-label">Preço<span class="required">*</span><span style="position:absolute; padding-left: 0.3%">R$</span></label>
								<div class="controls">
									<input id="preco" type="text" name="preco" class="money" value="<?php echo $result->preco; ?>"  />
								</div>
							</div>

							<div class="control-group">
								<label for="dataContrato" class="control-label">Data do Contrato<span class="required">*</span></label>
								<div class="controls">
									<input id="dataContrato" type="text" name="dataContrato" class="datepicker" value="<?php echo date('d/m/Y', strtotime($result->dataContrato)); ?>"  />
								</div>
							</div>

							<div class="control-group">
								<label for="horas" class="control-label">Horas do Projeto<span class="required">*</span></label>
								<div class="controls">
									<input id="horas" type="text" name="horas" value="<?php echo $result->horas; ?>"  />
								</div>
							</div>

							<div class="control-group">
								<label for="dataEntrega" class="control-label">Data de Entrega<span class="required">*</span></label>
								<div class="controls">
									<input id="dataEntrega" type="text" name="dataEntrega" class="datepicker" value="<?php echo date('d/m/Y', strtotime($result->dataEntrega)); ?>"  />
								</div>
							</div>

							<div class="form-actions">
								<div class="span12">
									<div class="span6 offset3">
										<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Salvar</button>
										<a href="<?php echo base_url() ?>index.php/projetos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
									</div>
								</div>
							</div>


						</form>
					</div>
					<div id="tab2" class="tab-pane">
						<div class="span12" style="padding: 1%; margin-left: 0">
							<div class="span12 well" style="padding: 1%; margin-left: 0">
								<form id="formAssociados" action="<?php echo base_url() ?>index.php/projetos/adicionarAssociado" method="post">
								<div class="span10">
									<input type="hidden" name="idAsssociados" id="idAssociados" />
									<input type="hidden" name="idProjetos" id="idProjetos" value="<?php echo $result->idProjetos?>" />
									<label for="">Associados</label>
									<input type="text" class="span12" name="associado" id="associado" placeholder="Digite o nome do associado" />
								</div>
								<div class="span2">
									<label for="">.</label>
									<button class="btn btn-success span12"><i class="icon-white icon-plus"></i> Adicionar</button>
								</div>
								</form>
							</div>
							<div class="span12" id="divServicos" style="margin-left: 0">
								<table class="table table-bordered ">
								<thead>
									<tr style="backgroud-color: #2D335B">
										<th>#</th>
										<th>Associado</th>
										<th>Curso</th>
										<th>Área</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($equipe as $r) {
										echo '<tr>';
										echo '<td>' . $r->idAssociados . '</td>';
										echo '<td>' . $r->nome . '</td>';
										echo '<td>' . $r->curso . '</td>';
										echo '<td>' . $r->area . '</td>';
										echo '<td>';
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
											echo '<a href="' . base_url() . 'index.php/associados/visualizar/' . $r->idAssociados . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
										}
										echo  '</td>';
										echo '</tr>';
									} ?>
									<tr>

									</tr>
								</tbody>
							</table>
							</div>
						</div>

					<!--
						<?php if (!$equipe) { ?>          
							<table class="table table-bordered ">
								<thead>
									<tr style="backgroud-color: #2D335B">
										<th>#</th>
										<th>Associado</th>
										<th>Curso</th>
										<th>Área</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="6">Nenhum associado está vinculado ao projeto</td>
									</tr>
								</tbody>
							</table>           
						<?php } else { ?>
							<table class="table table-bordered ">
								<thead>
									<tr style="backgroud-color: #2D335B">
										<th>#</th>
										<th>Associado</th>
										<th>Curso</th>
										<th>Área</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($equipe as $r) {
										echo '<tr>';
										echo '<td>' . $r->idAssociados . '</td>';
										echo '<td>' . $r->nome . '</td>';
										echo '<td>' . $r->curso . '</td>';
										echo '<td>' . $r->area . '</td>';
										echo '<td>';
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
											echo '<a href="' . base_url() . 'index.php/associados/visualizar/' . $r->idAssociados . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
										}
										echo  '</td>';
										echo '</tr>';
									} ?>
									<tr>

									</tr>
								</tbody>
							</table>
						<?php  } ?>
						-->
					</div>
					<div id="tab3" class="tab-pane" style="min-height: 300px">
						TODO
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script  src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
	  $(document).ready(function(){

	  		$("#associado").autocomplete({
	            source: "<?php echo base_url(); ?>index.php/projetos/autoCompleteAssociado",
	            minLength: 1,
	            select: function( event, ui ) {

	                 $("#associado_id").val(ui.item.id);
	                

	            	}
      		});

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


