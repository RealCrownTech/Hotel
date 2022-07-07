<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Payment extends Controller
{
    
    public function create()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Payment',
            'page_title' => 'Payment | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clients' => $this->clientModel->getAllClients(),
        ];
        $data['validation'] = null;

        $rules1 = [
            'guest_type' => 'required'
        ];
        

        if ($this->request->getMethod() == 'post') {            
            if ($this->validate($rules1)) {
                $guest_type = $this->request->getVar('guest_type');                
                if ($guest_type == 'new_guest') {
                    $rules = [
                        'client_title' => 'required|min_length[2]|max_length[5]',
                        'first_name' => 'required|min_length[3]|max_length[16]',
                        'last_name' => 'required|min_length[3]|max_length[16]',
                        'guest_email' => 'required|valid_email|is_unique[clients.client_email]',
                        'guest_mobile' => 'required|numeric|exact_length[11]',
                        'guest_occupation' => 'required',
                        'address' => 'required',
                        'amount' => 'required|numeric',
                        'being' => 'required',
                        'payment_option' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $guest_data = [
                            'client_title' => $this->request->getVar('client_title'),
                            'first_name' => $this->request->getVar('first_name'),
                            'middle_name' => $this->request->getVar('middle_name'),
                            'last_name' => $this->request->getVar('last_name'),
                            'client_email' => $this->request->getVar('guest_email'),
                            'mobile' => $this->request->getVar('guest_mobile'),
                            'occupation' => $this->request->getVar('guest_occupation'),
                            'address' => $this->request->getVar('address'),
                            'join_date' => date('d-m-Y')
                        ];

                        $guest_id = $this->clientModel->create_guest($guest_data);

                        if($guest_id) {
                            $payment_no = rand(10000000,99999999);
                            $payment_data = [
                                'client_id' => $guest_id,
                                'payment_no' => $payment_no,
                                'payment_date' => date('d-m-Y'),
                                'amount' => $this->request->getVar('amount'),
                                'being' => $this->request->getVar('being'),
                                'payment_option' => $this->request->getVar('payment_option'),
                                'payment_by' => session()->get('logged_user')
                            ];

                            if ($this->paymentModel->create($payment_data)) {

                                // $transaction_details = [
                                //     'date' => date('d-m-Y'),
                                //     'title' => 'Reservation',
                                //     'guest_id' => $guest_id,
                                //     'lodge_no' => $reservation_no,
                                //     'amount' => $this->request->getVar('deposit_amount'),
                                //     'paid_with' => $this->request->getVar('payment_option'),
                                //     'staff_id' => session()->get('logged_user')
                                // ];
                                // $this->transactionModel->createHidden($transaction_details);

                                $this->session->setTempdata('success', 'Payment Successful',3);
                                return redirect()->to('/reservations');
                            }else{
                                $this->session->setTempdata('error', 'Sorry! Unable to add payment',3);
                                return redirect()->to(current_url());
                            }
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to save guest details',3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $data['validation'] = $this->validator;
                    }
                } else {
                    $rules = [
                        'guest_id' => 'required',
                        'amount' => 'required|numeric',
                        'being' => 'required',
                        'payment_option' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $payment_no = rand(10000000,99999999);
                        $payment_data = [
                            'client_id' => $this->request->getVar('guest_id'),
                            'payment_no' => $payment_no,
                            'payment_date' => date('d-m-Y'),
                            'amount' => $this->request->getVar('amount'),
                            'being' => $this->request->getVar('being'),
                            'payment_option' => $this->request->getVar('payment_option'),
                            'payment_by' => session()->get('logged_user')
                        ];

                        if ($this->paymentModel->create($payment_data)) {

                            // $transaction_details = [
                            //     'date' => date('d-m-Y'),
                            //     'title' => 'Reservation',
                            //     'guest_id' => $this->request->getVar('guest_id'),
                            //     'lodge_no' => $reservation_no,
                            //     'amount' => $this->request->getVar('deposit_amount'),
                            //     'paid_with' => $this->request->getVar('payment_option'),
                            //     'staff_id' => session()->get('logged_user')
                            // ];
                            // $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Payment successful',3);
                            return redirect()->to('/reservations');
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to add payment',3);
                            return redirect()->to(current_url());
                        }
                    }
                }
            } else {
                $data['validation'] = $this->validator;
            }
        };
        return view('payment/create', $data);
    }

    public function allpayments() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Reservation',
            'page_title' => 'Reservation | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'payments' => $this->paymentModel->getAllPayment(),
            'clients' => $this->clientModel->getAllClients()
        ];
       
        return view('payment/allpayment', $data);
    }

    public function receipt($payment_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'payment_data' => $this->paymentModel->fetchPaymentData($payment_no),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
        ];
        return view('payment/receipt', $data);
    }

    public function payment_receipt($payment_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'payment_data' => $this->paymentModel->fetchPaymentData($payment_no),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
        ];
        return view('print/payment_receipt', $data);
    }
}