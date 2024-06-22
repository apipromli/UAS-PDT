<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function index()
    {
        
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();

        $this->db->where_in('seleksi', '1');
        $this->db->where_not_in('jur', '');
        
        $data['hasil'] = $this->db->get('tbl_registrasi')->result();;
        
        if ($data['sekolah']['bt'] != '3') {
            # code...
            redirect('','refresh');
        }
        
        $this->load->view('front/pengumuman', $data);
        
    }

}

/* End of file Pengumuman.php */
