<?php
class Produtos_model extends CI_Model
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
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idProdutos', 'desc');
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
        $this->db->where('idProdutos', $id);
        $this->db->limit(1);
        return $this->db->get('produtos')->row();
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

    public function updateEstoque($produto, $quantidade, $operacao = '-')
    {
        $sql = "UPDATE produtos set estoque = estoque $operacao ? WHERE idProdutos = ?";
        return $this->db->query($sql, [$quantidade, $produto]);
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
	
	public function autoCompleteInsumo($q)
    {
        $this->db->select('insumos.*, insumos_fornecedores.*, fornecedores.*');
		$this->db->limit(5);
        $this->db->like('descricao', $q);
        $this->db->from('insumos');
        $this->db->join('insumos_fornecedores', 'insumos.idInsumos = insumos_fornecedores.idInsumo', 'left');
		$this->db->join('fornecedores', 'insumos_fornecedores.idFornecedor = fornecedores.idFornecedores', 'left');
        $query = $this->db->get();
	   if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['descricao'] . '('.$row['nomeFornecedor'].')', 'preco' => $row['valorCompra'], 'idFornecedor' => $row['idFornecedor'], 'id' => $row['idInsumos']];
            }
            echo json_encode($row_set);
        }
    }
	
	public function getFornecedores($id = null)
    {
        $this->db->select('produtos_fornecedores.*, fornecedores.*');
        $this->db->from('produtos_fornecedores');
        $this->db->join('fornecedores', 'fornecedores.idFornecedores = produtos_fornecedores.idFornecedor');
        $this->db->where('idProduto', $id);

        return $this->db->get()->result();
    }
	public function getInsumos($id = null)
    {
        $this->db->select('produtos_insumos.*, insumos.*');
        $this->db->from('produtos_insumos');
        $this->db->join('insumos', 'insumos.idInsumos = produtos_insumos.idInsumo');
        $this->db->where('idProduto', $id);

        return $this->db->get()->result();
    }
	
	
}
