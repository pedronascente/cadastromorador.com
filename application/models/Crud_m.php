<?php
//namespace\Application\Models\Crud_m;
//use System\Core\Model;

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_m extends CI_Model {

    public $table;

    public function __construct() {
        parent::__construct();
    }

    public function save($data) {
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function vefificarSeRegistroJaFoiRegistrado($where) {
        $this->db->select('*')->from($this->table)->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function findAll() {
        $this->db->select('*')->from($this->table);
        $query = $this->db->get()->result_array();
        return $query;
    }
    
    public function numRows() {
        return  $this->db->count_all($this->table);  
    }
    
    public function getListById($arrayColunaValor) {
        $this->db->select('*')->from($this->table)->where($arrayColunaValor);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function findById($arrayColunaValor) {
        $this->db->select('*')
                ->from($this->table)
                ->where($arrayColunaValor);
        $query = $this->db->get()->row_object();
        return $query;
    }

    public function update(array $dados, $where) {
        $this->db->where($where);
        $this->db->update($this->table, $dados);
    }

    public function delete($arrayColunaValor) {
        $result = $this->db->delete($this->table, $arrayColunaValor);
        return $result;
    }
}