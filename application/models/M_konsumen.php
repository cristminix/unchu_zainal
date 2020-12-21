<?php
class M_konsumen extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'a.nama_lengkap'); //set column field database for datatable orderable
    var $column_search = array('a.nama_lengkap','a.alamat_rumah','a.no_hp','a.email','b.nama_lengkap','c.nama_lengkap'); //set column field database for datatable searchable
    var $order = array('id_data_konsumen' => 'DESC'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('a.*,
                            h.nama_propinsi,
                            i.nama_kota,
                            j.nama_kecamatan,
                            k.nama_kelurahan,
                            b.nama_lengkap as nama_pasangan,
                            b.tempat_lahir as tempat_lahir_pasangan,
                            b.tanggal_lahir as tanggal_lahir_pasangan,
                            b.alamat_rumah as alamat_rumah_pasangan,
                            b.no_hp as no_hp_pasangan,
                            b.email as email_pasangan,
                            c.nama_lengkap as nama_keluarga_terdekat,
                            c.alamat as alamat_keluarga_terdekat,
                            c.no_hp as no_hp_keluarga_terdekat,
                            c.hubungan');
        $this->db->from('tb_data_konsumen a');
        $this->db->join('tb_data_pasangan_konsumen b', 'a.id_data_konsumen=b.id_data_konsumen');
        $this->db->join('tb_data_keluarga_terdekat c', 'a.id_data_konsumen=c.id_data_konsumen');
        $this->db->join('tb_data_pekerjaan_konsumen d', 'a.id_data_konsumen=d.id_data_konsumen');
        $this->db->join('tb_data_pekerjaan_pasangan e', 'a.id_data_konsumen=e.id_data_konsumen');
        $this->db->join('tb_data_aset f', 'a.id_data_konsumen=f.id_data_konsumen');
        $this->db->join('tb_data_pinjaman g', 'a.id_data_konsumen=g.id_data_konsumen');
        $this->db->join('tb_propinsi h', 'a.propinsi=h.id_propinsi');
        $this->db->join('tb_kota i', 'a.kota=i.id_kota');
        $this->db->join('tb_kecamatan j', 'a.kecamatan=j.id_kecamatan');
        $this->db->join('tb_kelurahan k', 'a.kelurahan=k.id_kelurahan');
        
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
        $this->db->from('tb_data_konsumen');
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



    function simpan_konsumen($nama_lengkap,$tempat_lahir, $tgl_lahir,$jns_identitas,$identitas,$alamat_rumah,$propinsi,$kota,$kecamatan,$kelurahan,$status_pernikahan,$image_pass_foto,$no_hp,$email,$npwp,$jml_anak,$cb1,$cb2,$alamat_penagihan,$propinsi_penagihan,$kota_penagihan,$kecamatan_penagihan,$kelurahan_penagihan,$image_identitas,$nama_lengkap_pasangan,$tempat_lahir_pasangan,$tgl_lahir_pasangan,$jns_identitas_pasangan,$identitas_pasangan,$no_hp_pasangan,$image_pass_foto_pasangan,$image_identitas_pasangan,$nama_lengkap_terdekat,$no_hp_terdekat,$hubungan,$alamat_terdekat,$temp_kode,$pekerjaan,$nama_perusahaan,$alamat_perusahaan,$no_telp_perusahaan,$bentuk_usaha,$bidang_usaha,$jabatan_perusahaan,$masa_kerja_perusahaan,$pekerjaan_pasangan,$nama_perusahaan_pasangan,$alamat_perusahaan_pasangan,$no_telp_perusahaan_pasangan,$bentuk_usaha_pasangan,$bidang_usaha_pasangan,$jabatan_perusahaan_pasangan,$masa_kerja_perusahaan_pasangan,$penghasilan_utama2,$penghasilan_tambahan2,$penghasilan_pasangan2,$penghasilan_tambahan_pasangan2,$total_penghasilan2,$tabungan_bank,$tabungan_nilai2,$deposito_bank,$deposito_nilai2,$rumah_an,$rumah_nilai2,$kendaraan_an,$kendaraan_nilai2,$id_user){      
            
            $nama_lengkap=str_replace("'","''",$nama_lengkap); 
            $alamat_rumah=str_replace("'","''",$alamat_rumah); 
            $alamat_penagihan=str_replace("'","''",$alamat_penagihan); 
            $nama_lengkap_pasangan=str_replace("'","''",$nama_lengkap_pasangan); 
            $nama_lengkap_terdekat=str_replace("'","''",$nama_lengkap_terdekat); 
            $alamat_terdekat=str_replace("'","''",$alamat_terdekat); 
            $nama_perusahaan=str_replace("'","''",$nama_perusahaan); 
            $alamat_perusahaan=str_replace("'","''",$alamat_perusahaan); 
            
            //tb_data_konsumen
            $sqlstr="INSERT INTO tb_data_konsumen 
                        SET nama_lengkap='$nama_lengkap',
                        tempat_lahir='$tempat_lahir',
                        tanggal_lahir='$tanggal_lahir',
                        jenis_identitas='$jenis_identitas',
                        identitas='$identitas',
                        alamat_rumah='$alamat_rumah',
                        kelurahan='$kelurahan',
                        kecamatan='$kecamatan', 
                        kota='$kota',
                        propinsi='$propinsi',
                        status_pernikahan='$status_pernikahan',
                        pass_foto='$pass_foto', 
                        doc_identitas='$doc_identitas', 
                        no_hp='$no_hp', 
                        email='$email', 
                        npwp='$npwp', 
                        jml_anak='$jml_anak', 
                        alamat_penagihan='$alamat_penagihan', 
                        kelurahan_penagihan='$kelurahan_penagihan', 
                        kecamatan_penagihan='$kecamatan_penagihan', 
                        kota_penagihan='$kota_penagihan', 
                        propinsi_penagihan='$propinsi_penagihan', 
                        id_user='$id_user', 
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr);  
            $id_data_konsumen = $this->db->insert_id();
            //tb_data_pasangan_konsumen
             $sqlstr1="INSERT INTO tb_data_pasangan_konsumen 
                        SET id_data_konsumen='$id_data_konsumen',
                        nama_lengkap='$nama_lengkap_pasangan',
                        tempat_lahir='$tempat_lahir_pasangan',
                        tanggal_lahir='$tgl_lahir_pasangan',
                        jenis_identitas='$jns_identitas_pasangan',
                        identitas='$identitas_pasangan',
                        pass_foto='$image_pass_foto_pasangan',
                        dok_identitas='$image_identitas_pasangan',
                        no_hp='$no_hp_pasangan',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr1);  
            $id_data_pasangan_konsumen = $this->db->insert_id();

            //tb_data_keluarga_terdekat
             $sqlstr2="INSERT INTO tb_data_keluarga_terdekat 
                        SET id_data_konsumen='$id_data_konsumen',
                        nama_lengkap='$nama_lengkap_terdekat',
                        alamat='$alamat_terdekat',
                        no_hp='$no_hp_terdekat',
                        hubungan='$hubungan',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_data_keluarga_terdekat = $this->db->insert_id();      

            //tb_data_pekerjaan_konsumen
             $sqlstr2="INSERT INTO tb_data_pekerjaan_konsumen 
                        SET id_data_konsumen='$id_data_konsumen',
                        pekerjaan='$pekerjaan',
                        nama_perusahaan='$nama_perusahaan',
                        alamat_perusahaan='$alamat_perusahaan',
                        no_telp='$no_telp_perusahaan',
                        bentuk_usaha='$bentuk_usaha',
                        bidang_usaha='$bidang_usaha',
                        jabatan='$jabatan_perusahaan',
                        masa_kerja='$masa_kerja_perusahaan',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_data_pekerjaan_konsumen = $this->db->insert_id(); 

            //tb_data_pekerjaan_pasangan
             $sqlstr2="INSERT INTO tb_data_pekerjaan_pasangan 
                        SET id_data_konsumen='$id_data_konsumen',
                        pekerjaan='$pekerjaan_pasangan',
                        nama_perusahaan='$nama_perusahaan_pasangan',
                        alamat_perusahaan='$alamat_perusahaan_pasangan',
                        no_telp='$no_telp_perusahaan_pasangan',
                        bentuk_usaha='$bentuk_usaha_pasangan',
                        bidang_usaha='$bidang_usaha_pasangan',
                        jabatan='$jabatan_perusahaan_pasangan',
                        masa_kerja='$masa_kerja_perusahaan_pasangan',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_data_pekerjaan_pasangan = $this->db->insert_id(); 

            //tb_data_penghasilan_pengeluaran
            $sqlstr2="INSERT INTO tb_data_penghasilan_pengeluaran 
                        SET id_data_konsumen='$id_data_konsumen',
                        penghasilan_utama='$penghasilan_utama2',
                        penghasilan_tambahan='$penghasilan_tambahan2',
                        penghasilan_pasangan='$penghasilan_pasangan2',
                        penghasilan_tambahan_pasangan='$penghasilan_tambahan_pasangan2',
                        total_penghasilan='$total_penghasilan2',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_data_pekerjaan_pasangan = $this->db->insert_id();  

            $sqlstr="insert into tb_data_pinjaman
                    (
                        id_data_konsumen,
                        nama_peminjam,
                        jenis_pinjaman,
                        jumlah_pinjaman,
                        jumlah_angsuran_perbulan,
                        sisa_pinjaman,
                        id_user,
                        tgl_input,
                        tgl_edit
                    )
                    select 
                        '$id_data_konsumen',
                       nama_peminjam,
                        jenis_pinjaman,
                        jumlah_pinjaman,
                        jumlah_angsuran_perbulan,
                        sisa_pinjaman,
                        id_user,
                        NOW(),
                        NOW()
                    from
                    tb_data_pinjaman_temp WHERE id_data_konsumen = '$temp_kode' AND id_user = '$id_user'";
            $this->db->query($sqlstr); 

            //tb_data_aset
            $sqlstr2="INSERT INTO tb_data_aset 
                        SET id_data_konsumen='$id_data_konsumen',
                        tabungan_bank='$tabungan_bank',
                        nilai_tabungan_bank='$tabungan_nilai2',
                        deposito_bank='$deposito_bank',
                        nilai_deposito_bank='$deposito_nilai2',
                        rumah_atas_nama='$rumah_an',
                        nilai_rumah='$rumah_nilai2',
                        kendaraan_atas_nama='$kendaraan_an',
                        nilai_kendaraan='$kendaraan_nilai2',
                        id_user='$id_user',
                        tgl_entry=NOW() ";
            $this->db->query($sqlstr2);  
            $id_data_aset = $this->db->insert_id();  





        $hasil="sukses";
        return $hasil;
    }

    function simpan_pinjaman($temp_kode,$nama_peminjam,$jenis_pinjaman,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman,$id_user){      
            
        $nama_peminjam=str_replace("'","''",$nama_peminjam); 
        $data = [
                'id_data_konsumen' => $temp_kode,
                'nama_peminjam' => htmlspecialchars($nama_peminjam),
                'jenis_pinjaman' => htmlspecialchars($jenis_pinjaman),
                'jumlah_pinjaman' => htmlspecialchars($jumlah_pinjaman),
                'jumlah_angsuran_perbulan' => htmlspecialchars($jumlah_angsuran),
                'sisa_pinjaman' => htmlspecialchars($sisa_pinjaman),
                'id_user' => $id_user,
                'tgl_entry' => date("Y-m-d H:i:s"),
                'tgl_update' => date("Y-m-d H:i:s")
           ];

        $this->db->insert('tb_data_pinjaman_temp', $data);         
        $hasil="sukses";
        return $hasil;
    }

    function edit_pinjaman($id,$temp_kode,$nama_peminjam,$jenis_pinjaman,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman,$id_user){      
            
        $nama_peminjam=str_replace("'","''",$nama_peminjam); 
        $data = [
                'id_data_konsumen' => $temp_kode,
                'nama_peminjam' => htmlspecialchars($nama_peminjam),
                'jenis_pinjaman' => htmlspecialchars($jenis_pinjaman),
                'jumlah_pinjaman' => htmlspecialchars($jumlah_pinjaman),
                'jumlah_angsuran_perbulan' => htmlspecialchars($jumlah_angsuran),
                'sisa_pinjaman' => htmlspecialchars($sisa_pinjaman),
                'id_user' => $id_user,
                // 'tgl_entry' => date("Y-m-d H:i:s"),
                'tgl_update' => date("Y-m-d H:i:s")
           ];

        $this->db->where('id_data_pinjaman', $id);         
        $this->db->update('tb_data_pinjaman_temp', $data);         
        $hasil="sukses";
        return $hasil;
    }

    function hapus_pinjaman($id){      
        $this->db->where('id_data_pinjaman', $id);         
        $this->db->delete('tb_data_pinjaman_temp');         
        $hasil="sukses";
        return $hasil;
    }


} 