<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_profile_perusahaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_admin();
        $this->load->model('m_s_profile_perusahaan');
    }

	public function index() 
	{ 
        $data['title'] = 'Setting Profile Perusahaan';
        $data['content'] = 's_profile_perusahaan/index';
        $data['menu'] = 's_profile_perusahaan';
        $data['profile'] = p_perusahaan();


        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|trim');
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required|trim');

        $this->form_validation->set_message('required', '{field} belum diinput');
        // $this->form_validation->set_message('min_length', '{field} harus 2 karakter');
        // $this->form_validation->set_message('max_length', '{field} melebihi batas karakter');


        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_s_profile_perusahaan->edit_setting();    
        }


        // $this->load->view('template', $data);
        // $this->m_s_profile_perusahaan->edit_setting(); 
    }
    
   function do_upload(){
        $idd=(isset($_POST["id_profile_perusahaan"]))?$_POST["id_profile_perusahaan"]:0;
        $this->load->library('upload'); 
        $config['upload_path'] = './assets/image/logo/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //Allowing types
        $config['encrypt_name'] = FALSE; //encrypt file name 
        
        $this->upload->initialize($config);
        if(!empty($_FILES['fileUpload']['name'])){

            if ($this->upload->do_upload('fileUpload')){

                $data   = $this->upload->data();
                $image  = $data['file_name']; //get file name
                $file_ext  = $data['file_ext']; //get file name

                $id_profile_perusahaan = $this->input->post('id_profile_perusahaan');
                $id_profile_perusahaan=$this->m_s_profile_perusahaan->upload_image($id_profile_perusahaan,$image);
                return $id_profile_perusahaan;
            }else{
                echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp";
            }
                     
        }else{
            echo "Failed, Image file is empty.";
        }
    }

    public function setting() 
	{ 
        $data['title'] = 'Pengaturan Awal e-POS';
        $data['content'] = 'user/setting';
        $data['menu'] = 'setting';
        $data['setting'] = setting_shop();
        
        
        $this->form_validation->set_rules('shop_name', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('shop_owner', 'Pemilik Toko', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telp', 'No Telp.', 'required|trim|max_length[16]');
        $this->form_validation->set_rules('initials_invoice', 'Inisial Struk', 'required|trim|min_length[2]|max_length[2]');

        $this->form_validation->set_message('required', '{field} belum diinput');
        $this->form_validation->set_message('min_length', '{field} harus 2 karakter');
        $this->form_validation->set_message('max_length', '{field} melebihi batas karakter');


        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_s_profile_perusahaan->edit_setting();    
        }
    }
}
 