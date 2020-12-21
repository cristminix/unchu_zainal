<?php
class M_s_perumahan_dok_legal extends CI_Model
{

    var $column_order = array(null, 'nama_dokumen'); //set column field database for datatable orderable
    var $column_search = array('nama_dokumen','keterangan','status'); //set column field database for datatable searchable
    var $order = array('id_dok_legal' => 'DESC'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('tb_dok_legal.*,tb_users.name');
        $this->db->from('tb_dok_legal');        
        $this->db->join('tb_users', 'tb_dok_legal.id_user = tb_users.id_user','left');
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
        $this->db->from('tb_dok_legal');
        return $this->db->count_all_results();
    }

    // end datatables
    // end datatables


    public function get($id = null)
    {
        if ($id != null) {
            $this->db->where('id_dok_legal', $id);
        }
        return $this->db->get('tb_dok_legal')->row_array();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_dok_legal');
        // $this->db->join('tb_category', 'tb_category.id_category = tb_item.id_category');
        // $this->db->join('tb_unit', 'tb_unit.id_unit = tb_item.id_unit');
        $this->db->ORDER_BY('nama_dokumen', 'ASC');
        return $this->db->get()->result_array();
    } 

    public function tambah_dok_legal()
    {
        $id_user=$this->session->userdata('id_user'); 
         $data = [
            'nama_dokumen' => htmlspecialchars($this->input->post('nama_dokumen')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_dokumen')),
            'status' => htmlspecialchars($this->input->post('status_dokumen')),
            'id_user' => $id_user,
            'tgl_entry' => date("Y-m-d H:i:s"),
            'tgl_update' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('tb_dok_legal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil ditambah</p></div>');
        redirect('s_perumahan');
    }
    
    public function edit_category()
    {
         $data = [
            'name' => htmlspecialchars($this->input->post('fullname')),
            'updated' => date("Y-m-d H:i:s")
        ];
        
        $this->db->where('id_category' , htmlspecialchars($this->input->post('id_category')));
        $this->db->update('tb_category', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil diubah</p></div>');
        redirect('category');
    }

    public function hapus_category()
    {
        $id = $this->input->post('id_category');
        
        $this->db->where('id_category', $id);
        $this->db->delete('tb_category');

        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-times"></i> Data tidak bisa dihapus! (sudah berelasi)</p></div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil dihapus</p></div>');
        }


        redirect('category');
    }

}
