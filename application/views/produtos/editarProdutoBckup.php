<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>

<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox+.badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus+.badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */

        /* Adding a light border */
        box-shadow: inset 0px 0px 5px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked+.badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }
</style>

<div class="widget-content nopadding tab-content">
    <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
        <ul class="nav nav-tabs">
            <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes</a></li>
            <li id="tabFornecedores"><a href="#tab2" data-toggle="tab">Fornecedor</a></li>
           
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="widget-content nopadding tab-content">                
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal">
                    <div class="control-group">
                        <?php echo form_hidden('idProdutos', $result->idProdutos) ?>
                        <label for="codDeBarra" class="control-label">Código de Barra<span class=""></span></label>
                        <div class="controls">
                            <input id="codDeBarra" type="text" name="codDeBarra" value="<?php echo $result->codDeBarra; ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label">Descrição<span class="required">*</span></label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" value="<?php echo $result->descricao; ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tipo de Movimento</label>
                        <div class="controls">
                            <label for="entrada" class="btn btn-default" style="margin-top: 5px;">Entrada
                                <input type="checkbox" id="entrada" name="entrada" class="badgebox" value="1" <?= ($result->entrada == 1) ? 'checked' : '' ?>>
                                <span class="badge">&check;</span>
                            </label>
                            <label for="saida" class="btn btn-default" style="margin-top: 5px;">Saída
                                <input type="checkbox" id="saida" name="saida" class="badgebox" value="1" <?= ($result->saida == 1) ? 'checked' : '' ?>>
                                <span class="badge">&check;</span>
                            </label>
                        </div>
                    </div>

                    

                    <div class="control-group">
                        <label for="precoVenda" class="control-label">Preço de Venda<span class="required">*</span></label>
                        <div class="controls">
                            <input id="precoVenda" class="money" data-affixes-stay="true" data-thousands="" data-decimal="." type="text" name="precoVenda" value="<?php echo $result->precoVenda; ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="unidade" class="control-label">Unidade<span class="required">*</span></label>
                        <div class="controls">
                            <select id="unidade" name="unidade"></select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="estoque" class="control-label">Estoque<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estoque" type="text" name="estoque" value="<?php echo $result->estoque; ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="estoqueMinimo" class="control-label">Estoque Mínimo</label>
                        <div class="controls">
                            <input id="estoqueMinimo" type="text" name="estoqueMinimo" value="<?php echo $result->estoqueMinimo; ?>" />
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                <a href="<?php echo base_url() ?>index.php/produtos" id="" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--Fornecedores-->
            <div class="tab-pane inactive" id="tab2">
                <div class="span12 well" style="padding: 1%; margin-left: 0">
                    <form id="formFornecedores" action="<?php echo base_url() ?>index.php/insumos/adicionarFornecedor" method="post">
                        <div class="span6">
                            <input type="hidden" name="idFornecedor" id="idFornecedor" />
                            <?php echo form_hidden('idProduto', $result->idProdutos) ?>
                            <label for="">Fornecedor</label>
                            <input type="text" class="span12" name="fornecedor" id="fornecedor" placeholder="Digite o nome do fornecedor" />
                        </div>
                        <div class="span2">
                            <label for="">Preço</label>
                            <input type="text" placeholder="Preço" id="preco" name="preco" class="span12 money" data-affixes-stay="true" data-thousands="" data-decimal="." />
                        </div>
                        <div class="span2">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-success span12" id="btnAdicionarFornecedor"><i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="widget-box" id="divFornecedores">
                    <div class="widget_content nopadding">
                        <table width="100%" class="table table-bordered" id="tblFornecedores">
                            <thead>
                                <tr>
                                    <th>Fornecedor</th>
                                    <th width="12%">Telefone</th>
                                    <th width="10%">Preço</th>
                                    <th width="6%">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                            <?php
                            $count = 0;
                            $total = 0;
                            foreach ($fornecedores as $f) {
                                $count++;
                                $total = $total + $f->valorCompra;
                                echo '<tr>';
                                echo '<td>' . $f->nomeFornecedor . '</td>';
                                echo '<td>' . $f->celular . '</td>';
                                echo '<td><div align="center">R$: ' . number_format($f->valorCompra, 2, ',', '.')  . '</td>';
                                echo '<td><div align="center"><a href="" idAcao="' . $f->idFornecedor . '" idInsumo="' . $f->idInsumo . '" title="Excluir Fornecedor" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>';
                                echo '</tr>';
                            } ?>
                                <tr>
                                    <td colspan="3" style="text-align: right"><strong>Média:</strong></td>
                                    <td>
                                        <div align="center">
                                            <strong>
                                                R$<?php 
                                                if($count == 0){
                                                    $media = 0;
                                                }else{
                                                    $media = $total / $count;
                                                }
                                                echo number_format($media, 2, ',', '.'); ?>
                                            </strong>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>

