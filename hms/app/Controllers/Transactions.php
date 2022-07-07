<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Transactions extends Controller
{
    
    public function index() {        
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Transactions',
            'page_title' => 'Transactions | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'staffs' => $this->userModel->getAllUsers(),
            'transaction_data' => $this->transactionModel->getAllTransactions(),
            'clients' => $this->clientModel->getAllClients()
        ];
        return view('transactions/index', $data);
    }

    public function invoice($lodge_no) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Print Invoice',
            'page_title' => 'Print Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'invoice_data' => $this->lodgeModel->fetchInvoiceData($lodge_no),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
            'orders' => $this->foodModel->getFoodOrder($lodge_no),
            'period' => $this->transactionModel->getInvoiceCheckInDates($lodge_no),
            'transact' => $this->transactionModel->getTransaction($lodge_no),
            'grossAmount' => $this->transactionModel->getTotalInvoiceAmount($lodge_no),
            'checkInAmount' => $this->transactionModel->getTotalCheckInAmount($lodge_no),
            'orderAmount' => $this->transactionModel->getTotalOrderAmount($lodge_no)
        ];
        echo view('print/invoice', $data);
    }

    public function order_invoice($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Print Order Invoice',
            'page_title' => 'Print Order Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'foods' => $this->foodModel->getAllFoods(),
            'orders' => $this->foodModel->getFoodOrderData($id),
            'orders_data' => $this->foodModel->getFoodOrderItemData($id),
            'clients' => $this->clientModel->getAllClients()
        ];
        echo view('print/order_invoice', $data);
    }

    public function receipt($lodge_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Print Receipt',
            'page_title' => 'Print Receipt | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'invoice_data' => $this->lodgeModel->fetchInvoiceData($lodge_no),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
            'orders' => $this->foodModel->getFoodOrder($lodge_no),
            'grossAmount' => $this->transactionModel->getTotalInvoiceAmount($lodge_no),
        ];
        return view('print/receipt', $data);
    }

    public function reservation_receipt($reservation_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Reservation Receipt',
            'page_title' => 'Reservation Receipt | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'invoice_data' => $this->reservationModel->fetchInvoiceData($reservation_no),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
        ];
        return view('print/reservation_receipt', $data);
    }

    public function close_account() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'date' => date('d-m-Y'),
            'staff_id' => session()->get('logged_user')
        ];

        $closeID = $this->transactionModel->createClose($data);

        if ($closeID) {
            $sum = $this->transactionModel->getSumOfAllOpenTransactions();

            $close_data = [
                'amount' => $sum
            ];
            $this->transactionModel->updateCloseAccount($closeID, $close_data);

            $transaction_data = [
                'close_id' => $closeID,
            ];
            $staff_id = session()->get('logged_user');
            $this->transactionModel->updateTransaction($staff_id, $transaction_data);
        }

        return redirect()->to('dashboard');
    }

    public function download_sales_report() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        //get Last Close Account ID
        $getlastID = $this->transactionModel->lastCloseID();
        $lastID = $getlastID['close_id'];

        // file name 
        $filename = 'Sales_Report_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");        

        //get data
        $openTransactions = $this->transactionModel->getAllOpenTransactions($lastID);

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("SN","Date","Title","Guest Name","Lodge No","Bill No","Amount","Payment Method","Staff Name");
        fputcsv($file, $header);
        $i = 1;
        foreach ($openTransactions as $key=>$line){ 
            fputcsv($file,array($i,$line['date'],$line['title'],$line['guest_id'],$line['lodge_no'],$line['bill_no'],$line['amount'],$line['paid_with'],$line['staff_id'])); 
            $i++;
        }
        fclose($file);
        exit;
    }
}