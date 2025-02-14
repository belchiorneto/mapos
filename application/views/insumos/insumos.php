<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aInsumo')) { ?>
    <a href="<?php echo base_url(); ?>index.php/insumos/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Insumo</a>

<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-shopping-bag"></i>
        </span>
        <h5>Insumos</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
            <tr style="backgroud-color: #2D335B">
                <th>Cod. Insumo</th>
                <th>Nome</th>
                <th>Valor Compra</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if (!$results) {
                echo '<tr>
                                <td colspan="5">Nenhum Insumo Cadastrado</td>
                                </tr>';
            }
            foreach ($results as $r) {
                echo '<tr>';
                echo '<td>' . $r->idInsumos . '</td>';
                echo '<td>' . $r->descricao . '</td>';
                echo '<td>' . number_format($r->precoCompra, 2, ',', '.') . '</td>';
                echo '<td>';
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vInsumo')) {
                    echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/insumos/visualizar/' . $r->idInsumos . '" class="btn tip-top" title="Visualizar Insumo"><i class="fas fa-eye"></i></a>  ';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eInsumo')) {
                    echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/insumos/editar/' . $r->idInsumos . '" class="btn btn-info tip-top" title="Editar Insumo"><i class="fas fa-edit"></i></a>';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dInsumo')) {
                    echo '<a style="margin-right: 1%" href="#modal-excluir" role="button" data-toggle="modal" insumo="' . $r->idInsumos . '" class="btn btn-danger tip-top" title="Excluir Insumo"><i class="fas fa-trash-alt"></i></a>';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eInsumo')) {
                    echo '<a href="#atualizar-estoque" role="button" data-toggle="modal" insumo="' . $r->idInsumos . '" estoque="' . $r->estoque . '" class="btn btn-primary tip-top" title="Atualizar Estoque"><i class="fas fa-plus-square"></i></a>';
                }
                echo '</td>';
                echo '</tr>';
            } ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/insumos/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel"><i class="fas fa-trash-alt"></i> Excluir Insumo</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idInsumo" class="idInsumo" name="id" value=""/>
            <h5 style="text-align: center">Deseja realmente excluir este insumo?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>

<!-- Modal Estoque -->
<div id="atualizar-estoque" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/insumos/atualizar_estoque" method="post" id="formEstoque">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel"><i class="fas fa-plus-square"></i> Atualizar Estoque</h5>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label for="estoqueAtual" class="control-label">Estoque Atual</label>
                <div class="controls">
                    <input id="estoqueAtual" type="text" name="estoqueAtual" value="" readonly />
                </div>
            </div>

            <div class="control-group">
                <label for="estoque" class="control-label">Adicionar Insumos<span class="required">*</span></label>
                <div class="controls">
                    <input type="hidden" id="idInsumo" class="idInsumo" name="id" value=""/>
                    <input id="estoque" type="text" name="estoque" value=""/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>

<!-- Modal Etiquetas -->
<div id="modal-etiquetas" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/relatorios/insumosEtiquetas" method="get">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Gerar etiquetas com Código de Barras</h5>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Escolha o intervalo de insumos para gerar as etiquetas.</div>

            <div class="span12" style="margin-left: 0;">
                <div class="span6" style="margin-left: 0;">
                    <label for="valor">De</label>
                    <input class="span9" style="margin-left: 0" type="text" id="de_id" name="de_id" placeholder="ID do primeiro insumo" value=""/>
                </div>


                <div class="span6">
                    <label for="valor">Até</label>
                    <input class="span9" type="text" id="ate_id" name="ate_id" placeholder="ID do último insumo" value=""/>
                </div>

                <div class="span4">
                    <label for="valor">Qtd. do Estoque</label>
                    <input class="span12" type="checkbox" name="qtdEtiqueta" value="true"/>
                </div>

                <div class="span6">
                    <label class="span12" for="valor">Formato Etiqueta</label>
                    <select name="etiquetaCode">
                        <option value="EAN13">EAN-13</option>
                        <option value="UPCA">UPCA</option>
                        <option value="C93">CODE 93</option>
                        <option value="C128A">CODE 128</option>
                        <option value="CODABAR">CODABAR</option>
                        <option value="QR">QR-CODE</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-success">Gerar</button>
        </div>
    </form>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<!-- Modal Etiquetas e Estoque-->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'a', function (event) {
            var insumo = $(this).attr('insumo');
            var estoque = $(this).attr('estoque');
            $('.idInsumo').val(insumo);
            $('#estoqueAtual').val(estoque);
        });

        $('#formEstoque').validate({
            rules: {
                estoque: {
                    required: true,
                    number: true
                }
            },
            messages: {
                estoque: {
                    required: 'Campo Requerido.',
                    number: 'Informe um número válido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>
