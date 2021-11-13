<?php namespace App\Models;
use CodeIgniter\Model;

class tbl_kelas extends Model
{
    public function getKelas()
    {
        $builder = $this->db->table('akd_kelas');
        return $builder->get();
    }

    public function saveKelas($data)
    {
        $query = $this->db->table('akd_kelas')->insert($data);
        return $query;
    }

    public function updateKelas($data, $id)
    {
        $query = $this->db->table('akd_kelas')->update($data, array('pk_kelas'=>$id));
        return $query;
    }

    public function deleteKelas($id)
    {
        $query = $this->db->table('akd_kelas')->delete(array('pk_kelas' => $id));
        return $query;
    }
}