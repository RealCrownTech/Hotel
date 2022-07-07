<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
    public $parser;
    public function __construct() 
    {
        $this->parser = \Config\Services::parser();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Login | The Ashokas',
        ];
        return $this->parser->setData($data)->render('login');
    }

    public function dashboard() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'page_name' => 'home',
            'page_title' => 'Dashboard | The Ashokas',
            'occupied Rooms'
            // 'notify_message' => 'You are successfully logged in',
            // 'notify_type' => 'success',
        ];
        // return $this->parser->setData($data)->render('dashboard');
        echo view('dashboard', $data);
    }

    public function receipt() {
        $data = [
            'page_name' => 'Receipt',
            'page_title' => 'Receipt | The Ashokas',
        ];
        echo view('receipt', $data);
    }

    public function print_invoice() {
        $data = [
            'page_name' => 'Print Invoice',
            'page_title' => 'Print Invoice | The Ashokas',
        ];
        echo view('print/invoice', $data);
    }

    function convertToPdf($page, $data_id = NULL){
        $dompdf = new \Dompdf\Dompdf(array('enable_remote' => true));
        $dompdf->loadHtml(view('print/'.$page));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Invoice #24073923');
    }
}
