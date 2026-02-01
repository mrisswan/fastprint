<?php
class Produk_model extends CI_Model
{

    public function get_all_bisa_dijual()
    {
        $this->db->select('p.*, k.nama_kategori, s.nama_status');
        $this->db->from('produk p');
        $this->db->join('kategori k', 'p.kategori_id = k.id_kategori');
        $this->db->join('status s', 'p.status_id = s.id_status');
        $this->db->where('s.nama_status', 'bisa dijual'); // Poin 5
        return $this->db->get()->result();
    }

    public function get_or_create_kategori($nama)
    {
        $exists = $this->db->get_where('kategori', ['nama_kategori' => $nama])->row();
        if ($exists) return $exists->id_kategori;

        $this->db->insert('kategori', ['nama_kategori' => $nama]);
        return $this->db->insert_id();
    }

    public function get_or_create_status($nama)
    {
        $exists = $this->db->get_where('status', ['nama_status' => $nama])->row();
        if ($exists) return $exists->id_status;

        $this->db->insert('status', ['nama_status' => $nama]);
        return $this->db->insert_id();
    }

    public function insert_produk($data)
    {
        return $this->db->insert('produk', $data);
    }
}
