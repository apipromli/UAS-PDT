<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_siswa', 's');
        
    }
    

    public function index()
    {
        must_siswa();

        $data['siswa'] = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        $data['jurusan'] = $this->db->get('tbl_jurusan')->result();
        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();

        if ($data['sekolah']['bt'] == '4') {
            
            redirect('siswa/daftarulang','refresh');
            
        }
        
        $this->load->view('student/meta', $data);
        $this->load->view('student/navbar');
        $this->load->view('student/subnavbar');
        $this->load->view('student/main');
        $this->load->view('student/footer');
        $this->load->view('student/script');
        
    }

   
    function lengkapidata()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'trim|required|numeric|exact_length[2]', [
            'exact_length' => '%s harus 2 karakter angka',
            'numeric' => '%s harus berupa angka'
        ]);
        $this->form_validation->set_rules('bln_lahir', 'Bulan lahir', 'trim|required|numeric|exact_length[2]', [
            'exact_length' => '%s harus 2 karakter angka',
            'numeric' => '%s harus berupa angka'
        ]);
        $this->form_validation->set_rules('thn_lahir', 'Tahun lahir', 'trim|required|numeric|exact_length[4]', [
            'exact_length' => '%s harus 4 karakter angka',
            'numeric' => '%s harus berupa angka'
        ]);
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('agama', 'agama', 'trim|required');
        $this->form_validation->set_rules('penerima_kip', 'Penarima Kip', 'trim|required');
        $this->form_validation->set_rules('alamat_jalan', 'alamat_jalan', 'trim');
        $this->form_validation->set_rules('rt', 'rt', 'trim|required|numeric|max_length[3]');
        $this->form_validation->set_rules('rw', 'rw', 'trim|required|numeric|max_length[3]');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'trim|required');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required|numeric|exact_length[4]', [
            'exact_length' => '%s harus 4 karakter angka',
            'numeric' => '%s harus berupa angka'
        ]);
        
        
        if ($this->form_validation->run() == FALSE) {
            # jika validasi gagal...
            $this->session->set_flashdata('pesan', '<strong>Peringatan !</strong> Data gagal disimpan, silahkan periksa kembali data yang dimasukkan');
            $this->session->set_flashdata('jenis', 'alert-danger');
            
            $this->index();
        } else {
            # jika validasi berhasil...
                $bin1 = $this->input->post('bin1', true);
                $big1 = $this->input->post('big1', true);
                $mtk1 = $this->input->post('mtk1', true);
                $ipa1 = $this->input->post('ipa1', true);
                $bin2 = $this->input->post('bin2', true);
                $big2 = $this->input->post('big2', true);
                $mtk2 = $this->input->post('mtk2', true);
                $ipa2 = $this->input->post('ipa2', true);
                $bin3 = $this->input->post('bin3', true);
                $big3 = $this->input->post('big3', true);
                $mtk3 = $this->input->post('mtk3', true);
                $ipa3 = $this->input->post('ipa3', true);
                $bin4 = $this->input->post('bin4', true);
                $big4 = $this->input->post('big4', true);
                $mtk4 = $this->input->post('mtk4', true);
                $ipa4 = $this->input->post('ipa4', true);
                $bin5 = $this->input->post('bin5', true);
                $big5 = $this->input->post('big5', true);
                $mtk5 = $this->input->post('mtk5', true);
                $ipa5 = $this->input->post('ipa5', true);
                $rata1 = ($bin1+$big1+$mtk1+$ipa1)/4;
                $rata2 = ($bin2+$big2+$mtk2+$ipa2)/4;
                $rata3 = ($bin3+$big3+$mtk3+$ipa3)/4;
                $rata4 = ($bin4+$big4+$mtk4+$ipa4)/4;
                $rata5 = ($bin5+$big5+$mtk5+$ipa5)/4;
                $sum = $bin1+$big1+$mtk1+$ipa1+$bin2+$big2+$mtk2+$ipa2+$bin3+$big3+$mtk3+$ipa3+$bin4+$big4+$mtk4+$ipa4+$bin5+$big5+$mtk5+$ipa5;
                
            $data = [
                'nama'             => $this->input->post('nama', true),
                'tempat_lahir'     => $this->input->post('tempat_lahir', true),
                'tgl_lahir'        => $this->input->post('tgl_lahir', true),
                'bln_lahir'        => $this->input->post('bln_lahir', true),
                'thn_lahir'        => $this->input->post('thn_lahir', true),
                'jk'               => $this->input->post('jk', true),
                'agama'            => $this->input->post('agama', true),
                'penerima_kip'     => $this->input->post('penerima_kip', true),
                'alamat_jalan'     => $this->input->post('alamat_jalan', true),
                'rt'               => $this->input->post('rt', true),
                'rw'               => $this->input->post('rw', true),
                'desa'             => $this->input->post('desa', true),
                'kecamatan'        => $this->input->post('kecamatan', true),
                'sekolah_asal'     => $this->input->post('sekolah_asal', true),
                'tahun_lulus'      => $this->input->post('tahun_lulus', true),
                'jurusan1'         => $this->input->post('jurusan1', true),
                'jurusan2'         => $this->input->post('jurusan2', true),
                'email'            => $this->input->post('email', true),
                'bin1'             => $bin1,
                'big1'             => $big1,
                'mtk1'             => $mtk1,
                'ipa1'             => $ipa1,
                'bin2'             => $bin2,
                'big2'             => $big2,
                'mtk2'             => $mtk2,
                'ipa2'             => $ipa2,
                'bin3'             => $bin3,
                'big3'             => $big3,
                'mtk3'             => $mtk3,
                'ipa3'             => $ipa3,
                'bin4'             => $bin4,
                'big4'             => $big4,
                'mtk4'             => $mtk4,
                'ipa4'             => $ipa4,
                'bin5'             => $bin5,
                'big5'             => $big5,
                'mtk5'             => $mtk5,
                'ipa5'             => $ipa5,
                'rata1'            => $rata1,
                'rata2'            => $rata2,
                'rata3'            => $rata3,
                'rata4'            => $rata4,
                'rata5'            => $rata5,
                'sum'              => $sum,
                'tingkat_prestasi' => $this->input->post('tingkat_prestasi', true),
                'juara_prestasi'   => $this->input->post('juara_prestasi', true),
                'bidang_prestasi'  => $this->input->post('bidang_prestasi', true),
                'nama_prestasi'    => $this->input->post('nama_prestasi', true),
                'benar'    => $this->input->post('benar', true),
            ];

            $simpan = $this->s->lengkapidata($data);

            $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Data berhasil disimpan.');
            $this->session->set_flashdata('jenis', 'alert-success');
            redirect('siswa','refresh');
            
        }
        
    }

    function uplodfoto()
    {
        $simpan = $this->s->uplodfoto();
        if ($simpan == 'success') {
            # code...
            redirect('siswa','refresh');
        } 

    }

    function uplodkk()
    {
        $simpan = $this->s->uplodkk();
        if ($simpan == 'success') {
            # code...
            redirect('siswa','refresh');
        } 

    }

    function uplodraport()
    {
        $simpan = $this->s->uplodraport();
        if ($simpan == 'success') {
            # code...
            redirect('siswa','refresh');
        } 

    }

    function uplodprestasi()
    {
        $simpan = $this->s->uplodprestasi();
        if ($simpan == 'success') {
            # code...
            redirect('siswa','refresh');
        } 

    }
    

    function cetakbuktidaftar($status = null)
    {
        function tglindo($tgl)
        {
            $tgl = date('d m Y');
            $tg = substr($tgl,0,2);
            $b  = substr($tgl,3,2);
            $th = substr($tgl,6,4);
            if ($b == '01') { $bl = 'Januari'; } elseif ($b == '02') {$bl = 'Februari';} elseif ($b == '03') {$bl = 'Maret';} elseif ($b == '04') {$bl = 'April';} elseif ($b == '05') {$bl = 'Mei';} elseif ($b == '06') {$bl = 'Juni';} elseif ($b == '07') {$bl = 'Juli';} elseif ($b == '08') {$bl = 'Agustus';} elseif ($b == '09') {$bl = 'September';} elseif ($b == '10') {$bl = 'Oktober';}elseif ($b == '11') {$bl = 'November';} elseif ($b == '12') {$bl = 'Desember';}
            return $tg.' '.$bl.' '.$th;
        }
        $sekolah = $this->db->get('tbl_sekolah')->row_array();
        
        $siswa = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($siswa['jk'] == '1') {
            $jk = 'Laki - laki';
        } else {
            $jk = 'Perempuan';
        }

        if ($siswa['tingkat_prestasi'] !='') {
            $tingkat = $siswa['tingkat_prestasi'];
        } else {
            $tingkat = '-';
        }

        if ($siswa['juara_prestasi'] !='') {
            $juara = $siswa['juara_prestasi'];
        } else {
            $juara = '-';
        }

        if ($siswa['bidang_prestasi'] !='') {
            $bidang = $siswa['bidang_prestasi'];
        } else {
            $bidang = '-';
        }

        if ($siswa['nama_prestasi'] !='') {
            $prestasi = $siswa['nama_prestasi'];
        } else {
            $prestasi = '-';
        }

        if ($siswa['foto'] != '') {
            $foto = $siswa['foto'];
        } else {
            $foto = 'default.png';
        }
        

        require(APPPATH.'/libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(10,5,10);
        $pdf->Image('./assets/images/logo/'.$sekolah['logo'],10,5,20);
        $pdf->Cell(30,0,'',0);
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(160,8,'PEMERINTAH PROVINSI '.strtoupper($sekolah['provinsi']),0, 0 , 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(30,0,'',0);
        $pdf->Cell(160,7,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0 , 0 , 'C');
        $pdf->Ln(5);
        $pdf->Cell(30,0,'',0);
        $pdf->Cell(160,7,strtoupper($sekolah['nama_sekolah']),0 , 0 , 'C');
        $pdf->Ln(5);
        $pdf->Cell(30,0,'',0);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(160,6,$sekolah['alamat'].'' .$sekolah['kota'].' Tlp. '.$sekolah['tlp_sekolah'],0,0,'C');
        $pdf->Ln(7);
        $pdf->Cell(190,0,'',1);
        $pdf->Ln(0.5);
        $pdf->Cell(190,0,'',1);

        $pdf->Ln(5);
        $pdf->SetFont('Times','BU',14);
        $pdf->Cell(190,0,'BUKTI PENDAFTARAN',0,0,'C');
        $pdf->Ln(10);
        $pdf->SetFont('Times','',11);
        $pdf->Cell(190,4,'Saya yang bertanda tangan di bawah ini:',0,0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Nama',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['nama'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'NISN',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['nisn'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Tempat, Tgl Lahir',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['tempat_lahir'].', '.$siswa['tgl_lahir'].' - '.$siswa['bln_lahir'].' - '.$siswa['thn_lahir'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Jenis Kelamin',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$jk,0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Agama',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['agama'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Sekolah Asal',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['sekolah_asal'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Tahun Lulus',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['tahun_lulus'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Penerima KIP',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['penerima_kip'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Alamat',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->MultiCell(125,4,$siswa['alamat_jalan'].' RT '.$siswa['rt'].' RW '.$siswa['rw'].' Desa '.$siswa['desa'].' Kecamatan '.$siswa['kecamatan'],0,'J');
        $pdf->Ln(1);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Pilihan Jurusan 1',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['jurusan1'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Pilihan Jurusan 2',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['jurusan2'],0,'J');
        
        $pdf->Ln(7);
        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(190,5,'Prestasi Non Akademik',0,0,'C');

        $pdf->Ln(7);
        $pdf->Cell(10,5,'');
        $pdf->SetFont('Times','',11);
        $pdf->Cell(50,4,'Prestasi Tingkat',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$tingkat,0,'J');

        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Juara ',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$juara,0,'J');

        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Bidang',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$bidang,0,'J');

        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Nama Kegiatan',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->MultiCell(125,4,$prestasi,0,'J');

        $pdf->Ln(5);
        $pdf->SetFont('Times','',11);
        $pdf->Multicell(190,5,'Menyatakan bahwa data di atas adalah benar dan dapat dipertanggungjawabkan. Jika dikemudian hari ditemukan adanya kecurangan saya bersedia menerima konsekuensi termasuk dinyatakan gugur dari seleksi penerimaan peserta didik baru.',0,'J');

        $pdf->Ln(13);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(80,3.5,'a/n. '.$siswa['nama'], 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,$sekolah['kota'].', '.tglindo(date('d m Y')), 0, 0, 'C');
        $pdf->Image('./uploads/foto/'.$foto,115,165,20, 30);
        
        $pdf->Ln(3.5);
        $pdf->Cell(80,3.5,'menyetujui data di atas', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,'menyetujui data di atas', 0, 0, 'C');

        $pdf->Ln(3.5);
        $pdf->Cell(80,3.5,'Ortu / Wali Calon Peserta Didik', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,'Calon Peserta Didik', 0, 0, 'C');

        $pdf->Ln(20);
        $pdf->Cell(80,3.5,'............................ ', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,$siswa['nama'], 0, 0, 'C');

        // Position at 1.5 cm from bottom
        $pdf->SetY(-31);
        // Arial italic 8
        $pdf->SetFont('Arial','I',8);
        // Text color in gray
        $pdf->SetTextColor(128);
        // Page number
        $pdf->Cell(0,10,'File Bukti Pendaftaran Peserta Didik Baru. '. $siswa['nama']);

        if ($status == null) {
            # code...
            $pdf->Output();
            $pdf->Output('./buktidaftar/'.$siswa['nisn'].'.pdf', 'F');
        } else {
            # code...
            $pdf->Output('./buktidaftar/'.$siswa['nisn'].'.pdf', 'F');
            redirect('siswa/kirimbuktidaftar','refresh');
                      
        }
        
    }

    function kirimbuktidaftar()
    {
        $content = file_exists('./buktidaftar/'.$this->session->userdata('nisn').'.pdf');
        $file = base_url().'./buktidaftar/'.$this->session->userdata('nisn').'.pdf';


        if ($content == 1) {

            $sekolah = $this->db->get('tbl_sekolah',1)->row_array();
            $e = $sekolah['kirim_mail'];
            $pe = base64_decode($sekolah['pass_mail']);
            $smtp_host = 'ssl://'.$sekolah['smtp_host'];
            $smtp_port = $sekolah['smtp_port'];

            $sis = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
            
            $this->load->library('email');

            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= $smtp_host;
            $config['smtp_port']= $smtp_port;
            $config['smtp_timeout']= "400";
            $config['smtp_user']= $e;
            $config['smtp_pass']= $pe;
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            
            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);
            
            //konfigurasi pengiriman
            $this->email->from($e);
            $this->email->to($sis['email']);
            $this->email->subject("Bukti Pendaftaran");
            $this->email->message('Terimakasih telah menyelesaikan proses pendaftaran peserta didik baru di '.$sekolah['nama_sekolah'].'. Silahkan simpan bukti pendaftaran berikut sebagai bukti bahwa anda telah melakukan pendaftaran secara online. Untuk informasi lebih lanjut silahkan hubungi nomor tlp yang tertera di '.site_url());
            
            $this->email->attach($file);

            if ($this->email->send()) {

                $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Email berhasil dikirim.');
                $this->session->set_flashdata('jenis', 'alert-success');
                redirect('siswa','refresh');
                
            } else {
                $this->session->set_flashdata('pesan', '<strong>Maaf..</strong> Email gagal dikirim.');
                $this->session->set_flashdata('jenis', 'alert-danger');
                redirect('siswa','refresh');
            }

        } else {
            $this->cetakbuktidaftar('belum');         
            redirect('siswa','refresh');
            
        }
        

        
    }

    function daftarulang() {

        must_siswa();

        $data['siswa'] = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($data['siswa']['seleksi'] != '1' || $data['siswa']['jur'] == '') { redirect('','refresh');}

        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        if ($data['sekolah']['bt'] != '4') { redirect('','refresh');}

		$data['agama'] = array('1' => ['01','Islam'], ['02','Kristen'], ['03','Protestan'], ['04','Hindu'], ['05','Budha']);
		$data['transportasi'] = array('1' => ['01','Jalan kaki'], ['02','Kendaraan pribadi'], ['03','Kendaraan umum/angkot'], ['04','Jemputan sekolah'],['05','Kereta api'],['06','Andong/Bendi/Dokar/Beca'],['07','Perahu/Rakit/Getek'],['99','Lainnya']);
		$data['inklusi'] = array('1' =>	['01','Tidak Ada'],['02','Netra (A)'],['03','Rungu (B)'],['04','Grahita ringan (C)'],['05','Grahita sedang (C1)'],['06','Daksa ringan (D)'],['07','Daksa sedang (D1)'],['08','Laras (E)'],['09','wicara (F)'],['10','Tuna ganda (G)'],['11','Hiper aktif (H)'],['12','Cerdas istimewa (i)'],['13','Bakat istimewa (J)'],['14','Kesulitan belajar (K)'],['15','Narkoba (N)'],['16','Indigo (o)'],['17','Down sindrome (P)'],['18','Autis (Q)']);
        

        $this->load->view('student/meta', $data);
        $this->load->view('student/navbar');
        $this->load->view('student/subnavbar');
        $this->load->view('student/pribadi');
        $this->load->view('student/footer');
        $this->load->view('student/script');

    }

    function simpanpribadi() {
         
        $data = [
            'nama'            => $this->input->post('nama', true),
            'jk'              => $this->input->post('jk', true),
            'tempat_lahir'    => $this->input->post('tempat_lahir', true),
            'tgl_lahir'       => $this->input->post('tgl_lahir', true),
            'bln_lahir'       => $this->input->post('bln_lahir', true),
            'thn_lahir'       => $this->input->post('thn_lahir', true),
            'nik'             => $this->input->post('nik', true),
            'no_akta'         => $this->input->post('no_akta', true),
            'agama'           => $this->input->post('agama', true),
            'kewarganegaraan' => $this->input->post('kewarganegaraan', true),
            'inklusi'         => $this->input->post('inklusi', true),
            'alamat_jalan'    => $this->input->post('alamat_jalan', true),
            'rt'              => $this->input->post('rt', true),
            'rw'              => $this->input->post('rw', true),
            'dusun'           => $this->input->post('dusun', true),
            'desa'            => $this->input->post('desa', true),
            'kecamatan'       => $this->input->post('kecamatan', true),
            'kode_pos'        => $this->input->post('kode_pos', true),
            'transportasi'    => $this->input->post('transportasi', true),
            'anak_ke'         => $this->input->post('anak_ke', true),
            'nomor_tlp'       => $this->input->post('nomor_tlp', true),
            'nomor_hp'        => $this->input->post('nomor_hp', true),
            'email'           => $this->input->post('email', true),
            'ekskul'          => $this->input->post('ekskul', true),
        ];  
        
        $simpan = $this->s->daftarulang($data);

        $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Data berhasil disimpan.');
        $this->session->set_flashdata('jenis', 'alert-success');
        redirect('siswa/daftarulang','refresh');
    }

    function ortu() {
        must_siswa();

        $data['siswa'] = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($data['siswa']['seleksi'] != '1' || $data['siswa']['jur'] == '') { redirect('','refresh');}

        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        if ($data['sekolah']['bt'] != '4') { redirect('','refresh');}
        
        $data['inklusi'] = array('1' =>	['01','Tidak Ada'],['02','Netra (A)'],['03','Rungu (B)'],['04','Grahita ringan (C)'],['05','Grahita sedang (C1)'],['06','Daksa ringan (D)'],['07','Daksa sedang (D1)'],['08','Laras (E)'],['09','wicara (F)'],['10','Tuna ganda (G)'],['11','Hiper aktif (H)'],['12','Cerdas istimewa (i)'],['13','Bakat istimewa (J)'],['14','Kesulitan belajar (K)'],['15','Narkoba (N)'],['16','Indigo (o)'],['17','Down sindrome (P)'],['18','Autis (Q)']);

		$data['pendidikan'] = array('1' => ['01','Tidak Sekolah'],['02','Putus SD'],['03','SD Sederajat'],['04','SMP Sederajat'],['05','SMA Sederajat'],['06','Diploma 1 (D1)'],['07','Diploma 2 (D2)'],['08','Diploma 3 (D3)'],['09','Diploma 4 (D4) / Sarjana (S1)'],['10','Magister (S2)'],['11','Doktor (S3)']);

		$data['pekerjaan'] = array('1' => ['01','Tidak bekerja'],['02','Nelayan'],['03','Petani'],['04','Peternak'],['05','PNS/TNI/POLRI'],['06','Karyawan'],['07','Pedagang Kecil'],['08','Pedagang Besar'],['09','Wiraswasta'],['10','Wirausaha'],['11','Buruh'],['12','Pensiunan'],['13','Meninggal Dunia'],['99','Lain-lain']);

		$data['penghasilan'] = array('1' => ['01','Kurang dari 500,000'],['02','500.000 - 999.9999'],['03','1 juta - 1.999.999'],['04','2 juta - 4.999.999'],['05','juta - 20 juta'],['06','lebih dari 20 juta'],['07','Tidak Berpenghasilan']);
        

        $this->load->view('student/meta', $data);
        $this->load->view('student/navbar');
        $this->load->view('student/subnavbar');
        $this->load->view('student/ortu');
        $this->load->view('student/footer');
        $this->load->view('student/script');
    }

    function simpanortu() {
        
        $data = [
            'nama_ayah_kandung'     => $this->input->post('nama_ayah_kandung', true),
            'nik_ayah'              => $this->input->post('nik_ayah', true),
            'tahun_lahir_ayah'      => $this->input->post('tahun_lahir_ayah', true),
            'pendidikan_ayah'       => $this->input->post('pendidikan_ayah', true),
            'pekerjaan_ayah'        => $this->input->post('pekerjaan_ayah', true),
            'penghasilan_ayah'      => $this->input->post('penghasilan_ayah', true),
            'kebutuhan_khusus_ayah' => $this->input->post('kebutuhan_khusus_ayah', true),
            'nama_ibu_kandung'      => $this->input->post('nama_ibu_kandung', true),
            'nik_ibu'               => $this->input->post('nik_ibu', true),
            'tahun_lahir_ibu'       => $this->input->post('tahun_lahir_ibu', true),
            'pendidikan_ibu'        => $this->input->post('pendidikan_ibu', true),
            'pekerjaan_ibu'         => $this->input->post('pekerjaan_ibu', true),
            'penghasilan_ibu'       => $this->input->post('penghasilan_ibu', true),
            'kebutuhan_khusus_ibu'  => $this->input->post('kebutuhan_khusus_ibu', true),
            'nama_wali'             => $this->input->post('nama_wali', true),
            'nik_wali'              => $this->input->post('nik_wali', true),
            'tahun_lahir_wali'      => $this->input->post('tahun_lahir_wali', true),
            'pendidikan_wali'       => $this->input->post('pendidikan_wali', true),
            'pekerjaan_wali'        => $this->input->post('pekerjaan_wali', true),
            'penghasilan_wali'      => $this->input->post('penghasilan_wali', true),
        ];

        $simpan = $this->s->daftarulang($data);

        $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Data berhasil disimpan.');
        $this->session->set_flashdata('jenis', 'alert-success');
        redirect('siswa/ortu','refresh');
    }

    function ekonomi() {
        must_siswa();

        $data['siswa'] = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($data['siswa']['seleksi'] != '1' || $data['siswa']['jur'] == '') { redirect('','refresh');}

        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        if ($data['sekolah']['bt'] != '4') { redirect('','refresh');}

        $data['layakpip'] = array('1' => ['01','Pemegang PKH/KPS/KIP'],['02','Penerima BSM 2014'],['03','Yatim Piatu/Panti Asuhan/Panti Sosial'],['04','Dampak Bencana Alam'],['05','Pernah Drop OUT'],['06','Siswa Miskin/Rentan Miskin'],['07','Daerah Konflik'],['08','Keluarga Terpidna'],['09','Kelainan Fisik']);

        $this->load->view('student/meta', $data);
        $this->load->view('student/navbar');
        $this->load->view('student/subnavbar');
        $this->load->view('student/ekonomi');
        $this->load->view('student/footer');
        $this->load->view('student/script');
    }

    function simpanekonomi() {
        
        $data = [
            'no_kks'           => $this->input->post('no_kks', true),
            'terima_kps'       => $this->input->post('terima_kps', true),
            'no_kps'           => $this->input->post('no_kps', true),
            'usul_pip'         => $this->input->post('usul_pip', true),
            'alasan_layak_pip' => $this->input->post('alasan_layak_pip', true),
            'penerima_kip'     => $this->input->post('penerima_kip', true),
            'nomor_kip'        => $this->input->post('nomor_kip', true),
            'nama_kip'         => $this->input->post('nama_kip', true),
            'terima_fisik_kip' => $this->input->post('terima_fisik_kip', true),
        ];

        $simpan = $this->s->daftarulang($data);

        $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Data berhasil disimpan.');
        $this->session->set_flashdata('jenis', 'alert-success');
        redirect('siswa/ekonomi','refresh');

    }

    function periodik(){
        must_siswa();

         $data['siswa'] = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($data['siswa']['seleksi'] != '1' || $data['siswa']['jur'] == '') { redirect('','refresh');}

        $data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
        if ($data['sekolah']['bt'] != '4') { redirect('','refresh');}
        
        $this->load->view('student/meta', $data);
        $this->load->view('student/navbar');
        $this->load->view('student/subnavbar');
        $this->load->view('student/periodik');
        $this->load->view('student/footer');
        $this->load->view('student/script');
    }

    function simpanperiodik() {
        
        $data = [
            'tinggi_badan'   => $this->input->post('tinggi_badan', true),
            'berat_badan'    => $this->input->post('berat_badan', true),
            'jenis_jarak'    => $this->input->post('jenis_jarak', true),
            'jarak'          => $this->input->post('jarak', true),
            'waktu_jam'      => $this->input->post('waktu_jam', true),
            'waktu_menit'    => $this->input->post('waktu_menit', true),
            'jumlah_saudara' => $this->input->post('jumlah_saudara', true),
        ];

        $simpan = $this->s->daftarulang($data);

        $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Data berhasil disimpan.');
        $this->session->set_flashdata('jenis', 'alert-success');
        redirect('siswa/periodik','refresh');
    }

    function cetakbuktidaftarulang($status = null)
    {
        function tglindo($tgl)
        {
            $tgl = date('d m Y');
            $tg = substr($tgl,0,2);
            $b  = substr($tgl,3,2);
            $th = substr($tgl,6,4);
            if ($b == '01') { $bl = 'Januari'; } elseif ($b == '02') {$bl = 'Februari';} elseif ($b == '03') {$bl = 'Maret';} elseif ($b == '04') {$bl = 'April';} elseif ($b == '05') {$bl = 'Mei';} elseif ($b == '06') {$bl = 'Juni';} elseif ($b == '07') {$bl = 'Juli';} elseif ($b == '08') {$bl = 'Agustus';} elseif ($b == '09') {$bl = 'September';} elseif ($b == '10') {$bl = 'Oktober';}elseif ($b == '11') {$bl = 'November';} elseif ($b == '12') {$bl = 'Desember';}
            return $tg.' '.$bl.' '.$th;
        }
        $sekolah = $this->db->get('tbl_sekolah')->row_array();
        
        $siswa = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
        if ($siswa['jk'] == '1') {
            $jk = 'Laki - laki';
        } else {
            $jk = 'Perempuan';
        }

        if ($siswa['tingkat_prestasi'] !='') {
            $tingkat = $siswa['tingkat_prestasi'];
        } else {
            $tingkat = '-';
        }

        if ($siswa['juara_prestasi'] !='') {
            $juara = $siswa['juara_prestasi'];
        } else {
            $juara = '-';
        }

        if ($siswa['bidang_prestasi'] !='') {
            $bidang = $siswa['bidang_prestasi'];
        } else {
            $bidang = '-';
        }

        if ($siswa['nama_prestasi'] !='') {
            $prestasi = $siswa['nama_prestasi'];
        } else {
            $prestasi = '-';
        }

        if ($siswa['foto'] != '') {
            $foto = $siswa['foto'];
        } else {
            $foto = 'default.png';
        }
        

        require(APPPATH.'/libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(10,5,10);
        $pdf->Image('./assets/images/logo/'.$sekolah['logo'],10,10,30);
        $pdf->Cell(30,0,'',0);
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(160,8,'PEMERINTAH PROVINSI '.strtoupper($sekolah['provinsi']),0, 0 , 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(30,0,'',0);
        $pdf->Cell(160,7,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0 , 0 , 'C');
        $pdf->Ln(5);
        $pdf->Cell(30,0,'',0);
        $pdf->Cell(160,7,strtoupper($sekolah['nama_sekolah']),0 , 0 , 'C');
        $pdf->Ln(5);
        $pdf->Cell(30,0,'',0);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(160,6,$sekolah['alamat'].'' .$sekolah['kota'].' Tlp. '.$sekolah['tlp_sekolah'],0,0,'C');
        $pdf->Ln(7);
        $pdf->Cell(190,0,'',1);
        $pdf->Ln(0.5);
        $pdf->Cell(190,0,'',1);

        $pdf->Ln(5);
        $pdf->SetFont('Times','BU',14);
        $pdf->Cell(190,0,'BUKTI PENDAFTARAN ULANG',0,0,'C');
        $pdf->Ln(10);
        $pdf->SetFont('Times','',11);
        $pdf->Cell(190,4,'Saya yang bertanda tangan di bawah ini:',0,0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Nama',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['nama'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'NISN',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['nisn'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Tempat, Tgl Lahir',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['tempat_lahir'].', '.$siswa['tgl_lahir'].' - '.$siswa['bln_lahir'].' - '.$siswa['thn_lahir'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Jenis Kelamin',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$jk,0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Agama',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['agama'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Sekolah Asal',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['sekolah_asal'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Tahun Lulus',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['tahun_lulus'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Penerima KIP',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['penerima_kip'],0,'J');
        $pdf->Ln(5);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Alamat',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->MultiCell(125,4,$siswa['alamat_jalan'].' RT '.$siswa['rt'].' RW '.$siswa['rw'].' Desa '.$siswa['desa'].' Kecamatan '.$siswa['kecamatan'],0,'J');
        $pdf->Ln(1);
        $pdf->Cell(10,4,'');
        $pdf->Cell(50,4,'Diterima di Jurusan',0,'J');
        $pdf->Cell(5,4,':',0,'J');
        $pdf->Cell(125,4,$siswa['jurusan1'],0,'J');      

        $pdf->Ln(7);
        $pdf->SetFont('Times','',11);
        $pdf->Multicell(190,5,'Telah melakukan daftar ulang dengan memasukkan data yang sebenarnya. Jika dikemudian hari ditemukan adanya kecurangan saya bersedia menerima konsekuensi termasuk dinyatakan gugur dari seleksi penerimaan peserta didik baru.',0,'J');

        $pdf->Ln(13);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(80,3.5,'a/n. '.$siswa['nama'], 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,$sekolah['kota'].', '.tglindo(date('d m Y')), 0, 0, 'C');
        $pdf->Image('./uploads/foto/'.$foto,115,128,20, 30);
        
        $pdf->Ln(3.5);
        $pdf->Cell(80,3.5,'menyetujui data di atas', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,'menyetujui data di atas', 0, 0, 'C');

        $pdf->Ln(3.5);
        $pdf->Cell(80,3.5,'Ortu / Wali Calon Peserta Didik', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,'Calon Peserta Didik', 0, 0, 'C');

        $pdf->Ln(20);
        $pdf->Cell(80,3.5,'............................ ', 0, 0, 'C');
        $pdf->Cell(30,3.5,'', 0, 0, 'C');
        $pdf->Cell(80,3.5,$siswa['nama'], 0, 0, 'C');

        // Position at 1.5 cm from bottom
        $pdf->SetY(-31);
        // Arial italic 8
        $pdf->SetFont('Arial','I',8);
        // Text color in gray
        $pdf->SetTextColor(128);
        // Page number
        $pdf->Cell(0,10,'File Bukti Pendaftaran Peserta Didik Baru. '. $siswa['nama']);

        if ($status == null) {
            # code...
            $pdf->Output();
            $pdf->Output('./buktidaftar/du_'.$siswa['nisn'].'.pdf', 'F');
        } else {
            # code...
            $pdf->Output('./buktidaftar/du_'.$siswa['nisn'].'.pdf', 'F');
            redirect('siswa/kirimbuktidaftarulang','refresh');
                      
        }
        
    }

    function kirimbuktidaftarulang()
    {
        $content = file_exists('./buktidaftar/du_'.$this->session->userdata('nisn').'.pdf');
        $file = base_url().'./buktidaftar/du_'.$this->session->userdata('nisn').'.pdf';


        if ($content == 1) {

            $sekolah = $this->db->get('tbl_sekolah',1)->row_array();
            $e = $sekolah['kirim_mail'];
            $pe = base64_decode($sekolah['pass_mail']);
            $smtp_host = 'ssl://'.$sekolah['smtp_host'];
            $smtp_port = $sekolah['smtp_port'];

            $sis = $this->db->get_where('tbl_registrasi', ['nisn' => $this->session->userdata('nisn')])->row_array();
            
            $this->load->library('email');

            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= $smtp_host;
            $config['smtp_port']= $smtp_port;
            $config['smtp_timeout']= "400";
            $config['smtp_user']= $e;
            $config['smtp_pass']= $pe;
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            
            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);
            
            //konfigurasi pengiriman
            $this->email->from($e);
            $this->email->to($sis['email']);
            $this->email->subject("Bukti Pendaftaran");
            $this->email->message('Terimakasih telah menyelesaikan proses daftar ulang peserta didik baru di '.$sekolah['nama_sekolah'].'. Silahkan simpan bukti daftar ulang berikut');
            
            $this->email->attach($file);

            if ($this->email->send()) {

                $this->session->set_flashdata('pesan', '<strong>Alhamdulillah..</strong> Email berhasil dikirim.');
                $this->session->set_flashdata('jenis', 'alert-success');
                redirect('siswa/daftarulang','refresh');
                
            } else {
                $this->session->set_flashdata('pesan', '<strong>Maaf..</strong> Email gagal dikirim.');
                $this->session->set_flashdata('jenis', 'alert-danger');
                redirect('siswa/daftarulang','refresh');
            }

        } else {
            $this->cetakbuktidaftar('belum');         
            redirect('siswa/daftarulang','refresh');
            
        }
        

        
    }



}

/* End of file Siswa.php */
