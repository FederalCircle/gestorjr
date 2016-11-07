<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Informações do Associado</a></li>
            <li><a data-toggle="tab" href="#tab2">Dados do Responsável</a></li>
            <li><a data-toggle="tab" href="#tab3">Avaliações de Desempenho</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/associados/editarDesempenho/'.$desempenho->idDesempenho.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
            </div>
        </ul>
    </div>
    <div class="widget-content tab-content">

        <!--Tab 2-->
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
              <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGFour" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações Associado</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGFour">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>

                                                <tr>
                                                    <td style="text-align: right"><strong>Identificação (id)</strong></td>
                                                    <td><?php echo $associado->idAssociados ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                                    <td><?php echo $associado->nome ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Status</strong></td>
                                                    <td><?php echo $desempenho->status ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>


        </div>

        <div id="tab2" class="tab-pane" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações Responsável</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>

                                                <tr>
                                                    <td style="text-align: right"><strong>Identificação (id)</strong></td>
                                                    <td><?php echo $desempenho->idAssociados ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                                    <td><?php echo $desempenho->nome ?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Contatos</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGTwo">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Telefone</strong></td>
                                                    <td><?php echo $desempenho->telefone ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Celular</strong></td>
                                                    <td><?php echo $desempenho->celular ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Email</strong></td>
                                                    <td><?php echo $desempenho->email ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>



          
        </div>


    
        <!--Tab 2-->
        <div id="tab2" class="tab-pane" style="min-height: 300px">
              <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGFour" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações Associado</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGFour">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>

                                                <tr>
                                                    <td style="text-align: right"><strong>Identificação (id)</strong></td>
                                                    <td><?php echo $associado->idAssociados ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                                    <td><?php echo $associado->nome ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Status</strong></td>
                                                    <td><?php echo $desempenho->status ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>


        </div>
            <!--Tab 3-->
        <div id="tab3" class="tab-pane" style="min-height: 300px">
            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGFive" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Avaliação do processo de Seleção</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGFive">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><?php if($desempenho->dpSelecao > ''){ echo $desempenho->dpSelecao;} else{echo 'Seleção não avaliada';} ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGSix" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Avaliação do processo Trainee</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGSix">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><?php if($desempenho->dpTrainee > ''){ echo $desempenho->dpTrainee;} else{echo 'Avaliação Processo Trainee não informada';} ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGSeven" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Notas sobre o Desligamento</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGSeven">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><?php if($desempenho->status!='Desligado'){
                                                    echo 'Associado não foi desligado';}
                                                    else{
                                                    if($desempenho->notaDesligamento){ echo $desempenho->notaDesligamento;} else{echo 'Sem nota de Desligamento';} 
                                                    }?></td>
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