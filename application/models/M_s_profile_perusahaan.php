<?php
class M_s_profile_perusahaan extends CI_Model
{

   
    public function edit_setting()
    {
        $now=date("Y-m-d H:i:s");
         $data = [
            'nama_perusahaan' => htmlspecialchars($this->input->post('nama_perusahaan')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            'email' => htmlspecialchars($this->input->post('email')),
            'website' => htmlspecialchars(htmlspecialchars($this->input->post('website'))),
            'nama_pimpinan' => htmlspecialchars(htmlspecialchars($this->input->post('nama_pimpinan'))),
            'tgl_update' => $now
        ];
        $uppload_image = $_FILES['image']['name'];

        if ($uppload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['upload_path']   = './assets/image/logo/';
            // $config['max_size']      = '5048';
            $config['file_name']     = 'logo-'.date('ymd').substr(md5(rand()),0,10);

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                // $this->db->set('logo_perusahaan', 'assets/image/logo/$image');
                $this->db->set('logo_perusahaan', 'assets/image/logo/'.$new_image);
            } else {
                $error =  $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> '.$error.'</p></div>');
                redirect('s_profile_perusahaan');
            }
        }


        $this->db->where('id_profile_perusahaan' , htmlspecialchars($this->input->post('id_profile_perusahaan')));
        $this->db->update('tb_profile_perusahaan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil diubah</p></div>');
        redirect('s_profile_perusahaan');
    }

     public function upload_image($id_profile_perusahaan,$image)
    {
        $idd=$this->input->post('id_profile_perusahaan');
        $sqlstr="UPDATE tb_profile_perusahaan 
                SET logo_perusahaan='assets/image/logo/$image'
                WHERE id_profile_perusahaan='$id_profile_perusahaan' ";       
        $this->db->query($sqlstr);
        // return $id_profile_perusahaan;
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-check"></i> Data berhasil diubah</p></div>');
        redirect('s_profile_perusahaan');
    }

    

}
