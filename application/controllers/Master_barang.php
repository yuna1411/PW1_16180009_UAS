<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_barang extends CI_Controller {

    
    public function __construct()
    {
       parent::__construct();   
       $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['title'] = 'Master Barang';
        $data['master_barang'] = $this->Barang_model->get_data('master_barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Master Barang';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_barang');
        $this->load->view('templates/footer');
    }

    public function tambah_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = array(
                'id' => $this->input->post('id_bunga'),
                'name' => $this->input->post('nama_bunga'),
                'qty' => $this->input->post('qty_bunga'),
                'price' => $this->input->post('price_bunga'),
            );

            $this->Barang_model->insert_data($data, 'master_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data has been saved!<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Master_barang');
        }
    }

    
    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('nama_bunga'),
                'qty' => $this->input->post('qty_bunga'),
                'price' => $this->input->post('price_bunga'),
            );

            $this->Barang_model->update_data($data, 'master_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data has been updated!<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Master_barang');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_bunga', 'ID', 'required', array(
            'required' => '%s Please fill the field '
        ));
        $this->form_validation->set_rules('nama_bunga', 'Name', 'required', array(
            'required' => '%s Please fill the field'
        ));
        $this->form_validation->set_rules('qty_bunga', 'Quantity', 'required', array(
            'required' => '%s Please fill the field'
        ));
        $this->form_validation->set_rules('price_bunga', 'Price', 'required', array(
            'required' => '%s Please fill the field'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->Barang_model->delete($where, 'master_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data has been DELETED!<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Master_barang');

    }

}