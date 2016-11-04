<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Associado</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">

                <form action="<?php echo current_url(); ?>" id="formAssociados" method="post" class="form-horizontal" >
                    <?php echo form_hidden('idAssociados',$result->idAssociados) ?>
                    <div class="control-group">
                        
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo $result->nome; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="curso" class="control-label">Curso<span class="required">*</span></label>
                        <div class="controls">
                             <select name="curso" id="curso">
                                 <option value="<?php echo $result->curso; ?>"><?php echo $result->curso; ?></option>
                                <option value="Eng. civil">Eng. civil</option>
                                <option value="Eng. de Automação Industrial">Eng. de Automação Industrial</option>
                                <option value="Eng. de Computação">Eng. de Computação</option>
                                <option value="Eng. de Telecomunicações">Eng. de Telecomunicações</option>
                                <option value="Eng. Eletrônica">Eng. Eletrônica</option>
                                <option value="Eng. EletroTécnica">Eng. EletroTécnica</option>
                                <option value="Eng. Mecânica">Eng. Mecânica</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo $result->cpf; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Numero<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="senha" class="control-label">Senha</label>
                        <div class="controls">
                            <input id="senha" type="password" name="senha" value=""  placeholder="Não preencha se não quiser alterar."  />
                            <i class="icon-exclamation-sign tip-top" title="Se não quiser alterar a senha, não preencha esse campo."></i>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone</label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Celular</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="dataAss" class="control-label">dataAss<span class="required">*</span></label>
                        <div class="controls">
                            <input id="dataAss" type="text" name="dataAss" value="<?php echo $result->dataAss; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label  class="control-label">Situação*</label>
                        <div class="controls">
                            <select name="situacao" id="situacao">
                                <?php if($result->situacao == 1){$ativo = 'selected'; $inativo = '';} else{$ativo = ''; $inativo = 'selected';} ?>
                                <option value="1" <?php echo $ativo; ?>>Ativo</option>
                                <option value="0" <?php echo $inativo; ?>>Inativo</option>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label  class="control-label">Permissões<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permissoes_id" id="permissoes_id">
                                  <?php foreach ($permissoes as $p) {
                                     if($p->idPermissao == $result->permissoes_id){ $selected = 'selected';}else{$selected = '';}
                                      echo '<option value="'.$p->idPermissao.'"'.$selected.'>'.$p->nome.'</option>';
                                  } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>index.php/associados" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>


             <div class="tab-pane" id="tab2">

                <div class="span12 well" style="padding: 1%; margin-left: 0">
               <!-- <form id="formProdutos" <?php if($result->desempenho_id== NULL){?>action="<?php echo base_url() ?>index.php/associados/adicionarDesempenho"<?php. }else {?> action="<?php echo base_url() ?>index.php/associados"<?php }?> method="post">
                 -->                   <div class="span8">
                                        <input type="hidden" name="idProduto" id="idProduto" />
                                        <input type="hidden" name="idOsProduto" id="idOsProduto" value="<?php //echo $result->idOs?>" />
                                        <input type="hidden" name="estoque" id="estoque" value=""/>
                                        <input type="hidden" name="preco" id="preco" value=""/>
                                        <label for="">Produto</label>
                                        <input type="text" class="span12" name="produto" id="produto" placeholder="Digite o nome do produto" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Quantidade</label>
                                        <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="span12" />
                                    </div>
                                    <div class="span2">
                                        <label for="">.</label>
        <?php if($result->desempenho_id== NULL){ echo '<a href="'.base_url().'index.php/associados/adicionarDesempenho/'.$result->idAssociados.'" class="btn btn-success"  associado="'.$result->idAssociados.'"><i class="icon-plus icon-white">Adicionar</i></a>'; }else{  echo '<a href="#" class="btn btn-success"><i class="icon-plus icon-white">Adicionar</i></a>'; }?>  
                                    </div>
                                </form>
                            </div>
                            <div class="span12" id="divProdutos" style="margin-left: 0">
                                <table class="table table-bordered" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Ações</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($desempenho as $p) {
                                            
                                            $total = $total + $p->subTotal;
                                            echo '<tr>';
                                            //echo '<td>'.$p->descricao.'</td>';
                                            echo '<td>'.$p->dpSelecao.'</td>';
                                           // echo '<td><a href="" idAcao="'.$p->idProdutos_os.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Excluir Produto" class="btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
                                            //echo '<td>R$ '.number_format($p->subTotal,2,',','.').'</td>';
                                            echo '</tr>';
                                        }?>
                                       
                                        <tr>
                                            <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$ <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
              

                        </div>
                     </div>
                   </div>
                 </div>
               </div>
            </div>
        </div>
    </div>


<script  src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
<<<<<<< HEAD

    $(document).on('click', 'a', function(event) {
        
        var associado = $(this).attr('associado');
        $('#idAssociado').val(associado);

    });

       $(".money").maskMoney();
=======
>>>>>>> parent of 9f81a84... atualizacoes modulo Associados

           $('#formAssociado').validate({
            rules : {
                  nome:{ required: true},
                  curso:{ required: true},
                  cpf:{ required: true},
                  telefone:{ required: true},
                  email:{ required: true},
                  rua:{ required: true},
                  numero:{ required: true},
                  bairro:{ required: true},
                  cidade:{ required: true},
                  estado:{ required: true},
                  dataAss:{ required: true}
            },
            messages: {
                  nome :{ required: 'Campo Requerido.'},
                  rg:{ required: 'Campo Requerido.'},
                  curso:{ required: 'Campo Requerido.'},
                  telefone:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  rua:{ required: 'Campo Requerido.'},
                  numero:{ required: 'Campo Requerido.'},
                  bairro:{ required: 'Campo Requerido.'},
                  cidade:{ required: 'Campo Requerido.'},
                  estado:{ required: 'Campo Requerido.'},
                  dataAss:{ required: 'Campo Requerido.'}

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


