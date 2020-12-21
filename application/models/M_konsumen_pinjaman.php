<?php
class M_konsumen_pinjaman extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'nama_peminjam','jenis_pinjaman'); //set column field database for datatable orderable
    var $column_search = array('nama_peminjam','jenis_pinjaman','jumlah_pinjaman','jumlah_angsuran_perbulan','sisa_pinjaman'); //set column field database for datatable searchable
    var $order = array('id_data_pinjaman' => 'DESC'); // default order
 
    private function _get_datatables_query() {
        $temp_kode=$this->input->post('temp_kode');
        $this->db->select('*');
        $this->db->from('tb_data_pinjaman_temp');
        $this->db->where('id_data_konsumen',$temp_kode);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function getprop($id){
        return  $this->db->query(
                "SELECT * FROM tb_propinsi WHERE id_propinsi = $id "
        );

    }

     function getkota($id){
        return  $this->db->query(
                "SELECT * FROM tb_kota WHERE id_kota = $id "
        );

    }

     function getkec($id){
        return  $this->db->query(
                "SELECT * FROM tb_kecamatan WHERE id_kecamatan = $id "
        );

    }

     function getkel($id){
        return  $this->db->query(
                "SELECT * FROM tb_kelurahan WHERE id_kelurahan = $id "
        );

    }

    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $temp_kode=$this->input->post('temp_kode');
        $this->db->from('tb_data_konsumen');
        $this->db->where('id_data_konsumen',$temp_kode);
        return $this->db->count_all_results();
    }

    // end datatables
    // end datatables


    public function get($id = null)
    {
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        return $this->db->get('tb_item')->row_array();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_data_konsumen');
        $this->db->ORDER_BY('nama_lengkap', 'ASC');
        return $this->db->get()->result_array();
    } 

    // public function getSemua()
    // {
    //     $this->db->select('tb_item.*, tb_category.name as name_category, tb_unit.name as name_unit');
    //     $this->db->from('tb_item');
    //     $this->db->join('tb_category', 'tb_category.id_category = tb_item.id_category');
    //     $this->db->join('tb_unit', 'tb_unit.id_unit = tb_item.id_unit');
    //     $this->db->ORDER_BY('name', 'ASC');
    //     return $this->db->get();
    // } 
    
     public function tambah_pinjaman($temp_kode,$id_user,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman)
    {
         $data = [
            'id_data_konsumen' => $temp_kode,
            'nama_peminjam' => htmlspecialchars($this->input->post('nama_peminjam')),
            'jenis_pinjaman' => htmlspecialchars($this->input->post('jenis_pinjaman')),
            'jumlah_pinjaman' => htmlspecialchars($this->input->post('jumlah_pinjaman2')),
            'jumlah_angsuran_perbulan' => htmlspecialchars($this->input->post('jumlah_angsuran2')),
            'sisa_pinjaman' => htmlspecialchars($this->input->post('sisa_pinjaman2')),
            'id_user' => $id_user,
            'tgl_entry' => date("Y-m-d H:i:s"),
            'tgl_update' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('tb_data_pinjaman_temp', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil ditambah</p></div>');
        redirect('konsumen/tambah/'.$temp_kode);
    }

    public function tambah_item()
    {
         $data = [
            'barcode' => htmlspecialchars($this->input->post('barcode')),
            'name' => htmlspecialchars($this->input->post('fullname')),
            'id_category' => htmlspecialchars($this->input->post('category')),
            'id_unit' => htmlspecialchars($this->input->post('unit')),
            'price' => htmlspecialchars($this->input->post('price')),
            'stock' => 0,
            'created' => date("Y-m-d H:i:s"),
            'updated' => date("Y-m-d H:i:s")
        ];

        $uppload_image = $_FILES['image']['name'];

        if ($uppload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path']   = './assets/image/barang/';
            $config['max_size']      = '5048';
            $config['file_name']     = 'item-'.date('ymd').substr(md5(rand()),0,10);

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $error =  $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> '.$error.'</p></div>');
                redirect('item');
            }
        }

        $this->db->insert('tb_item', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil ditambah</p></div>');
        redirect('item');
    }
    
    function get_kota($id_propinsi){
        $sql=" SELECT id_kota,lower(nama_kota) as nama_kota FROM tb_propinsi a
                    LEFT JOIN tb_kota b on a.id_propinsi=b.id_propinsi
                    WHERE a.id_propinsi=$id_propinsi ORDER BY nama_kota";
        $hslquery=$this->db->query($sql);
        return $hslquery;
    }
    
    function get_kec($id_propinsi,$id_kota){
        $sql=" SELECT id_kecamatan,lower(nama_kecamatan) as nama_kecamatan FROM tb_kota a
                    LEFT JOIN tb_kecamatan b on a.id_kota=b.id_kota
                    WHERE a.id_propinsi=$id_propinsi AND a.id_kota=$id_kota ORDER BY nama_kecamatan";
        $hslquery=$this->db->query($sql);
        return $hslquery;
    }
    
    function get_kel($id_kota,$id_kec){
        $sql=" SELECT id_kelurahan,lower(nama_kelurahan) as nama_kelurahan FROM tb_kecamatan a
                    LEFT JOIN tb_kelurahan b on a.id_kecamatan=b.id_kecamatan
                    WHERE a.id_kota=$id_kota AND a.id_kecamatan=$id_kec ORDER BY nama_kelurahan";
        $hslquery=$this->db->query($sql);
        return $hslquery;
    }



    function simpan_grup_proyek($nama_proyek,$alamat_proyek, $propinsi, $kota,$kecamatan,$kelurahan,$luas_tanah,$jml_unit,$klasifikasi,$konsep,$segmentasi,$no_imb,$no_izin_lokasi,$no_pengesahan,$no_shgb_induk,$image_siteplan,$image_file_lokasi,$image_file_pengesahan,$image_file_shgb_induk,$longitude,$latitude,$no_rekening,$kop_surat,$alamat_kantor,$propinsi2,$kota2,$kecamatan2,$kelurahan2,$image_logo,$image_kav1,$image_kav2,$image_kav3,$klausul_sppr,$image_imb,$id_user){      
            
            $nama_proyek=str_replace("'","''",$nama_proyek); 
            $alamat_proyek=str_replace("'","''",$alamat_proyek); 
            $klasifikasi=str_replace("'","''",$klasifikasi); 
            $konsep=str_replace("'","''",$konsep); 
            $segmentasi=str_replace("'","''",$segmentasi); 
            $alamat_kantor=str_replace("'","''",$alamat_kantor); 
            $klausul_sppr=str_replace("'","''",$klausul_sppr); 
           
            //tb_klausul_sppr
            $sqlstr="INSERT INTO tb_klausul_sppr 
                        SET no_rekening='$no_rekening',
                        nama_kop_surat='$kop_surat',
                        alamat_kantor='$alamat_kantor',
                        kelurahan='$kelurahan',
                        kecamatan='$kecamatan',
                        kota='$kota',
                        propinsi='$propinsi',
                        logo='$image_logo', 
                        klausul_sppr='$klausul_sppr',
                        foto_kavling1='$image_kav1',
                        foto_kavling2='$image_kav2',
                        foto_kavling3='$image_kav3', 
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr);  
            $id_klausul_sppr = $this->db->insert_id();
            //tb_izin_proyek
             $sqlstr1="INSERT INTO tb_izin_proyek 
                        SET no_imb='$no_imb',
                        no_izin_lokasi='$no_izin_lokasi',
                        no_pengesahan='$no_pengesahan',
                        no_shgb_induk='$no_shgb_induk',
                        siteplan='$image_siteplan',
                        file_imb='$image_imb',
                        file_izin_lokasi='$image_file_lokasi',
                        file_pengesahan='$image_file_pengesahan',
                        file_shgb_induk='$image_file_shgb_induk',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr1);  
            $id_izin_proyek = $this->db->insert_id();

            //tb_grup_proyek
             $sqlstr2="INSERT INTO tb_grup_proyek 
                        SET id_izin_proyek='$id_izin_proyek',
                        id_klausul_sppr='$id_klausul_sppr',
                        nama_proyek='$nama_proyek',
                        alamat_proyek='$alamat_proyek',
                        kelurahan='$kelurahan2',
                        kecamatan='$kecamatan2',
                        kota='$kota2',
                        propinsi='$propinsi2',
                        luas_tanah='$luas_tanah',
                        jml_unit='$jml_unit',
                        klasifikasi='$klasifikasi',
                        konsep='$konsep',
                        segmentasi='$segmentasi',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_grup_proyek = $this->db->insert_id();                    
        $hasil="sukses";
        return $hasil;
    }


} 