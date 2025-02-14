<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aFornecedor')) { ?>
    <a href="<?php echo base_url(); ?>index.php/fornecedores/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Fornecedor</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-user"></i>
        </span>
        <h5>Fornecedores</h5>
    </div>

    <div class="widget-content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
            <tr>
                <th>Cod.</th>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Celular/Zap</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if (!$results) {
                echo '<tr>
                                <td colspan="5">Nenhum Fornecedor Cadastrado</td>
                                </tr>';
            }
            foreach ($results as $r) {
                echo '<tr>';
                echo '<td>' . $r->idFornecedores . '</td>';
                echo '<td><a href="' . base_url() . 'index.php/fornecedores/visualizar/' . $r->idFornecedores . '" style="margin-right: 1%">' .$r->nomeFornecedor. '</a></td>';
                echo '<td>' . $r->documento . '</td>';
                echo '<td>' . $r->celular . '</td>';
                echo '<td>' . $r->email . '</td>';
                echo '<td>';
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vFornecedor')) {
                    echo '<a href="' . base_url() . 'index.php/fornecedores/visualizar/' . $r->idFornecedores . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                    echo '<a href="' . base_url() . 'index.php/mine?e=' . $r->email . '&c=' . $r->documento . '" target="new" style="margin-right: 1%" class="btn tip-top" title="Área do fornecedor"><i class="fas fa-key"></i></a>';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eFornecedor')) {
                    echo '<a href="' . base_url() . 'index.php/fornecedores/editar/' . $r->idFornecedores . '" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Fornecedor"><i class="fas fa-edit"></i></a>';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dFornecedor')) {
                    echo '<a href="#modal-excluir" role="button" data-toggle="modal" fornecedor="' . $r->idFornecedores . '" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Fornecedor"><i class="fas fa-trash-alt"></i></a>';
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
    <form action="<?php echo base_url() ?>index.php/fornecedores/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Fornecedor</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idFornecedor" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este fornecedor e os dados associados a ele (OS, Vendas, Receitas)?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var fornecedor = $(this).attr('fornecedor');
            $('#idFornecedor').val(fornecedor);
        });
    });
</script>
