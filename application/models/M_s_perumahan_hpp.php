<?php
class M_s_perumahan_hpp extends CI_Model
{

    // start datatables
    // start datatables
    var $column_order = array(null); //set column field database for datatable orderable
    var $column_search = array('tanggal', 'kelompok'); //set column field database for datatable searchable
    var $order = array('id_hpp_rab_proyek' => 'ASC'); // default order
 
    private function _get_datatables_query($id_grup_proyek) {
        // $id_grup_proyek=$this->input->post('id_grup_proyek');
        // $id_grup_proyek=1;
        $this->db->select('*');
        $this->db->from('tb_hpp_rab_proyek');
        $this->db->where('id_grup_proyek', $id_grup_proyek);
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
    function get_datatables($id_grup_proyek) {
        $this->_get_datatables_query($id_grup_proyek);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered($id_grup_proyek) {
        $this->_get_datatables_query($id_grup_proyek);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all($id_grup_proyek) {
        $this->db->from('tb_hpp_rab_proyek');
        $this->db->where('id_grup_proyek', $id_grup_proyek);
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
        $this->db->select('tb_item.*, tb_category.name as name_category, tb_unit.name as name_unit');
        $this->db->from('tb_item');
        $this->db->join('tb_category', 'tb_category.id_category = tb_item.id_category');
        $this->db->join('tb_unit', 'tb_unit.id_unit = tb_item.id_unit');
        $this->db->ORDER_BY('stock', 'DESC');
        return $this->db->get()->result_array();
    } 

    public function getSemua()
    {
        $this->db->select('tb_item.*, tb_category.name as name_category, tb_unit.name as name_unit');
        $this->db->from('tb_item');
        $this->db->join('tb_category', 'tb_category.id_category = tb_item.id_category');
        $this->db->join('tb_unit', 'tb_unit.id_unit = tb_item.id_unit');
        $this->db->ORDER_BY('name', 'ASC');
        return $this->db->get();
    } 
  
    public function tambah_rab($id_grup_proyek)
    {
         $data = [
            'tanggal' => ($this->input->post('tanggal')),
            'id_grup_proyek' => $id_grup_proyek,
            'kelompok' => htmlspecialchars($this->input->post('kelompok')),
            'volume' => htmlspecialchars($this->input->post('volume')),
            'satuan' => htmlspecialchars($this->input->post('satuan')),
            'harga_satuan' => htmlspecialchars($this->input->post('harga_satuan2')),
            'jumlah_rab' => htmlspecialchars($this->input->post('jumlah_rab2')),
            'jumlah_realisasi' => htmlspecialchars($this->input->post('jumlah_realisasi2')),
            'sisa_anggaran' => htmlspecialchars($this->input->post('sisa_anggaran2')),
            'tgl_entry' => date("Y-m-d H:i:s"),
            'tgl_update' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('tb_hpp_rab_proyek', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil ditambah</p></div>');
         $url='s_perumahan/load_hpp/'.$id_grup_proyek;
        redirect($url);
    }
    
    
} 