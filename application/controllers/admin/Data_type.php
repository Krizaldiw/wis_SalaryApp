<?php
/**
 *
 */
class Data_type extends CI_Controller{
  public function index(){
    $data['type'] = $this->rental_model->get_data('type')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_type', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_type(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_type');
    $this->load->view('templates_admin/footer');
  }

  public function tambah_type_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE ){
      $this->tambah_type();
    }else {
      $kode_type  = $this->input->post('kode_type');
      $nama_type  = $this->input->post('nama_type');

      $data = array(
        'kode_type' => $kode_type,
        'nama_type' => $nama_type,
      );
      $this->rental_model->insert_data($data, 'type');
      $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Type Berhasil Di Tambahkan !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('admin/data_type');
    }
  }
  public function _rules(){
    $this->form_validation->set_rules('kode_type','Kode Type','required');
    $this->form_validation->set_rules('nama_type','Nama Type','required');
  }
}
?>
