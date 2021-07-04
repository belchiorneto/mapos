<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Insumos extends MY_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('insumos_model');
        $this->data['menuInsumos'] = 'Insumos';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar insumos.');
            redirect(base_url());
        }

        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('insumos/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->insumos_model->count('insumos');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->insumos_model->get('insumos', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'insumos/insumos';
        return $this->layout();
    }

    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar insumos.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('insumos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = [
                'descricao' => set_value('descricao'),
                'unidade' => set_value('unidade')
            ];

            if ($this->insumos_model->add('insumos', $data) == true) {
                $this->session->set_flashdata('success', 'Insumo adicionado com sucesso!');
                log_info('Adicionou um insumo');
                redirect(site_url('insumos/adicionar/'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }
        $this->data['view'] = 'insumos/adicionarInsumo';
        return $this->layout();
    }

    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar insumos.');
            redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('insumos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = [
                'descricao' => $this->input->post('descricao'),
                'unidade' => $this->input->post('unidade')
            ];

            if ($this->insumos_model->edit('insumos', $data, 'idInsumos', $this->input->post('idInsumos')) == true) {
                $this->session->set_flashdata('success', 'Insumo editado com sucesso!');
                log_info('Alterou um insumo. ID: ' . $this->input->post('idInsumos'));
                redirect(site_url('insumos/editar/') . $this->input->post('idInsumos'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';
            }
        }

        $this->data['result'] = $this->insumos_model->getById($this->uri->segment(3));
		
		$this->data['fornecedores'] = $this->insumos_model->getFornecedores($this->uri->segment(3));

        $this->data['view'] = 'insumos/editarInsumo';
        return $this->layout();
    }

    public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar insumos.');
            redirect(base_url());
        }

        $this->data['result'] = $this->insumos_model->getById($this->uri->segment(3));

        if ($this->data['result'] == null) {
            $this->session->set_flashdata('error', 'Insumo não encontrado.');
            redirect(site_url('insumos/editar/') . $this->input->post('idInsumos'));
        }

        $this->data['view'] = 'insumos/visualizarInsumo';
        return $this->layout();
    }

    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir insumos.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir insumo.');
            redirect(base_url() . 'index.php/insumos/gerenciar/');
        }

        $this->insumos_model->delete('insumos_os', 'insumos_id', $id);
        $this->insumos_model->delete('itens_de_vendas', 'insumos_id', $id);
        $this->insumos_model->delete('insumos', 'idInsumos', $id);

        log_info('Removeu um insumo. ID: ' . $id);

        $this->session->set_flashdata('success', 'Insumo excluido com sucesso!');
        redirect(site_url('insumos/gerenciar/'));
    }

    public function atualizar_estoque()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eInsumo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para atualizar estoque de insumos.');
            redirect(base_url());
        }

        $idInsumo = $this->input->post('id');
        $novoEstoque = $this->input->post('estoque');
        $estoqueAtual = $this->input->post('estoqueAtual');

        $estoque = $estoqueAtual + $novoEstoque;

        $data = [
            'estoque' => $estoque,
        ];

        if ($this->insumos_model->edit('insumos', $data, 'idInsumos', $idInsumo) == true) {
            $this->session->set_flashdata('success', 'Estoque de Insumo atualizado com sucesso!');
            log_info('Atualizou estoque de um insumo. ID: ' . $idInsumo);
            redirect(site_url('insumos/visualizar/') . $idInsumo);
        } else {
            $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
        }
    }
	 public function autoCompleteFornecedor()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->insumos_model->autoCompleteFornecedor($q);
        }
    }
	public function adicionarFornecedor()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run('adicionar_fornecedor_insumo') === false) {
            $errors = validation_errors();

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($errors));
        }

        $preco = $this->input->post('preco');
        $idnsumo = $this->input->post('idInsumo');
        $data = [
            'idInsumo' => $idnsumo,
            'valorCompra' => $preco,
            'idFornecedor' => $this->input->post('idFornecedor'),
        ];

        if ($this->insumos_model->add('insumos_fornecedores', $data) == true) {
            $this->load->model('insumos_model');

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(['result' => true]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['result' => false]));
        }
    }
}
