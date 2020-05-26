<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('iduser') == "" && $this->session->userdata('tipeuser') != "1") {
            $this->session->set_flashdata('MSG', 'Login Gagal <br> Anda tidak memiliki akses ke dashboard');
            redirect('d/User');
        }
        $this->load->model(array('M_transaksi', 'M_product', 'M_user', 'M_daerah', 'M_company', 'M_order', 'M_invoice', 'M_keuangan'));
        $this->load->library('cart');
        $this->load->database();
    }
    function get_data_keuangan(){
        if (empty($_SESSION['iduser'])) {
            $result['status'] = 0;
            $result['message'] = "Sesi Berakhir, Silahkan login kembali";
            echo json_encode($result);
        } else {
            $str = "'";
            $list = $this->M_keuangan->get_datatables_keuangan();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $result) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $result->idorder;
                $row[] = date_ind($result->date_create). " ".get_time($result->date_create);

                $row[] = $result->type == "debet online" || $result->type == "debet offline" ? "Rp. ".number_format($result->price) : "0";
                $row[] = $result->type == "kredit online" || $result->type == "kredit offline" ? "Rp. ".number_format($result->price) : "0";

                $row[] = $result->type;
                $row[] = $result->keterangan;
                $row[] = '<button class="btn btn-sm btn-danger" onclick="delete_keuangan('.$str.$result->idtransaksi.$str.')"><i class="fa fa-trash"></i></button>
                        ';
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_keuangan->count_all(),
                "recordsFiltered" => $this->M_keuangan->count_filtered(),            
                "data" => $data,
            );
            echo json_encode($output);
        }
    }

    function data_keuangan(){
        if (empty($_SESSION['iduser'])) {
            $result['status'] = 0;
            $result['message'] = "Sesi Berakhir, Silahkan login kembali";
            echo json_encode($result);
        } else {
        $this->load->view('dashboard/keuangan/data_keuangan');
        }
    }

    function laporan_keuangan(){
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
            $data['keuanganharian'] = $this->M_keuangan->statistik_harian();
            $data['keuanganbulanan'] = $this->M_keuangan->statistik_bulanan();
            $data['keuanganbulananonline'] = $this->M_keuangan->statistik_bulanan_online();
            $data['keuanganbulananoffline'] = $this->M_keuangan->statistik_bulanan_offline();
            $this->load->view('dashboard/keuangan/laporan_keuangan', $data);
        }
    }

    function delete_keuangan(){
        if (valid_admin()['status'] == 0) {
            $result['status'] = valid_admin()['status'];
            $result['message'] = valid_admin()['message'];
            echo json_encode($result);
        } else {
            $id = $this->input->post('id');
            $detele = $this->M_keuangan->delete_keuangan($id);
            $result['status'] = 1;
            $result['message'] = 'Success Delete Data';
            echo json_encode($result);
        }
    }
}
