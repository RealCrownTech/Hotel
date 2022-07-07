<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Reservation extends Controller
{
    
    public function create()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Reservation',
            'page_title' => 'Reservation | The Ashokas',
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
                        'arrival_date' => 'required',
                        'check_out_date' => 'required',
                        'gross_amount' => 'required',
                        'total_amount' => 'required',
                        'deposit_amount' => 'required|numeric',
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
                            $reservation_no = rand(10000000,99999999);
                            $room_id = $this->request->getVar('room_no');
                            $roomtypeid = $this->request->getVar('room_type');
                            $roomtypeprice = $this->roomModel->getRoomTypeData($roomtypeid);
                            $price = $roomtypeprice['price'];
                            $reservation_data = [
                                'client_id' => $guest_id,
                                'reservation_no' => $reservation_no,
                                'room_type_id' => $this->request->getVar('room_type'),
                                'room_id' => $this->request->getVar('room_no'),
                                'reservation_date' => date('d-m-Y'),
                                'check_in_date' => date('d-m-Y h:m A', strtotime($this->request->getVar('arrival_date'))),
                                'check_out_date' => date('d-m-Y', strtotime($this->request->getVar('check_out_date'))),
                                'adult_no' => $this->request->getVar('adults'),
                                'kid_no' => $this->request->getVar('kids'),
                                'vehicle_no' => $this->request->getVar('vehicle_no'),
                                'reason' => $this->request->getVar('reason'),
                                'gross_amount' => $this->request->getVar('gross_amount'),
                                'discount' => $this->request->getVar('discount'),
                                'total_amount' => $this->request->getVar('total_amount'),
                                'deposit_amount' => $this->request->getVar('deposit_amount'),
                                'balance_amount' => $this->request->getVar('balance_amount'),
                                'payment_option' => $this->request->getVar('payment_option'),
                                'check_in_by' => session()->get('logged_user')
                            ];

                            if ($this->reservationModel->create($reservation_data)) {

                                $transaction_details = [
                                    'date' => date('d-m-Y'),
                                    'title' => 'Reservation',
                                    'guest_id' => $guest_id,
                                    'lodge_no' => $reservation_no,
                                    'amount' => $this->request->getVar('deposit_amount'),
                                    'paid_with' => $this->request->getVar('payment_option'),
                                    'staff_id' => session()->get('logged_user')
                                ];
                                $this->transactionModel->createHidden($transaction_details);

                                $this->session->setTempdata('success', 'Reservation Successful',3);
                                return redirect()->to('/reservations');
                            }else{
                                $this->session->setTempdata('error', 'Sorry! Unable to create reservation',3);
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
                        'arrival_date' => 'required',
                        'check_out_date' => 'required',
                        'gross_amount' => 'required',
                        'total_amount' => 'required',
                        'deposit_amount' => 'required|numeric',
                        'payment_option' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $reservation_no = rand(10000000,99999999);
                        $room_id = $this->request->getVar('room_no');
                        $roomtypeid = $this->request->getVar('room_type');
                        $roomtypeprice = $this->roomModel->getRoomTypeData($roomtypeid);
                        $price = $roomtypeprice['price'];
                        $reservation_data = [
                            'client_id' => $this->request->getVar('guest_id'),
                            'reservation_no' => $reservation_no,
                            'room_type_id' => $this->request->getVar('room_type'),
                            'room_id' => $this->request->getVar('room_no'),
                            'reservation_date' => date('d-m-Y'),
                            'check_in_date' => date('d-m-Y h:m A', strtotime($this->request->getVar('arrival_date'))),
                            'check_out_date' => date('d-m-Y', strtotime($this->request->getVar('check_out_date'))),
                            'adult_no' => $this->request->getVar('adults'),
                            'kid_no' => $this->request->getVar('kids'),
                            'vehicle_no' => $this->request->getVar('vehicle_no'),
                            'reason' => $this->request->getVar('reason'),
                            'gross_amount' => $this->request->getVar('gross_amount'),
                            'discount' => $this->request->getVar('discount'),
                            'total_amount' => $this->request->getVar('total_amount'),
                            'deposit_amount' => $this->request->getVar('deposit_amount'),
                            'balance_amount' => $this->request->getVar('balance_amount'),
                            'payment_option' => $this->request->getVar('payment_option'),
                            'check_in_by' => session()->get('logged_user')
                        ];

                        if ($this->reservationModel->create($reservation_data)) {

                            $transaction_details = [
                                'date' => date('d-m-Y'),
                                'title' => 'Reservation',
                                'guest_id' => $this->request->getVar('guest_id'),
                                'lodge_no' => $reservation_no,
                                'amount' => $this->request->getVar('deposit_amount'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                            $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Reservation successful',3);
                            return redirect()->to('/reservations');
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to create reservation',3);
                            return redirect()->to(current_url());
                        }
                    }
                }
            } else {
                $data['validation'] = $this->validator;
            }
        };
        return view('reservation/create', $data);
    }

    public function history() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Reservation',
            'page_title' => 'Reservation | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'reservations' => $this->reservationModel->getAllCheckin(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'sum_all_transactions' => $this->transactionModel->getSumOfAllTransactions()
        ];
       
        return view('reservation/incoming', $data);
    }

    public function logs() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Reservation',
            'page_title' => 'Check-Outs | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'reservations' => $this->reservationModel->getAllCheckOut(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'sum_all_transactions' => $this->transactionModel->getSumOfAllTransactions()
        ];

        return view('reservation/checkouts', $data);
    }

    public function invoice($reservation_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'invoice_data' => $this->reservationModel->fetchInvoiceData($reservation_no),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
            'orders' => $this->foodModel->getFoodOrder($reservation_no),
            'period' => $this->transactionModel->getInvoiceCheckInDates($reservation_no),
            'transact' => $this->transactionModel->getTransaction($reservation_no),
            'grossAmount' => $this->transactionModel->getTotalInvoiceAmount($reservation_no),
            'checkInAmount' => $this->transactionModel->getTotalCheckInAmount($reservation_no),
            'orderAmount' => $this->transactionModel->getTotalOrderAmount($reservation_no)
        ];
        return view('reservation/invoice', $data);
    }

    public function receipt($reservation_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Invoice',
            'page_title' => 'Invoice | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'invoice_data' => $this->reservationModel->fetchInvoiceData($reservation_no),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'clients' => $this->clientModel->getAllClients(),
            'staffs' => $this->userModel->getAllUsers(),
        ];
        return view('reservation/receipt', $data);
    }

    public function checkOutGuest() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $reservation_no = $this->request->getVar('reservation_no');
        $reservation_data = [
            'check_out_by' => session()->get('logged_user'),
            'checked_out' => '1'
        ];
        if ($this->reservationModel->checkout($reservation_no, $reservation_data)) {
            $roomdata =[
                'room_status' => 'Vacant',
                'reservation_no' => ''
            ];
            $this->roomModel->editRoomByReservationNo($reservation_no, $roomdata);
            $this->session->setTempdata('success', 'Guest Check-Out Successful',3);
            return redirect()->to('/list-check-outs');
        }else{
            $this->session->setTempdata('error', 'Sorry! Unable to check-out guest',3);
            return redirect()->to(current_url());
        }
        return view('reservation/checkouts', $data);
    }

    public function swap_room($reservation_no = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $reservation_data = $this->reservationModel->fetchInvoiceData($reservation_no);
        $room_id = $reservation_data['room_id'];
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Swap Room',
            'page_title' => 'Swap Room | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'reservation_data' => $this->reservationModel->fetchInvoiceData($reservation_no),
            'room_data' => $this->roomModel->getRoomData($room_id)
        ];

        $rules = [
            'room_number' => 'required'
        ];

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $reservation_data = $this->reservationModel->fetchInvoiceData($reservation_no);
                $room_id = $reservation_data['room_id'];
                $room_ids = $this->request->getVar('room_number');
                $get_room_type = $this->roomModel->getRoomData($room_ids);
                $room_type_id = $get_room_type['room_type_id'];
                $get_price = $this->roomModel->getRoomTypeData($room_type_id);
                $price = $get_price['price'];

                $todays_date = date('d-m-Y');
                $check_out_date = $reservation_data['check_out_date'];
                $start = new \DateTime($todays_date);
                $end_date = new \DateTime($check_out_date);
                $end = $end_date->modify('+0 day');
                $period = new \DatePeriod(
                    $start,
                    new \DateInterval('P1D'),
                    $end
                );

                $reservation_data = [
                    'room_type_id' => $room_type_id,
                    'room_id' => $room_ids,
                ];

                if($this->reservationModel->editReservation($reservation_no, $reservation_data)){
                    $roomvacant =[
                        'room_status' => 'Vacant',
                        'reservation_no' => ''
                    ];                                
                    $this->roomModel->editRoom($room_id, $roomvacant);

                    $roomoccupied =[
                        'room_status' => 'Occupied',
                        'reservation_no' => $reservation_no
                    ];                                
                    $this->roomModel->editRoom($room_ids, $roomoccupied);

                    foreach ($period as $value){
                        $date = $value->format('d-m-Y');
                        $transaction_data = [
                            'room_type_id' => $room_type_id,
                            'room_id' => $room_ids,
                            'amount' => $price
                        ];
                        $this->transactionModel->editTransaction($reservation_no, $date, $transaction_data);
                    }
                }else {

                }               
                $this->session->setTempdata('success', 'Room swap successful',3);
                return redirect()->to('/invoice/'.$reservation_no);
            }else{
                $error = 'Please fill correctly.';
                $this->session->setTempdata('error', $error,3);
                return redirect()->to('/rooms');
            }
        }

        return view('reservation/swap', $data);
    }
}