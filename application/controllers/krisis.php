<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Krisis extends CI_controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_krisis');
        $this->load->model('KrisisModel');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $x = array(
            'judul' => 'Data krisis',
        );
        tpl('v_krisis', $x);
    }

    public function krisis_tambah($value = '')
    {
        $x = array(
            'judul'       => 'Tambah Data',
            'aksi'        => 'tambah',
            'upt' => '',
            'ultg'    => '',
            'penghantar' => '',
            'kv'    => '',
            'tower' => '',
            'tgl'    => '',
            'update' => '',
            'jenis' => '',
            'kkp'    => '',
            'kelling' => '',
            'kelfo'    => '',
            'kelpo' => '',
            'skoli'    => '',
            'skopo' => '',
            'skohu'    => '',
            'klali' => '',
            'klapo' => '',
            'klahu'    => '',
            'anomali' => '',
            'tautan'    => '',
            'risiko' => '',
            'mitigasi'   => '',
            'penanganan'   => '',
            'foto1'      => '',
            'foto2'      => '',
            'foto3'      => '',
            'foto4'      => '',
            'keterangan'   => ''
        );
        if (isset($_POST['kirim'])) {

            $config['upload_path'] = './template/data/';
            $config['allowed_types'] = 'bmp|jpg|png|jpeg';
            $config['file_name'] = 'foto_' . time();
            $this->load->library('upload', $config);
            //$this->upload->initialize($config);  

            $this->upload->do_upload('file1');
            $file1 = $this->upload->data();
            $this->upload->do_upload('file2');
            $file2 = $this->upload->data();
            $this->upload->do_upload('file3');
            $file3 = $this->upload->data();
            $this->upload->do_upload('file4');
            $file4 = $this->upload->data();

            $upload = true;

            if ($upload) {
                $SQLinsert = array(
                    'upt' => $this->input->post('upt'),
                    'ultg' => $this->input->post('ultg'),
                    'penghantar' => $this->input->post('penghantar'),
                    'kv' => $this->input->post('kv'),
                    'foto1' => $file1['file_name'],
                    'foto2' => $file2['file_name'],
                    'foto3' => $file3['file_name'],
                    'foto4' => $file4['file_name'],
                    'tower' => $this->input->post('tower'),
                    'tgl' => $this->input->post('tgl'),
                    'update' => $this->input->post('update'),
                    'jenis' => $this->input->post('jenis'),
                    'kkp' => $this->input->post('kkp'),
                    'kelling' => $this->input->post('kelling'),
                    'kelpo' => $this->input->post('kelpo'),
                    'kelfo' => $this->input->post('kelfo'),
                    'penanganan' => $this->input->post('penanganan'),
                    'skoli' => $this->input->post('skoli'),
                    'skopo' => $this->input->post('skopo'),
                    'skohu' => $this->input->post('skohu'),
                    'klali' => $this->input->post('klali'),
                    'klapo' => $this->input->post('klapo'),
                    'klahu' => $this->input->post('klahu'),
                    'anomali' => $this->input->post('anomali'),
                    'tautan' => $this->input->post('tautan'),
                    'risiko' => $this->input->post('risiko'),
                    'mitigasi' => $this->input->post('mitigasi'),
                    'keterangan' => $this->input->post('keterangan')

                );
                $cek = $this->db->insert('krisis', $SQLinsert);
                if ($cek) {
                    $pesan = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                       Data Berhasil Di Tambahkan.
                      </div>';
                    $this->session->set_flashdata('pesan', $pesan);
                    redirect(base_url('v_krisis'));
                } else {
                    echo "QUERY SQL ERROR";
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            tpl('admin/krisis_form', $x);
        }
    }

    public function krisis_edit($id = '')
    {
        $data = $this->db->get_where('krisis', array('id_krisis' => $id))->row_array();
        $x = array(
            'judul'        => 'Tambah Data',
            'aksi'        => 'tambah',
            'upt'=>$data['upt'],
        'ultg'    =>$data['ultg'],
        'penghantar'=>$data['penghantar'],
        'kv'    =>$data['kv'],
        'tgl'=>$data['tgl'],
        'update'=>$data['update'],
        'jenis'=>$data['jenis'],
        'tower'=>$data['tower'],
        'foto1'=>$data['foto1'],
        'foto2'=>$data['foto2'],
        'foto3'=>$data['foto3'],
        'foto4'=>$data['foto4'],
        'kkp'    =>$data['kkp'],
        'kelling'=>$data['kelling'],
        'kelfo'    =>$data['kelfo'],
        'kelpo'    =>$data['kelpo'],
        'skoli'    =>$data['skoli'],
        'skopo'=>$data['skopo'],
        'skohu'    =>$data['skohu'],
        'klali'    =>$data['klali'],
        'klapo'    =>$data['klapo'],
        'klahu'    =>$data['klahu'],
        'anomali'    =>$data['anomali'],
        'tautan'    =>$data['tautan'],
        'risiko'=>$data['risiko'],
        'mitigasi'    =>$data['mitigasi'],
        'penanganan'=>$data['penanganan'],
        'keterangan'=>$data['keterangan'] 
        );
        if (isset($_POST['kirim'])) {

            // if(empty($_FILES['file']['name'])){
            //   $this->session->set_flashdata('pesan',$pesan);
            //   redirect(base_url('admin/krisis'));
            // }else{
            $config['upload_path'] = './template/data/';
            $config['allowed_types'] = 'bmp|jpg|png|jpeg';
            $config['file_name'] = 'foto_' . time();

            $this->load->library('upload', $config);

            $file1 = $data['foto1'];
            if (!empty($_FILES['file1']['name'])) {
                # code...
                $this->upload->do_upload('file1');
                $fil = $this->upload->data();
                $file1 = $fil['file_name'];
            }
            $file2 = $data['foto2'];
            if (!empty($_FILES['file2']['name'])) {
                # code...
                $this->upload->do_upload('file2');
                $fil = $this->upload->data();
                $file2 = $fil['file_name'];
            }
            $file3 = $data['foto3'];
            if (!empty($_FILES['file3']['name'])) {
                # code...
                $this->upload->do_upload('file3');
                $fil = $this->upload->data();
                $file3 = $fil['file_name'];
            }
            $file4 = $data['foto4'];
            if (!empty($_FILES['file4']['name'])) {
                # code...
                $this->upload->do_upload('file4');
                $fil = $this->upload->data();
                $file4 = $fil['file_name'];
            }

            if (true) {
                $SQLinsert = array(
                    'upt' => $this->input->post('upt'),
                    'ultg' => $this->input->post('ultg'),
                    'penghantar' => $this->input->post('penghantar'),
                    'kv' => $this->input->post('kv'),
                    'tgl' => $this->input->post('tgl'),
                    'update' => $this->input->post('update'),
                    'jenis' => $this->input->post('jenis'),
                    'tower' => $this->input->post('tower'),
                    'kkp' => $this->input->post('kkp'),
                    'kelling' => $this->input->post('kelling'),
                    'kelfo' => $this->input->post('kelfo'),
                    'kelpo' => $this->input->post('kelpo'),
                    'skoli' => $this->input->post('skoli'),
                    'skopo' => $this->input->post('skopo'),
                    'skohu' => $this->input->post('skohu'),
                    'klali' => $this->input->post('klali'),
                    'klahu' => $this->input->post('klahu'),
                    'klapo' => $this->input->post('klapo'),
                    'tautan' => $this->input->post('tautan'),
                    'risiko' => $this->input->post('risiko'),
                    'mitigasi' => $this->input->post('mitigasi'),
                    'penanganan' => $this->input->post('penanganan'),
                    'keterangan' => $this->input->post('keterangan'),
                    'foto1' => $file1,
                    'foto2' => $file2,
                    'foto3' => $file3,
                    'foto4' => $file4
                );
                $cek = $this->db->update('krisis', $SQLinsert, array('id_krisis' => $id));
                if ($cek) {
                    $pesan = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                          <h4><i class="icon fa fa-check"></i> Success!</h4>
                         Data Berhasil Di Edit.
                        </div>';
                    $this->session->set_flashdata('pesan', $pesan);
                    redirect(base_url('krisis'));
                } else {
                    echo "QUERY SQL ERROR";
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            tpl('admin/krisis_form', $x);
        }
    }

    public function krisis_hapus($id = '')
    {

        $foto = $this->db->get_where('krisis', array('id_krisis' => $id))->row_array();
        if ($foto['foto'] != "") {
            @unlink('template/data/' . $foto['foto']);
        } else {
        }
        $cek = $this->db->delete('krisis', array('id_krisis' => $id));
        if ($cek) {
            $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect(base_url('v_krisis'));
        }
    }

    public function details($id)
    {
        $data = array('id_krisis' => $id);
        $data = $this->m_admin->data_details($data)->result();
        $x = array(
            'judul' => 'Details Data',
            'data' => $data
        );
        tpl('admin/details', $x);
    }


    public function get_data()
    {
        $columns = [
            "id_krisis",
            "penghantar",
            "tower",
            "jenis",
            "klali",
            "klapo",
            "klahu",
        ];
        $columns_search = [
            "penghantar",
            "tower",
            "jenis",
        ];
        $draw = intval($this->input->post("draw"));
        $where     = "";
        // $f_mmsi = $this->input->post("f_mmsi");
        // $where .= " AND fd.mmsi = '$f_mmsi' ";

        $search = $this->input->post("search");
        $search = $search['value'];
        if (isset($search) && $search != "") {
            $where .= "AND (";
            for ($i = 0; $i < count($columns_search); $i++) {
                $where .= " LOWER(" . $columns_search[$i] . ") LIKE LOWER('%" . ($search) . "%') OR ";
            }
            $where = substr_replace($where, "", -3);
            $where .= ')';
        }
        $totalRecords = $this->m_krisis->get_total($where);
        $length = intval($this->input->post("length"));
        $length = $length < 0 ? $totalRecords : $length;
        $start = intval($this->input->post("start"));
        if (isset($start) && $length != '-1') {
            $limit = "limit " . intval($length) . " offset " . intval($start);
        }
        $records = array();
        $records["data"] = array();
        $order = $this->input->post("order");
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        if (!isset($columns[$col])) {
            $order = null;
        } else {
            $order = "ORDER BY " . $columns[$col] . " " . $dir;
        }

        $data = $this->m_krisis->get_data($columns, $where, $order, $limit);
        $no   = 1 + $start;
        foreach ($data as $row) {
            $action = "";
            $id = $row->id_krisis;
            // $isi = "$id|$row->group_name|$row->group_aktif";

            $klali = $klapo = $klahu = "";

            if ($row->klali == 1) {
                $klali = "AMAN";
            } elseif ($row->klali == 2) {
                $klali = "WASPADA";
            } elseif ($row->klali == 3) {
                $klali = "KRITIS";
            } else {
                $klali = "BELUM DIASESMENT";
            }

            if ($row->klapo == 1) {
                $klapo = "AMAN";
            } elseif ($row->klapo == 2) {
                $klapo = "WASPADA";
            } elseif ($row->klapo == 3) {
                $klapo = "KRITIS";
            } else {
                $klapo = "BELUM DIASESMENT";
            }

            if ($row->klahu == 1) {
                $klahu = "ATAS NORMAL";
            } else {
                $klahu = "BELUM DIASESMENT";
            }

            $action = '<a href="' . base_url('krisis/krisis_edit/' . $id) . '" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;<a href="' . base_url('krisis/krisis_hapus/' . $id) . '" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="' . base_url('krisis/details/' . $id) . '" class="btn btn-success btn-md" title="Rincian"><i class="fa fa-eye"></a>';
            $records["data"][] = array(
                $no++,
                $row->penghantar,
                $row->tower,
                $row->jenis,
                $klali,
                $klapo,
                $klahu,
                $action,
            );
        }

        $records["draw"] = $draw;
        $records["recordsTotal"] = $totalRecords;
        $records["recordsFiltered"] = $totalRecords;

        echo json_encode($records);
    }

    public function form()
    {
        $data = array('judul' => 'Import Data'); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->m_admin->upload_file($this->filename);

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

        tpl('admin/form', $data);
    }

    public function import()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();

        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Kita push (add) array data ke variabel data
                $klahu = $klapo = $klali = 0;
                if (strtolower($row["P"]) == "aman") {
                    $klali = 1;
                } elseif (strtolower($row["P"]) == "waspada") {
                    $klali = 2;
                } elseif (strtolower($row["P"]) == "kritis") {
                    $klali = 3;
                } else {
                    $klali = 0;
                }

                if (strtolower($row["Q"]) == "aman") {
                    $klapo = 1;
                } elseif (strtolower($row["Q"]) == "waspada") {
                    $klapo = 2;
                } elseif (strtolower($row["Q"]) == "kritis") {
                    $klapo = 3;
                } else {
                    $klapo = 0;
                }

                if (strtolower($row["R"]) == "atas normal") {
                    $klahu = 1;
                } else {
                    $klahu = 0;
                }

                array_push($data, array(
                    'tgl' => date("Y-m-d", strtotime(str_replace("/", "-", $row['A']))),
                    'update' => date("Y-m-d", strtotime(str_replace("/", "-", $row['B']))),
                    'upt' => $row['C'],
                    'ultg' => $row['D'],
                    'penghantar' => $row['E'],
                    'kv' => $row['F'],
                    'tower' => $row['G'],
                    'jenis' => $row['H'],
                    'kkp' => $row['I'],
                    'kelling' => $row['J'],
                    'kelpo' => $row['K'],
                    'kelfo' => $row['L'],
                    'skoli' => $row['M'],
                    'skopo' => $row['N'],
                    'skohu' => $row['O'],
                    'klali' => $klali,
                    'klapo' => $klapo,
                    'klahu' => $klahu,
                    'anomali' => $row['S'],
                    'tautan' => $row['T'],
                    'penanganan' => $row['U'],
                    'keterangan' => $row['V'],
                    'risiko' => $row['W'],
                    'mitigasi' => $row['X'],
                    'foto1' => $row['Y'],
                    'foto2' => $row['Z'],
                    'foto3' => $row['AA'],
                    'foto4' => $row['AB']
                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->m_admin->insert_multiple($data);

        redirect("admin"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }

    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('PLN UIT JBTB UNIT INDUK')
            ->setLastModifiedBy('Fahmi')
            ->setTitle("Data Tower Krisis")
            ->setSubject("Tower Krisis")
            ->setDescription("Laporan Semua Data Tower Krisis")
            ->setKeywords("Data Tower");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA TOWER KRISIS"); // Set kolom A1 dengan tulisan 
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "Tanggal"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Update"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "No"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "UPT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "ULTG"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Penghantar"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "KV"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Tower"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Jenis"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "KKP"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "Assesmen Lingkungan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "Assesmen Pondasi"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "Kelengkapan Foto"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "Skor Lingkungan"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "Skor Pondasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "Skor Hujan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Klafisikasi Lingkungan"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('R3', "Klafisikasi Pondasi"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('S3', "Sifat Hujan"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('T3', "Anomali"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('U3', "Tautan"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('V3', "Penanganan"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('W3', "Keterangan"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('X3', "Risiko"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('Y3', "Mitigasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('Z3', "Foto1"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AA3', "Foto2"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('AB3', "Foto3"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('AC3', "Foto4"); // Set kolom C3 dengan tulisan "NAMA"


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
        $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AA3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AB3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $x = $this->KrisisModel->view();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($x as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->tgl);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->update);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->upt);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->ultg);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->penghantar);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->kv);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->tower);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->jenis);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->kkp);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->kelling);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->kelpo);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->kelfo);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->skoli);
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data->skopo);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->skohu);
            $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->klali);
            $excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data->klapo);
            $excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data->klahu);
            $excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data->anomali);
            $excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data->tautan);
            $excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data->penanganan);
            $excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data->keterangan);
            $excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data->risiko);
            $excel->setActiveSheetIndex(0)->setCellValue('Y' . $numrow, $data->mitigasi);
            $excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data->foto1);
            $excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data->foto2);
            $excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $data->foto3);
            $excel->setActiveSheetIndex(0)->setCellValue('AC' . $numrow, $data->foto4);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('U' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('V' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('W' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('X' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Y' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Z' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('AA' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('AB' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('AC' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(5); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(20); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('W')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('X')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(20); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(20); // Set width kolom C


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Tower.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

}
