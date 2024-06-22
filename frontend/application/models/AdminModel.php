<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    function us($data) {
        $simpan = $this->db->update('tbl_sekolah', $data);
        if ($simpan) {
            return true;
        } else {
            return false;
        }
        
    }

    function upLogo()
    {
        
        $config['upload_path'] = './assets/images/logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('logo')) {
            return $this->upload->display_errors();
        } else {
            $filename = $this->upload->data('file_name');
            $object = ['logo' => $filename];
            $this->db->update('tbl_sekolah', $object);
            return 'sukses';
        }
    }

    function uppan()
    {
        
        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size']  = '10000';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('panduan')) {
            return $this->upload->display_errors();
        } else {
            $filename = $this->upload->data('file_name');
            $object = ['panduan' => $filename];
            $this->db->update('tbl_sekolah', $object);
            return 'sukses';
        }
    }

    function upSlide()
    {
        
        $config['upload_path'] = './assets/images/slide/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('slide')) {
            return 'error';
        } else {
            $filename = $this->upload->data('file_name');
            return $filename;
        }
        
    }

    function uBah($table, $data, $id) {
        $this->db->where('id', $id);
        $simpan = $this->db->update($table, $data);

        if ($simpan) {
            return true;
        } else {
            return false;
        }
    }

    function tambah($table, $data) {
        $simpan = $this->db->insert($table, $data);
        if ($simpan) {
            return true;
        } else {
            return false;
        }
    }

    function hapus($table,$id) {
        $this->db->where('id', $id);
        $hapus = $this->db->delete($table);
        if ($hapus) {
            return true;
        } else {
            return false;
        }
    }

    function kosong($table) {
        $hapus = $this->db->truncate($table);
        if ($hapus) {
            return true;
        } else {
            return false;
        }
    }

    function importhasilseleksi() {

        $config['upload_path'] = './uploads/hasil/';
        $config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '10048';
		$config['overwrite'] = true;
		$config['file_name'] = "data_import";
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            return $this->upload->display_errors();
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            return "success";
        }
        
    }

}

/* End of file AdminModel.php */
