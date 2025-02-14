<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url(); ?>index.php/permissoes/adicionar" id="formPermissao" method="post">
        <div class="span12" style="margin-left: 0">
            <div class="widget-box">
                <div class="widget-title">
               <span class="icon">
               <i class="fas fa-lock"></i>
               </span>
                    <h5>Cadastro de Permissão</h5>
                    <div class="buttons">
                        <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/permissoes"><i class="fas fa-arrow-left"></i> Voltar</a>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="span6">
                        <label>Nome da Permissão</label>
                        <input name="nome" type="text" id="nome" class="span12" />
                    </div>
                    <div class="span6">
                        <br />
                        <label>
                            <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                            <span class="lbl"> Marcar Todos</span>
                        </label>
                        <br />
                    </div>
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGZero" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Clientes</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGZero">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cliente</span>
                                                </label>
                                            </td>
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
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Fornecedores</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGTwo">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vFornecedor" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Fornecedor</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aFornecedor" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Fornecedor</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eFornecedor" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Fornecedor</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dFornecedor" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Fornecedor</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGTwo2" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Produtos</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGTwo2">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Produto</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGTwo22" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Insumos</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGTwo22">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vInsumo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Insumo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aInsumo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Insumo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eInsumo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Insumo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dInsumo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Insumo</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Serviços</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Serviço</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree3" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Ordem de Serviços - OS</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree3">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir OS</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree33" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Vendas</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree33">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Venda</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Cobranças</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCobranca" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cobranças</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree3333" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Garantias</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree3333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vGarantia" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Garantia</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree33333" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Arquivos</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree33333">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Arquivo</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333343" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Financeiro</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333343">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vPagamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="ePagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Pagamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Lançamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333335" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Relatórios</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333335">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rFornecedor" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Fornecedor</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rInsumo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Insumos</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Financeiro</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rFaturamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Faturamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree333338" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-key"></i></span>
                                        <h5>Configurações e Sistema</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree333338">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Usuário</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Emitente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Permissão</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Backup</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cAuditoria" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Auditoria</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmail" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Emails</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cSistema" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Sistema</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#marcarTodos").change(function() {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        $("#formPermissao").validate({
            rules: {
                nome: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: 'Campo obrigatório'
                }
            }
        });
    });
</script>
