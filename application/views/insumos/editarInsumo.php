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
            <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Fornecedores</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="widget-content nopadding tab-content">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formInsumo" method="post" class="form-horizontal">
                <?php echo form_hidden('idInsumos', $result->idInsumos) ?>
                    <div class="control-group">
                    <label for="descricao" class="control-label">Descrição<span class="required">*</span></label>
                        <div class="controls">
                        <input id="descricao" type="text" name="descricao" value="<?php echo $result->descricao; ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                    <label for="unidade" class="control-label">Unidade<span class="required">*</span></label>
                        <div class="controls">
                        <select id="unidade" name="unidade"></select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Atualizar</button>
                            <a href="<?php echo base_url() ?>index.php/insumos" id="" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>	
            <!--Fornecedores-->
            <div class="tab-pane" id="tab2">
                <div class="span12 well" style="padding: 1%; margin-left: 0">
                    <form id="formFornecedores" action="<?php echo base_url() ?>index.php/insumos/adicionarFornecedor" method="post">
                        <div class="span6">
                            <input type="hidden" name="idFornecedor" id="idFornecedor" />
							<?php echo form_hidden('idInsumo', $result->idInsumos) ?>
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
        $('#formInsumo').validate({
            rules: {
                descricao: {
                    required: true
                },
                unidade: {
                    required: true
                },
             
            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                unidade: {
                    required: 'Campo Requerido.'
                },
            
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
		source: "<?php echo base_url(); ?>index.php/insumos/autoCompleteFornecedor",
		minLength: 2,
		select: function(event, ui) {
			console.log(ui.item);
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
					url: "<?php echo base_url(); ?>index.php/insumos/adicionarFornecedor",
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
