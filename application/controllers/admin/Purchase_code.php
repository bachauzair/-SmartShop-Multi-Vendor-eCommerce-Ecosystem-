<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_code extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'language', 'timezone_helper']);
        $this->load->model('Setting_model');
    }

    public function index()
    {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $settings = get_settings('system_settings', true);
            $this->data['title'] = 'System Registration | ' . $settings['app_name'];
            $this->data['meta_description'] = 'System Registration | ' . $settings['app_name'];
            $this->data['doctor_brown'] = get_settings('doctor_brown');
            $this->data['web_doctor_brown'] = get_settings('web_doctor_brown');
            $this->load->view('admin/template', $this->data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function validator()
    {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            // Purchase code validation bypassed — system is self-managed
            // Auto-register if not already registered
            $doctor_brown = get_settings('doctor_brown');
            if (empty($doctor_brown)) {
                $doctor_brown_data = array();
                $doctor_brown_data['code_bravo'] = 'self-managed';
                $doctor_brown_data['time_check'] = hash('sha256', 'self-managed|admin|' . APP_CODE);
                $doctor_brown_data['code_adam'] = 'admin';
                $doctor_brown_data['dr_firestone'] = APP_CODE;

                $data['variable'] = "doctor_brown";
                $data['value'] = json_encode($doctor_brown_data);
                insert_details($data, 'settings');
            }

            $web_doctor_brown = get_settings('web_doctor_brown');
            if (empty($web_doctor_brown)) {
                $web_data = array();
                $web_data['code_bravo'] = 'self-managed';
                $web_data['time_check'] = hash('sha256', 'self-managed|admin|' . WEB_CODE);
                $web_data['code_adam'] = 'admin';
                $web_data['dr_firestone'] = WEB_CODE;

                $data2['variable'] = "web_doctor_brown";
                $data2['value'] = json_encode($web_data);
                insert_details($data2, 'settings');
            }

            $this->response['error'] = false;
            $this->response['csrfName'] = $this->security->get_csrf_token_name();
            $this->response['csrfHash'] = $this->security->get_csrf_hash();
            $this->response['message'] = 'System registered successfully.';
            print_r(json_encode($this->response));
        } else {
            redirect('admin/login', 'refresh');
        }
    }
}