<!-- Modal cadastro anotações -->
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="#" method="POST" id="formAnotacao">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Adicionar Anotação</h3>
        </div>
        <div class="modal-body">
            <div class="span12" id="divFormAnotacoes" style="margin-left: 0"></div>
            <div class="span12" style="margin-left: 0">
                <label for="anotacao">Anotação</label>
                <textarea class="span12" name="anotacao" id="anotacao" cols="30" rows="3"></textarea>
                <input type="hidden" name="os_id" value="<?php echo $result->idOs; ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-close-anotacao">Fechar</button>
            <button class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</div>

<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <div class="modal_header_anexos">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar OS</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input class="span12" id="descricao" type="text" name="descricao" value="Fatura de OS Nº: <?php echo $result->idOs; ?> " />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span5" style="margin-left: 0">
                    <label for="valor">Valor*</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />
                    <input class="span12 money" id="valor" type="text" data-affixes-stay="true" data-thousands="" data-decimal="." name="valor" value="<?php echo number_format($totals + $total, 2); ?>" />
                    <strong><span style="color: red" id="resultado"></span></strong>
                </div>
                <div class="span4">
                    <label>Desconto</label>
                    <input style="width: 4em;" id="num2" type="text" placeholder="%" onblur="calcular()" maxlength="3" size="2" />
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="vencimento">Data Entrada*</label>
                    <input class="span12 datepicker" autocomplete="on" id="vencimento" type="text" name="vencimento" />
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp <input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">
                    <div class="span6">
                        <label for="recebimento">Data Recebimento</label>
                        <input class="span12 datepicker" autocomplete="on" id="recebimento" type="text" name="recebimento" />
                    </div>
                    <div class="span6">
                        <label for="formaPgto">Forma Pgto</label>
                        <select name="formaPgto" id="formaPgto" class="span12">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Débito">Débito</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Pix">Pix</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
            <button class="btn btn-primary">Faturar</button>
        </div>
    </form>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    function calcLucro(precoCompra, margemLucro) {
    var precoVenda = (precoCompra * margemLucro / 100 + precoCompra).toFixed(2);
    return precoVenda;

}
    $("#precoCompra").focusout(function () {
        if ($("#precoCompra").val() == '0.00' && $('#precoVenda').val() != '') {
            $('#errorAlert').text('Você não pode preencher valor de compra e depois apagar.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            $("#precoCompra").focus();
        } else {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        }
    });

   $("#margemLucro").keyup(function () {
        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($("#precoCompra").val() == null || $("#precoCompra").val() == '') {
            $('#errorAlert').text('Preencher valor da compra primeiro.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
            $("#precoCompra").focus();

        } else if (Number($("#margemLucro").val()) >= 0) {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        } else {
            $('#errorAlert').text('Não é permitido número negativo.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
        }
    });

    $('#precoVenda').focusout(function () {
        if (Number($('#precoVenda').val()) < Number($("#precoCompra").val())) {
            $('#errorAlert').text('Preço de venda não pode ser menor que o preço de compra.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            if($("#margemLucro").val() != "" || $("#margemLucro").val() != null){
                $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
            }
        }
    });

    $(document).ready(function() {
        $(".money").maskMoney();
        $.getJSON('<?php echo base_url() ?>assets/json/tabela_medidas.json', function(data) {
            for (i in data.medidas) {
                $('#unidade').append(new Option(data.medidas[i].descricao, data.medidas[i].sigla));
                $("#unidade option[value=" + '<?php echo $result->unidade; ?>' + "]").prop("selected", true);
            }
        });
        $('#formProduto').validate({
            rules: {
                descricao: {
                    required: true
                },
                unidade: {
                    required: true
                },
                precoCompra: {
                    required: true
                },
                precoVenda: {
                    required: true
                },
                estoque: {
                    required: true
                }
            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                unidade: {
                    required: 'Campo Requerido.'
                },
                precoCompra: {
                    required: 'Campo Requerido.'
                },
                precoVenda: {
                    required: 'Campo Requerido.'
                },
                estoque: {
                    required: 'Campo Requerido.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
	
	$("#fornecedor").autocomplete({
		source: "<?php echo base_url(); ?>index.php/produtos/autoCompleteFornecedor",
		minLength: 2,
		select: function(event, ui) {
			$("#idFornecedor").val(ui.item.id);
			$("#preco").val(ui.item.preco);
		}
	});
	
	$("#formFornecedores").validate({
            rules: {
                quantidade: {
                    required: true
                }
            },
            messages: {
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function(form) {
                var quantidade = parseInt($("#quantidade").val());
				var dados = $(form).serialize();
				$("#divFornecedores").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>index.php/produtos/adicionarFornecedor",
					data: dados,
					dataType: 'json',
					success: function(data) {
						if (data.result == true) {
							$("#divFornecedores").load("<?php echo current_url(); ?> #divFornecedores");
							$("#quantidade").val('');
							$("#preco").val('');
							$("#fornecedor").val('').focus();
						} else {
							Swal.fire({
								type: "error",
								title: "Atenção",
								text: "Ocorreu um erro ao tentar adicionar preço deste fornecedor."
							});
						}
					}
				});
				return false;
            }
        });
</script>
