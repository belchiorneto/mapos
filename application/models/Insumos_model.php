<?php
class Insumos_model extends CI_Model
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */
    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
		$this->db->select('insumos.*,', 'insumos_fornecedores.*, fornecedores.*');
        $this->db->from('insumos');
		$this->db->join('insumos_fornecedores', 'insumos.idInsumos = insumos_fornecedores.idInsumo', 'left');
		$this->db->join('fornecedores', 'fornecedores.idFornecedores = insumos_fornecedores.idFornecedor', 'left');
        $this->db->order_by('idInsumos', 'desc');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    public function getById($id)
    {
        $this->db->where('idInsumos', $id);
        $this->db->limit(1);
        return $this->db->get('insumos')->row();
    }
    
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        
        return false;
    }
    
    public function edit($table, $data, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }
        
        return false;
    }
    
    public function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        
        return false;
    }
    
    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function updateEstoque($insumo, $quantidade, $operacao = '-')
    {
        $sql = "UPDATE insumos set estoque = estoque $operacao ? WHERE idInsumos = ?";
        return $this->db->query($sql, [$quantidade, $insumo]);
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
        $insumo = $this->input->post('idInsumo');
        $data = [
            'idInsumo' => $produto,
            'idFornecedor' => $this->input->post('idFornecedor'),
			'valorCompra' => $preco
        ];

        if ($this->insumos_model->add('insumos_fornecedores', $data) == true) {
            $this->load->model('insumos_model');

            log_info('Adicionou fornecedor a um insumo. ID (insumo): ' . $this->input->post('idInsumo'));

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
	public function autoCompleteFornecedor($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nomeFornecedor', $q);
        $query = $this->db->get('fornecedores');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['nomeFornecedor'], 'id' => $row['idFornecedores']];
            }
            echo json_encode($row_set);
        }
    }
	
	public function getFornecedores($id = null)
    {
        $this->db->select('insumos_fornecedores.*, fornecedores.*');
        $this->db->from('insumos_fornecedores');
        $this->db->join('fornecedores', 'fornecedores.idFornecedores = insumos_fornecedores.idFornecedor');
        $this->db->where('idInsumo', $id);

        return $this->db->get()->result();
    }
}
