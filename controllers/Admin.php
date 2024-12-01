<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('popup_model');
        $this->load->library('form_validation');
        $this->load->helper(['form', 'url']);
    }

    public function index() {
        $data['title'] = 'Popup Configuration';
        $data['config'] = $this->popup_model->get_latest_configuration();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/popup_config', $data);
        $this->load->view('admin/footer');
    }

    public function save() {
        $this->form_validation->set_rules('text', 'Popup Text', 'required|trim');
        
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            return;
        }

        $data = [
            'text' => $this->input->post('text'),
            'style' => json_encode([
                'background_color' => $this->input->post('background_color'),
                'text_color' => $this->input->post('text_color'),
                'width' => $this->input->post('width'),
                'height' => $this->input->post('height'),
                'position' => $this->input->post('position')
            ]),
            'conditions' => json_encode([
                'show_once' => $this->input->post('show_once') ? true : false,
                'delay' => $this->input->post('delay'),
                'pages' => $this->input->post('pages') ?: []
            ])
        ];

        if ($this->popup_model->save_configuration($data)) {
            $this->session->set_flashdata('success', 'Configuration saved successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to save configuration');
        }

        redirect('admin');
    }
}