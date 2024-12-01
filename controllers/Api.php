<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('popup_model');
    }

    public function popup_get() {
        $response = [
            'status' => true,
            'message' => 'Success',
            'data' => [
                'title' => 'Bienvenido',
                'content' => 'Este es un mensaje de prueba',
                'style' => [
                    'background_color' => '#ffffff',
                    'text_color' => '#000000',
                    'width' => 400,
                    'height' => 300,
                    'position' => 'center'
                ]
            ]
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function popup_post() {
        $data = $this->post();
        
        $response = [
            'status' => true,
            'message' => 'Datos recibidos correctamente',
            'data' => $data
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }
}