<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function ambil_data_api()
    {
        // Setting Timezone agar sinkron dengan server API (WIB)
        date_default_timezone_set('Asia/Jakarta');

        $url = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";

        // Poin 2 Gambar 2: Membuat Username & Password dinamis
        $username = "tesprogrammer" . date('dmy') . "C" . date('H');
        $password = md5("bisacoding-" . date('d-m-y'));

        $data_post = [
            'username' => $username,
            'password' => $password
        ];

        // Menggunakan cURL untuk mengakses API
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // HINT: CEK RESPONSE & HEADER (Poin HINT Gambar 2)
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if (isset($result['data'])) {
            foreach ($result['data'] as $item) {
                // Proses Normalisasi: Simpan Kategori & Status dulu untuk dapat ID
                $id_kategori = $this->Produk_model->get_or_create_kategori($item['kategori']);
                $id_status = $this->Produk_model->get_or_create_status($item['status']);

                // Simpan ke Tabel Produk (Poin 2 & 3 Gambar 1)
                $this->db->insert('produk', [
                    'nama_produk' => $item['nama_produk'],
                    'harga'       => $item['harga'],
                    'kategori_id' => $id_kategori,
                    'status_id'   => $id_status
                ]);
            }
            echo "Berhasil mengambil dan menyimpan " . count($result['data']) . " data.";
        } else {
            echo "Gagal: " . ($result['error_msg'] ?? 'Cek kredensial atau koneksi API.');
        }
    }

    // Poin 4 & 5: Tampilkan data status "bisa dijual"
    public function index()
    {
        $data['produk'] = $this->Produk_model->get_all_bisa_dijual();
        $this->load->view('produk_view', $data);
    }

    // Poin 6 & 7: Fitur Tambah dengan Validasi
    public function tambah()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['status'] = $this->db->get('status')->result();
            $this->load->view('tambah_view', $data);
        } else {
            $this->Produk_model->insert_produk($this->input->post());
            redirect('produk');
        }
    }

    // Menampilkan form edit dengan data produk yang dipilih
    public function edit($id)
    {
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id])->row();

        if (!$data['produk']) {
            show_404();
        }

        $data['kategori'] = $this->db->get('kategori')->result();
        $data['status'] = $this->db->get('status')->result();
        $this->load->view('edit_view', $data);
    }

    // Menangani proses update data (Poin 7: Validasi tetap berlaku)
    public function update()
    {
        $id = $this->input->post('id_produk');

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $update_data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id'   => $this->input->post('status_id')
            ];

            $this->db->where('id_produk', $id);
            $this->db->update('produk', $update_data);
            redirect('produk');
        }
    }

    // Poin 6 & 8: Fitur Hapus
    public function delete($id)
    {
        $this->db->delete('produk', ['id_produk' => $id]);
        redirect('produk');
    }
}
