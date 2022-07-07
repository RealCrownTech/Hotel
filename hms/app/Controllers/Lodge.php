<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Lodge extends Controller
{
    
    public function check_in()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Lodge',
            'page_title' => 'Check-In Client | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clients' => $this->clientModel->getAllClients(),
            'room_types' => $this->roomModel->getAllRoomType(),
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
                        'room_type' => 'required',
                        'room_no' => 'required',
                        'check_in_date' => 'required',
                        'check_out_date' => 'required',
                        'gross_amount' => 'required',
                        'total_amount' => 'required',
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
                            $lodge_no = rand(10000000,99999999);
                            $room_id = $this->request->getVar('room_no');
                            $roomtypeid = $this->request->getVar('room_type');
                            $roomtypeprice = $this->roomModel->getRoomTypeData($roomtypeid);
                            $price = $roomtypeprice['price'];
                            $start = new \DateTime($this->request->getVar('check_in_date'));
                            $end_date = new \DateTime($this->request->getVar('check_out_date'));
                            $end = $end_date->modify('+0 day');
                            $period = new \DatePeriod(
                                $start,
                                new \DateInterval('P1D'),
                                $end
                            );
                            $lodge_data = [
                                'client_id' => $guest_id,
                                'lodge_no' => $lodge_no,
                                'room_type_id' => $this->request->getVar('room_type'),
                                'room_id' => $this->request->getVar('room_no'),
                                'check_in_date' => date('d-m-Y h:m a', strtotime($this->request->getVar('check_in_date'))),
                                'check_out_date' => date('d-m-Y', strtotime($this->request->getVar('check_out_date'))),
                                'adult_no' => $this->request->getVar('adults'),
                                'kid_no' => $this->request->getVar('kids'),
                                'vehicle_no' => $this->request->getVar('vehicle_no'),
                                'reason' => $this->request->getVar('reason'),
                                'gross_amount' => $this->request->getVar('gross_amount'),
                                'discount' => $this->request->getVar('discount'),
                                'total_amount' => $this->request->getVar('total_amount'),
                                'payment_option' => $this->request->getVar('payment_option'),
                                'check_in_by' => session()->get('logged_user')
                            ];

                            if ($this->lodgeModel->create($lodge_data)) {

                                $roomdata =[
                                    'room_status' => 'Occupied',
                                    'lodge_no' => $lodge_no
                                ];                                
                                $this->roomModel->editRoom($room_id, $roomdata);

                                foreach ($period as $value){
                                    $transaction_data = [
                                        'title' => 'Check-In',
                                        'trans_cat' => 'income',
                                        'lodge_no' => $lodge_no,
                                        'amount' => $price,
                                        'room_type_id' => $roomtypeid,
                                        'room_id' => $room_id,
                                        'staff_id' => session()->get('logged_user'),
                                        'guest_id' => $guest_id,
                                        'ptr' => '1',
                                        'date' => $value->format('d-m-Y')
                                    ];
                                    $this->transactionModel->create($transaction_data);
                                }

                                $transaction_details = [
                                    'date' => date('d-m-Y', strtotime($this->request->getVar('check_in_date'))),
                                    'title' => 'Check-In',
                                    'guest_id' => $guest_id,
                                    'lodge_no' => $lodge_no,
                                    'amount' => $this->request->getVar('total_amount'),
                                    'paid_with' => $this->request->getVar('payment_option'),
                                    'staff_id' => session()->get('logged_user')
                                ];
                                $this->transactionModel->createHidden($transaction_details);

                                $this->session->setTempdata('success', 'Guest Check-In Successful',3);
                                return redirect()->to('/list-check-ins');
                            }else{
                                $this->session->setTempdata('error', 'Sorry! Unable to check-in guest',3);
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
                        'room_type' => 'required',
                        'room_no' => 'required',
                        'check_in_date' => 'required',
                        'check_out_date' => 'required',
                        'gross_amount' => 'required',
                        'total_amount' => 'required',
                        'payment_option' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $lodge_no = rand(10000000,99999999);
                        $room_id = $this->request->getVar('room_no');
                        $roomtypeid = $this->request->getVar('room_type');
                        $roomtypeprice = $this->roomModel->getRoomTypeData($roomtypeid);
                        $price = $roomtypeprice['price'];
                        $start = new \DateTime($this->request->getVar('check_in_date'));
                        $end_date = new \DateTime($this->request->getVar('check_out_date'));
                        $end = $end_date->modify('+0 day');
                        $period = new \DatePeriod(
                            $start,
                            new \DateInterval('P1D'),
                            $end
                        );
                        $lodge_data = [
                            'client_id' => $this->request->getVar('guest_id'),
                            'lodge_no' => $lodge_no,
                            'room_type_id' => $this->request->getVar('room_type'),
                            'room_id' => $this->request->getVar('room_no'),
                            'check_in_date' => date('d-m-Y h:m A', strtotime($this->request->getVar('check_in_date'))),
                            'check_out_date' => date('d-m-Y', strtotime($this->request->getVar('check_out_date'))),
                            'adult_no' => $this->request->getVar('adults'),
                            'kid_no' => $this->request->getVar('kids'),
                            'vehicle_no' => $this->request->getVar('vehicle_no'),
                            'reason' => $this->request->getVar('reason'),
                            'gross_amount' => $this->request->getVar('gross_amount'),
                            'discount' => $this->request->getVar('discount'),
                            'total_amount' => $this->request->getVar('total_amount'),
                            'payment_option' => $this->request->getVar('payment_option'),
                            'check_in_by' => session()->get('logged_user')
                        ];

                        if ($this->lodgeModel->create($lodge_data)) {

                            $roomdata =[
                                'room_status' => 'Occupied',
                                'lodge_no' => $lodge_no
                            ];

                            foreach ($period as $value){
                                $transaction_data = [
                                    'ptr' => '1',
                                    'title' => 'Check-In',
                                    'trans_cat' => 'income',
                                    'lodge_no' => $lodge_no,
                                    'amount' => $price,
                                    'room_type_id' => $roomtypeid,
                                    'room_id' => $room_id,
                                    'staff_id' => session()->get('logged_user'),
                                    'guest_id' => $this->request->getVar('guest_id'),
                                    'date' => $value->format('d-m-Y')
                                ];
                                $this->transactionModel->create($transaction_data);
                            }

                            $transaction_details = [
                                'date' => date('d-m-Y', strtotime($this->request->getVar('check_in_date'))),
                                'title' => 'Check-In',
                                'guest_id' => $this->request->getVar('guest_id'),
                                'lodge_no' => $lodge_no,
                                'amount' => $this->request->getVar('total_amount'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                            $this->transactionModel->createHidden($transaction_details);

                            $this->roomModel->editRoom($room_id, $roomdata);

                            $this->session->setTempdata('success', 'Guest Check-In Successful',3);
                            return redirect()->to('/list-check-ins');
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to check-in guest',3);
                            return redirect()->to(current_url());
                        }
                    }
                }
            } else {
                $data['validation'] = $this->validator;
            }
        };
        return view('lodge/create', $data);
    }

    public function history() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Lodge',
            'page_title' => 'Check-Ins | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'lodges' => $this->lodgeModel->getAllCheckin(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'sum_all_transactions' => $this->transactionModel->getSumOfAllTransactions()
        ];
       
        return view('lodge/checkins', $data);
    }

    public function logs() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Lodge',
            'page_title' => 'Check-Outs | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'lodges' => $this->lodgeModel->getAllCheckOut(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'sum_all_transactions' => $this->transactionModel->getSumOfAllTransactions()
        ];

        return view('lodge/checkouts', $data);
    }

    public function invoice($lodge_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
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
        return view('lodge/invoice', $data);
    }

    public function receipt($lodge_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
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
        return view('lodge/receipt', $data);
    }

    public function checkOutGuest() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $lodge_no = $this->request->getVar('lodge_no');
        $lodge_data = [
            'check_out_by' => session()->get('logged_user'),
            'checked_out' => '1'
        ];
        if ($this->lodgeModel->checkout($lodge_no, $lodge_data)) {
            $roomdata =[
                'room_status' => 'Vacant',
                'lodge_no' => ''
            ];
            $this->roomModel->editRoomByLodgeNo($lodge_no, $roomdata);
            $this->session->setTempdata('success', 'Guest Check-Out Successful',3);
            return redirect()->to('/list-check-outs');
        }else{
            $this->session->setTempdata('error', 'Sorry! Unable to check-out guest',3);
            return redirect()->to(current_url());
        }
        return view('lodge/checkouts', $data);
    }

    public function swap_room($lodge_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $lodge_data = $this->lodgeModel->fetchInvoiceData($lodge_no);
        $room_id = $lodge_data['room_id'];
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Swap Room',
            'page_title' => 'Swap Room | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'lodge_data' => $this->lodgeModel->fetchInvoiceData($lodge_no),
            'room_data' => $this->roomModel->getRoomData($room_id)
        ];

        $rules = [
            'room_number' => 'required'
        ];

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $lodge_data = $this->lodgeModel->fetchInvoiceData($lodge_no);
                $room_id = $lodge_data['room_id'];
                $room_ids = $this->request->getVar('room_number');
                $get_room_type = $this->roomModel->getRoomData($room_ids);
                $room_type_id = $get_room_type['room_type_id'];
                $get_price = $this->roomModel->getRoomTypeData($room_type_id);
                $price = $get_price['price'];

                $todays_date = date('d-m-Y');
                $check_out_date = $lodge_data['check_out_date'];
                $start = new \DateTime($todays_date);
                $end_date = new \DateTime($check_out_date);
                $end = $end_date->modify('+0 day');
                $period = new \DatePeriod(
                    $start,
                    new \DateInterval('P1D'),
                    $end
                );

                $lodge_data = [
                    'room_type_id' => $room_type_id,
                    'room_id' => $room_ids,
                ];

                if($this->lodgeModel->editLodge($lodge_no, $lodge_data)){
                    $roomvacant =[
                        'room_status' => 'Vacant',
                        'lodge_no' => ''
                    ];                                
                    $this->roomModel->editRoom($room_id, $roomvacant);

                    $roomoccupied =[
                        'room_status' => 'Occupied',
                        'lodge_no' => $lodge_no
                    ];                                
                    $this->roomModel->editRoom($room_ids, $roomoccupied);

                    foreach ($period as $value){
                        $date = $value->format('d-m-Y');
                        $transaction_data = [
                            'room_type_id' => $room_type_id,
                            'room_id' => $room_ids,
                            'amount' => $price
                        ];
                        $this->transactionModel->editTransaction($lodge_no, $date, $transaction_data);
                    }
                }else {

                }               
                $this->session->setTempdata('success', 'Room swap successful',3);
                return redirect()->to('/invoice/'.$lodge_no);
            }else{
                $error = 'Please fill correctly.';
                $this->session->setTempdata('error', $error,3);
                return redirect()->to('/rooms');
            }
        }

        return view('lodge/swap', $data);
    }

    public function edit_lodge($lodge_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Edit Lodge',
            'page_title' => 'Edit Lodge | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clients' => $this->clientModel->getAllClients(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'room' => $this->roomModel->getAllRoom(),
            'lodge_data' => $this->lodgeModel->fetchInvoiceData($lodge_no),
        ];
        $data['validation'] = null;

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'guest_id' => 'required',
                'room_type' => 'required',
                'room_no' => 'required',
                'check_in_datee' => 'required',
                'check_out_date' => 'required',
                'gross_amount' => 'required',
                'total_amount' => 'required',
                'payment_option' => 'required'
            ];

            if ($this->validate($rules)) {
                $lodge_info = $this->lodgeModel->fetchInvoiceData($lodge_no);
                $prevroomid = $lodge_info['room_id'];
                $lodge_no = $lodge_no;
                $room_id = $this->request->getVar('room_no');
                $roomtypeid = $this->request->getVar('room_type');
                $roomtypeprice = $this->roomModel->getRoomTypeData($roomtypeid);
                $price = $roomtypeprice['price'];
                $start = new \DateTime($this->request->getVar('check_in_datee'));
                $end_date = new \DateTime($this->request->getVar('check_out_date'));
                $end = $end_date->modify('+0 day');
                $period = new \DatePeriod(
                    $start,
                    new \DateInterval('P1D'),
                    $end
                );
                
                $deleteLodge = $this->lodgeModel->deleteLodge($lodge_no);
                if ($deleteLodge) {

                    $lodge_data = [
                        'client_id' => $this->request->getVar('guest_id'),
                        'lodge_no' => $lodge_no,
                        'room_type_id' => $this->request->getVar('room_type'),
                        'room_id' => $this->request->getVar('room_no'),
                        'check_in_date' => date('d-m-Y h:m A', strtotime($this->request->getVar('check_in_datee'))),
                        'check_out_date' => date('d-m-Y', strtotime($this->request->getVar('check_out_date'))),
                        'adult_no' => $this->request->getVar('adults'),
                        'kid_no' => $this->request->getVar('kids'),
                        'vehicle_no' => $this->request->getVar('vehicle_no'),
                        'reason' => $this->request->getVar('reason'),
                        'gross_amount' => $this->request->getVar('gross_amount'),
                        'discount' => $this->request->getVar('discount'),
                        'total_amount' => $this->request->getVar('total_amount'),
                        'payment_option' => $this->request->getVar('payment_option'),
                        'check_in_by' => session()->get('logged_user')
                    ];

                    if ($this->lodgeModel->create($lodge_data)) {

                        $delete_transaction = $this->transactionModel->deleteTransaction($lodge_no);
                        if ($delete_transaction) {
                            foreach ($period as $value){
                                $transaction_data = [
                                    'ptr' => '1',
                                    'title' => 'Check-In',
                                    'trans_cat' => 'income',
                                    'lodge_no' => $lodge_no,
                                    'amount' => $price,
                                    'room_type_id' => $roomtypeid,
                                    'room_id' => $room_id,
                                    'staff_id' => session()->get('logged_user'),
                                    'guest_id' => $this->request->getVar('guest_id'),
                                    'date' => $value->format('d-m-Y')
                                ];
                                $this->transactionModel->create($transaction_data);
                            }
                        }

                        $deleteHiddenTransaction = $this->transactionModel->deleteHiddenTransaction($lodge_no);
                        if ($deleteHiddenTransaction) {
                            $transaction_details = [
                                'date' => date('d-m-Y', strtotime($this->request->getVar('check_in_datee'))),
                                'title' => 'Check-In Modify',
                                'guest_id' => $this->request->getVar('guest_id'),
                                'lodge_no' => $lodge_no,
                                'amount' => $this->request->getVar('total_amount'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                            $this->transactionModel->createHidden($transaction_details);
                        }

                        $prevroomdata = [
                            'room_status' => 'Vacant',
                            'lodge_no' => ''
                        ];
                        if ($this->roomModel->editRoom($prevroomid, $prevroomdata)) {
                            $roomdata = [
                                'room_status' => 'Occupied',
                                'lodge_no' => $lodge_no
                            ];
                            $this->roomModel->editRoom($room_id, $roomdata);
                        }

                        $this->session->setTempdata('success', 'Guest Check-In Update Successful',3);
                        return redirect()->to('/list-check-ins');
                    }else{
                        $this->session->setTempdata('error', 'Sorry! Unable to update guest check-in',3);
                        return redirect()->to(current_url());
                    }
                }
            }
        }

        return view('lodge/edit', $data);
    }
}