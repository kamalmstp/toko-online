<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('iduser') == "" && $this->session->userdata('tipeuser') != "1") {
            $this->session->set_flashdata('MSG', 'Login Gagal <br> Anda tidak memiliki akses ke dashboard');
            redirect('d/User');
        }
        $this->load->model(array('M_company', 'M_order', 'M_partner', 'M_invoice', 'M_product', 'M_keuangan'));
        $this->load->database();
    }

    function index() {
        $data['profile'] = $this->M_company->data_company()->row();
        $this->load->view('dashboard/home', $data);
    }


    function blank() {
        $data['title'] = "title";
        $data['header'] = $this->load->view('header', $data, TRUE);
        $data['footer'] = $this->load->view('footer', $data, TRUE);
        $this->load->view('v_404', $data);
    }

    function report_home() {
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
            $data['keuanganbulananonline'] = $this->M_keuangan->statistik_bulanan_online();
            $data['keuanganbulananoffline'] = $this->M_keuangan->statistik_bulanan_offline();
            $data['neworder'] = $this->M_order->count_new_order()->row();
            $data['neworderunpaid'] = $this->M_invoice->count_new_order_unpaid()->row();
            $data['wishlist'] = $this->M_order->count_wishlist()->row();
            $data['newpartner'] = $this->M_partner->count_new_partner()->row();
            $data['countshoping'] = $this->M_order->countshoping()->row();
            $data['countproduct'] = $this->M_product->countproduct()->row();
            $data['countproductoutstock'] = $this->M_product->countproductoutstock()->row();
            $data['countproductinstock'] = $this->M_product->countproductinstock()->row();
            $this->load->view('dashboard/report_home', $data);
        }
    }

    function documentation() {
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
            $this->load->view('dashboard/documentation');
        }
    }

}
