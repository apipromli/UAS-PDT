<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel', 'a');
        
    }
    

    public function index()
    {
        must_admin();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();

        $data['jDaftar'] = $this->db->get('tbl_registrasi')->num_rows();

        $this->db->where('benar', 'on');
        $data['jLengkap'] = $this->db->get('tbl_registrasi')->num_rows();

        $this->db->where_not_in('foto', '');
        $this->db->where_not_in('bukti_prestasi', '');
        $this->db->where_not_in('bukti_raport', '');
        $this->db->where_not_in('bukti_kk', '');
        $data['jBerkas'] = $this->db->get('tbl_registrasi')->num_rows();

        $this->db->where('valid', '1');
        $data['jValid'] = $this->db->get('tbl_registrasi')->num_rows();

        $data['stat'] = $this->db->get('tbl_sekolah')->row_array()['bt'];
        
        
        $this->load->view('back/meta', $data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/dashboard');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function sekolah()
    {
        must_admin();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        
        $this->load->view('back/meta', $data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/sekolah');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function atur()
    {
        must_admin();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['jurusan'] = $this->db->get('tbl_jurusan')->result();
        $data['slide'] = $this->db->get('tbl_slide')->result();
        
        $this->load->view('back/meta',$data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/atur');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function informasi()
    {
        must_admin();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['jadwal'] = $this->db->get('tbl_jadwal')->result();
        $data['slide'] = $this->db->get('tbl_slide')->result();
        
        $this->load->view('back/meta',$data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/informasi');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function registrasi()
    {
        must_admin();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        $this->load->library('pagination');
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();

        $config['base_url'] = base_url().'index.php/admin/registrasi/';
        $config['total_rows'] = $this->db->get('tbl_registrasi')->num_rows();
        

        $config['full_tag_open'] = '<div class="demo"><ul class="pagination pg-primary">';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $data['start'] = $this->uri->segment(3);
        
        if (isset($_POST['cari'])) {
            # code...
            $this->db->or_like('nama', $this->input->post('cari'));
            $data['registrasi'] = $this->db->get('tbl_registrasi');
        } else {
            # code...
            $config['per_page'] = 10;
            $data['registrasi'] = $this->db->get('tbl_registrasi', $config['per_page'], $data['start']);
        }
        
        $this->pagination->initialize($config);
        
        $this->load->view('back/meta',$data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/registrasi');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function seleksi()
    {
        must_admin();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['semua'] = $this->db->get('tbl_registrasi')->num_rows();
        $data['lengkap'] = $this->db->get_where('tbl_registrasi',['benar' => 'on'])->num_rows();
        $data['valid'] = $this->db->get_where('tbl_registrasi',['valid' => '1'])->num_rows();
        $data['diterima'] = $this->db->get_where('tbl_registrasi',['seleksi' => '1'])->num_rows();
        $data['status'] = $this->db->get('tbl_sekolah')->row()->bt;
        
        
        $this->load->view('back/meta', $data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/seleksi');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }

    public function daftarulang()
    {
        must_admin();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        $this->load->library('pagination');
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();

        $config['base_url'] = base_url().'index.php/admin/registrasi/';

        $this->db->where_in('seleksi', '1');
        $this->db->where_not_in('jur', '');
        $config['total_rows'] = $this->db->get('tbl_registrasi')->num_rows();
        

        $config['full_tag_open'] = '<div class="demo"><ul class="pagination pg-primary">';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $data['start'] = $this->uri->segment(3);
        
        if (isset($_POST['cari'])) {
            # code...
            $this->db->or_like('nama', $this->input->post('cari'));
            $this->db->where_in('seleksi', '1');
            $this->db->where_not_in('jur', '');
            $data['registrasi'] = $this->db->get('tbl_registrasi');
        } else {
            # code...
            $config['per_page'] = 10;
            $this->db->where_in('seleksi', '1');
            $this->db->where_not_in('jur', '');
            $data['registrasi'] = $this->db->get('tbl_registrasi', $config['per_page'], $data['start']);
        }
        
        $this->pagination->initialize($config);
        
        $this->load->view('back/meta',$data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/daftarulang');
        $this->load->view('back/footer');
        $this->load->view('back/script');
        
    }


    /**
     * Kumpulan fungsi tambah data
     */

    function tJadwal() {
        must_admin();

        $data = [
            
            'kegiatan' => $this->input->post('kegiatan', true),
            'dibuka' => $this->input->post('dibuka', true),
            'ditutup' => $this->input->post('ditutup', true),
            
        ];

        $simpan = $this->a->tambah('tbl_jadwal', $data);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal ditambah');
            redirect('admin/informasi','refresh');
        }
    }

    function tSlide() {
        must_admin();

        $upload = $this->a->upSlide();

        $data = [
            'judul' => $this->input->post('judul', true),
            'text' => $this->input->post('text'),
            'gambar' => $upload,        
        ];

        $simpan = $this->a->tambah('tbl_slide', $data);
        
        if ($simpan && $upload != 'error') {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'warning');
            $this->session->set_flashdata('pesan', 'Data ditambahkan tanpa gambar');
            redirect('admin/informasi','refresh');
        }
    }

    function tJurusan() {
        must_admin();
        $namaJurusan = $this->input->post('namaJurusan', true);
        $data = [
            'namaJurusan' => $namaJurusan,
        ];

        $simpan = $this->a->tambah('tbl_jurusan', $data);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
            redirect('admin/atur','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal ditambah');
            redirect('admin/atur','refresh');
        }
    }



    /**
     * Kumpulan fungsi update data
     */

     function resValid($id, $page = null) {
        echo $page;
        $object = ['valid' => '0'];
        $this->db->where('id', $id);
        $ubah = $this->db->update('tbl_registrasi', $object);

        if ($ubah) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil direset');
            redirect('index.php/admin/registrasi/'.$page,'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Tidak ada data direset');
            redirect('index.php/admin/registrasi/'.$page,'refresh');
        }
        
     }

     function us() {
        must_admin();
         $data = [
            'nama_sekolah'  => $this->input->post('nama_sekolah', true),
            'alamat'        => $this->input->post('alamat', true),
            'kota'          => $this->input->post('kota', true),
            'provinsi'      => $this->input->post('provinsi', true),
            'email_sekolah' => $this->input->post('email_sekolah', true),
            'tlp_sekolah'   => $this->input->post('tlp_sekolah', true),
         ];

         $simpan = $this->a->us($data);

         if ($simpan) {
             $this->session->set_flashdata('tipe', 'success');
             $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
             redirect('admin/sekolah','refresh');
             
         } else {
            $this->session->set_flashdata('tipe', 'warning');
            $this->session->set_flashdata('pesan', 'Data gagal disimpan');
            redirect('admin/sekolah','refresh');
         }
         
     }

     function stat() 
     {
        must_admin();
         $data = [
            'bt'         => $this->input->post('bt', true),
            'kirim_mail' => $this->input->post('kirim_mail', true),
            'pass_mail'  => base64_encode($this->input->post('pass_mail', true)),
            'smtp_host' => $this->input->post('smtp_host', true),
            'smtp_port' => $this->input->post('smtp_port', true),

         ];

         $simpan = $this->a->us($data);

         if ($simpan) {
             $this->session->set_flashdata('tipe', 'success');
             $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
             redirect('admin/atur','refresh');
             
         } else {
            $this->session->set_flashdata('tipe', 'warning');
            $this->session->set_flashdata('pesan', 'Data gagal disimpan');
            redirect('admin/atur','refresh');
         }

     }

     function uppan()
     {
        must_admin();
        $upload = $this->a->uppan();
        
        if ($upload == 'sukses') {
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Panduan berhasil disimpan');
        redirect('admin/atur','refresh');
        } else {
        $this->session->set_flashdata('tipe', 'warning');
        $this->session->set_flashdata('pesan', 'Panduan gagal disimpan, '.$this->upload->display_errors());
        redirect('admin/atur','refresh');
        }
         
     }

     function upLogo()
     {
        must_admin();
        $upload = $this->a->upLogo();
        
        if ($upload == 'sukses') {
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Logo berhasil disimpan');
        redirect('admin/sekolah','refresh');
        } else {
        $this->session->set_flashdata('tipe', 'warning');
        $this->session->set_flashdata('pesan', 'Logo gagal disimpan, '.$this->upload->display_errors());
        redirect('admin/sekolah','refresh');
        }
         
     }

     function uJadwal() {
        must_admin();
        $id = $this->input->post('id', true);
         
        $data = [
            'kegiatan' => $this->input->post('kegiatan', true),
            'dibuka' => $this->input->post('dibuka', true),
            'ditutup' => $this->input->post('ditutup', true),
        ];

        $simpan = $this->a->uBah('tbl_jadwal', $data, $id);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('admin/informasi','refresh');
        }
        
     }

     function uJurusan() {
        must_admin();
        $id = $this->input->post('id', true);
         
        $data = [
            'namaJurusan' => $this->input->post('namaJurusan', true),
        ];

        $simpan = $this->a->uBah('tbl_jurusan', $data, $id);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/atur','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('admin/atur','refresh');
        }
        
     }

     function uData() {
        must_admin();
        $id = $this->input->post('id', true);
         
        $data = [
            'nisn' => $this->input->post('nisn', true),
        ];

        $simpan = $this->a->uBah('tbl_registrasi', $data, $id);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/registrasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('admin/registrasi','refresh');
        }
        
     }

     function uSlide() {
        must_admin();
        $id = $this->input->post('id', true);
        $upload = $this->a->upSlide();

        if ($upload != 'error') {
            $data = [
                'judul' => $this->input->post('judul', true),
                'text' => $this->input->post('text', true),
                'gambar' => $upload,
            ];
            echo 'ada';
        } else {
            $data = [
                'judul' => $this->input->post('judul', true),
                'text' => $this->input->post('text', true),
            ];
        }
        
        $simpan = $this->a->uBah('tbl_slide', $data, $id);

        if ($simpan) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('admin/informasi','refresh');
        }
        
     }

     function gUbahJad() {
         $this->db->where('id', $this->input->post('id'));
         $d = array();
         $data = $this->db->get('tbl_jadwal')->result_array();
         array_push($d, array($data, ['token' => $this->security->get_csrf_hash()]));
         echo json_encode($d);
         
     }

     function gUbahSld() {
        $this->db->where('id', $this->input->post('id'));
        $d = array();
        $data = $this->db->get('tbl_slide')->result_array();
        array_push($d, array($data, ['token' => $this->security->get_csrf_hash()]));
        echo json_encode($d);
        
    }

    function gUbahJur() {
        $this->db->where('id', $this->input->post('id'));
        $d = array();
        $data = $this->db->get('tbl_jurusan')->result_array();
        array_push($d, array($data, ['token' => $this->security->get_csrf_hash()]));
        echo json_encode($d);
        
    }

    function gUbahData() {
        $this->db->where('id', $this->input->post('id'));
        $d = array();
        $data = $this->db->get('tbl_registrasi')->result_array();
        array_push($d, array($data, ['token' => $this->security->get_csrf_hash()]));
        echo json_encode($d);
        
    }

    function validAll()
    {
        $page = $this->input->post('page', true);
        $id = $this->input->post('valid');
        if ($id) {
            # code...
            $d = array();
            foreach ($id as $i ) {
                array_push($d, array('id' => $i, 'valid' => '1'));
            }
    
            $simpan = $this->db->update_batch('tbl_registrasi', $d, 'id');
            if ($simpan) {
                $this->session->set_flashdata('tipe', 'success');
                $this->session->set_flashdata('pesan', 'Data berhasil divalidasi');
                redirect('index.php/admin/registrasi/'.$page,'refresh');
            } else {
                $this->session->set_flashdata('tipe', 'danger');
                $this->session->set_flashdata('pesan', 'Tidak ada data divalidasi');
                redirect('index.php/admin/registrasi/'.$page,'refresh');
            }
        } else {
            # code...
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Tidak ada data divalidasi');
            redirect('index.php/admin/registrasi/'.$page,'refresh');
        }
    }

    function validasiSemua($page = null) {
        must_admin();
        $object = [
            'valid' => '1',
        ];
        $ubah = $this->db->update('tbl_registrasi', $object);
        
        if ($ubah) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil divalidasi');
            redirect('index.php/admin/registrasi/'.$page,'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Tidak ada data divalidasi');
            redirect('index.php/admin/registrasi/'.$page,'refresh');
        }
        
    }

    function resetseleksi() {
        must_admin();
        $data = [
            'seleksi'   => '',
            'jur'       => ''
        ];

        $sukses = $this->db->update('tbl_registrasi', $data);

        if ($sukses) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil direset');
            redirect('admin/seleksi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'warning');
            $this->session->set_flashdata('pesan', 'Tidak ada data direset');
            redirect('admin/seleksi','refresh');
        }
        
        
    }

     /**
      * Kumpulan gungsi hapus
      */
    
    function hapus($table, $id) {
        must_admin();
        $hapus = $this->a->hapus('tbl_'.$table,$id);
        if ($hapus) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            redirect('admin/informasi','refresh');
        }
    }

    function hapusx($table, $id) {
        must_admin();
        $hapus = $this->a->hapus('tbl_'.$table,$id);
        if ($hapus) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin/atur','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            redirect('admin/atur','refresh');
        }
    }

    function hapusr($table, $id) {
        must_admin();
        $hapus = $this->a->hapus('tbl_'.$table,$id);
        if ($hapus) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin/registrasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            redirect('admin/registrasi','refresh');
        }
    }

    function kosong($table) {
        must_admin();
        $hapus = $this->a->kosong('tbl_'.$table);
        if ($hapus) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin/informasi','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            redirect('admin/informasi','refresh');
        }
    }

    function kosongx($table) {
        must_admin();
        $hapus = $this->a->kosong('tbl_'.$table);
        if ($hapus) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('admin/atur','refresh');
        } else {
            $this->session->set_flashdata('tipe', 'danger');
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            redirect('admin/atur','refresh');
        }
    }



    function downValid() 
    {

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Yuwandianto')
        ->setLastModifiedBy('Yuwandianto')
        ->setTitle("Data-pendaftar")
        ->setSubject("Zonasi")
        ->setDescription("Laporan Pendaftaran ")
        ->setKeywords("Jalur Zonasi");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        ),
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
        'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        )
        );


        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENDAFTAR");
        //$excel->getActiveSheet()->mergeCells('A1:P1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $excel->getActiveSheet()->getStyle('A3:V3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');


        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO DAFTAR");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NISN");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "JK");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "TEMPAT LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TGL LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "BLN LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TH LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "AGAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "ALAMAT");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "SEKOLAH ASAL");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "TAHUN LULUS");
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "NOMOR HP");
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "JUMLAH NILAI RAPORT");
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "PRESTASI NON AKADEMIK");
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "PAS FOTO");
        $excel->setActiveSheetIndex(0)->setCellValue('R3', "BUKTI KK");
        $excel->setActiveSheetIndex(0)->setCellValue('S3', "BUKTI RAPORT");
        $excel->setActiveSheetIndex(0)->setCellValue('T3', "BUKTI PRESTASI");
        $excel->setActiveSheetIndex(0)->setCellValue('U3', "PILIHAN JURUSAN 1");
        $excel->setActiveSheetIndex(0)->setCellValue('V3', "PILIHAN JURUSAN 2");


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);

        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->db->get_where('tbl_registrasi', ['valid' => '1'])->result();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($siswa as $data){ // Lakukan looping pada variabel siswa

        if ($data->jk == '1') {
            $jk = 'L';
        } elseif ($data->jk == '2') {
            $jk = 'P';
        }

        if (!empty($data->foto)) {
            $foto = 'upload';
        } else {
            $foto = 'belum';
        }

        if (!empty($data->bukti_kk)) {
            $kk = 'upload';
        } else {
            $kk = 'belum';
        }

        if (!empty($data->bukti_raport)) {
            $raport = 'upload';
        } else {
            $raport = 'belum';
        }

        if (!empty($data->bukti_prestasi)) {
            $prestasi = 'upload';
        } else {
            $prestasi = 'belum';
        }

        if ($data->tingkat_prestasi !='' && $data->juara_prestasi !='' && $data->bidang_prestasi !='' && $data->nama_prestasi !='') {
            $non = 'Juara '.$data->juara_prestasi.' tingkat '.$data->tingkat_prestasi.' '.$data->nama_prestasi;
        } else {
            $non = '-';
        }

        if (!empty($data->alamat_jalan)) {
            $alamat = $data->alamat_jalan.' RT '.$data->rt.' RW '.$data->rw.' Desa '.$data->desa.' Kec. '.$data->kecamatan;
        } else {
            $alamat = 'RT '.$data->rt.' RW '.$data->rw.' Desa '.$data->desa.' Kec. '.$data->kecamatan;
        }
        
            

        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nomor_daftar);
        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nisn);
        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $jk);
        $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tempat_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->bln_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->thn_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->agama);
        $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $alamat);
        $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->sekolah_asal);
        $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tahun_lulus);
        $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->nomor_hp);
        $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->sum);
        $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $non);
        $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $foto);
        $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $kk);
        $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $raport);
        $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $prestasi);
        $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->jurusan1);
        $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->jurusan2);



        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);


        $no++; // Tambah 1 setiap kali looping
        $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);

        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Pendaftar");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Pendaftar.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function importhasilseleksi() {
        must_admin();

        $import = $this->a->importhasilseleksi();

        if ($import == 'success') {
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel   = $excelreader->load('./uploads/hasil/data_import.xlsx');
            $sheet       = $loadexcel->getActiveSheet()->toArray(null, true, true , true);
            $data        = array();
            $log         = array();
            $numrow      = 1;
            foreach($sheet as $row){

                if($numrow > 1){
                    array_push($data, array(
                        'nisn'    => $row['B'],
                        'jur'     => $row['D'],
                        'seleksi' => '1'
                    ));
                }
                $numrow++; 
            }

            $sukses = $this->db->update_batch('tbl_registrasi', $data, 'nisn');

            if ($sukses) {
                unlink('./uploads/hasil/data_import.xlsx');
                $this->session->set_flashdata('tipe', 'success');
                $this->session->set_flashdata('pesan', 'Data berhasil diimport');
                redirect('admin/seleksi','refresh');

            } else {
                $this->session->set_flashdata('tipe', 'warning');
                $this->session->set_flashdata('pesan', 'Data gagal diimport');
                redirect('admin/seleksi','refresh');
            }

        } else {
            $this->session->set_flashdata('tipe', 'warning');
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            redirect('admin/seleksi','refresh');
        }

    }


    function backupdb() {
        must_admin();
        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/assets/mybackup.zip', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }

    function downDU() 
    {

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Yuwandianto')
        ->setLastModifiedBy('Yuwandianto')
        ->setTitle("Data-pendaftar")
        ->setSubject("Zonasi")
        ->setDescription("Laporan Pendaftaran ")
        ->setKeywords("Jalur Zonasi");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        ),
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
        'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        )
        );


        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENDAFTAR");
        //$excel->getActiveSheet()->mergeCells('A1:P1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $excel->getActiveSheet()->getStyle('A3:V3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');


        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO DAFTAR");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NISN");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "JK");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "TEMPAT LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TGL LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "BLN LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TH LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "AGAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "ALAMAT");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "SEKOLAH ASAL");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "TAHUN LULUS");
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "NOMOR HP");
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "JUMLAH NILAI RAPORT");
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "PRESTASI NON AKADEMIK");
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "PAS FOTO");
        $excel->setActiveSheetIndex(0)->setCellValue('R3', "BUKTI KK");
        $excel->setActiveSheetIndex(0)->setCellValue('S3', "BUKTI RAPORT");
        $excel->setActiveSheetIndex(0)->setCellValue('T3', "BUKTI PRESTASI");
        $excel->setActiveSheetIndex(0)->setCellValue('U3', "PILIHAN JURUSAN 1");
        $excel->setActiveSheetIndex(0)->setCellValue('V3', "PILIHAN JURUSAN 2");


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);

        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->db->get_where('tbl_registrasi', ['seleksi' => '1'])->result();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($siswa as $data){ // Lakukan looping pada variabel siswa

        if ($data->jk == '1') {
            $jk = 'L';
        } elseif ($data->jk == '2') {
            $jk = 'P';
        }

        if (!empty($data->foto)) {
            $foto = 'upload';
        } else {
            $foto = 'belum';
        }

        if (!empty($data->bukti_kk)) {
            $kk = 'upload';
        } else {
            $kk = 'belum';
        }

        if (!empty($data->bukti_raport)) {
            $raport = 'upload';
        } else {
            $raport = 'belum';
        }

        if (!empty($data->bukti_prestasi)) {
            $prestasi = 'upload';
        } else {
            $prestasi = 'belum';
        }

        if ($data->tingkat_prestasi !='' && $data->juara_prestasi !='' && $data->bidang_prestasi !='' && $data->nama_prestasi !='') {
            $non = 'Juara '.$data->juara_prestasi.' tingkat '.$data->tingkat_prestasi.' '.$data->nama_prestasi;
        } else {
            $non = '-';
        }

        if (!empty($data->alamat_jalan)) {
            $alamat = $data->alamat_jalan.' RT '.$data->rt.' RW '.$data->rw.' Desa '.$data->desa.' Kec. '.$data->kecamatan;
        } else {
            $alamat = 'RT '.$data->rt.' RW '.$data->rw.' Desa '.$data->desa.' Kec. '.$data->kecamatan;
        }
        
            

        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nomor_daftar);
        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nisn);
        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $jk);
        $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tempat_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->bln_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->thn_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->agama);
        $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $alamat);
        $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->sekolah_asal);
        $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tahun_lulus);
        $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->nomor_hp);
        $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->sum);
        $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $non);
        $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $foto);
        $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $kk);
        $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $raport);
        $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $prestasi);
        $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->jurusan1);
        $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->jurusan2);



        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);


        $no++; // Tambah 1 setiap kali looping
        $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);

        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Daftar Ulang");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Daftar Ulang.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function accountSetting() {
        must_admin();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row();
        
        $this->load->view('back/meta', $data);
        $this->load->view('back/header');
        $this->load->view('back/sidebar');
        $this->load->view('back/prof');
        $this->load->view('back/footer');
        $this->load->view('back/script');
    }

    function up() {
        must_admin();

        if ($this->input->post('passBaru') !='') {
            # jika dimasukkan password baru
            $query = $this->db->get_where('tbl_pengguna', ['xid' => $this->session->userdata('id')])->row_array();
            $passLama = $this->input->post('passLama');
            
            if (password_verify($passLama, $query['xpass'])) {
                # jika password lama sesuai...
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'xemail' => $this->input->post('email', true),
                    'xpass' => password_hash($this->input->post('passBaru'), PASSWORD_DEFAULT),
                ];
                $this->db->where('xid', $this->session->userdata('id'));
                $update = $this->db->update('tbl_pengguna', $data);

                if ($update) {
                    $this->session->set_flashdata('tipe', 'success');
                    $this->session->set_flashdata('pesan', 'Data berhasil diubah');
                    redirect('admin/accountSetting','refresh');
                } else {
                    $this->session->set_flashdata('tipe', 'danger');
                    $this->session->set_flashdata('pesan', 'Data gagal diubah');
                    redirect('admin/accountSetting','refresh');
                }
                
            } else {
                # code...
                $this->session->set_flashdata('tipe', 'danger');
                $this->session->set_flashdata('pesan', 'Password lama salah');
                redirect('admin/accountSetting','refresh');
            }
            

        } elseif ($this->input->post('passBaru') =='') {
            # jika tidak ada password baru
            $data = [
                'nama' => $this->input->post('nama', true),
                'xemail' => $this->input->post('email', true),
            ];
            $this->db->where('xid', $this->session->userdata('id'));
            $update = $this->db->update('tbl_pengguna', $data);

            if ($update) {
                $this->session->set_flashdata('tipe', 'success');
                $this->session->set_flashdata('pesan', 'Data berhasil diubah');
                redirect('admin/accountSetting','refresh');
            } else {
                $this->session->set_flashdata('tipe', 'danger');
                $this->session->set_flashdata('pesan', 'Data gagal diubah');
                redirect('admin/accountSetting','refresh');
            }
        }
    }


}

/* End of file Admin.php */
