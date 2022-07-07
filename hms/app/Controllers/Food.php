<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Food extends Controller
{
    
    public function index() {
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Food',
            'page_title' => 'Food Order & Entry | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'foods' => $this->foodModel->getAllFoods()
        ];

        $data['validation'] = null;

        $rules = [
            'food_name' => 'required|is_unique[food.food_name]',
            'food_price' => 'required|numeric'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $fooddata = [
                    'food_name' => $this->request->getVar('food_name'),
                    'food_price' => $this->request->getVar('food_price')
                ];
                if ($this->foodModel->createFood($fooddata)) {
                    $this->session->setTempdata('success', 'Food added successfully',3);
                    return redirect()->to('/foodItems');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to add food',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('food/index', $data);
    }

    public function fetchFoodData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $food_id = $this->request->getVar('food_id');
        $data['food_data'] = $this->foodModel->getFoodData($food_id);
        return $this->response->setJSON($data);
    }

    public function fetchAllFoodData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data['food_data'] = $this->foodModel->getAllFoods();
        return $this->response->setJSON($data);
    }

    public function edit($food_id = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'page_name' => 'Food',
            'page_title' => 'Food Order & Entry | The Ashokas',
            'foods' => $this->foodModel->getAllFoods()
        ];

        $data['validation'] = null;

        $rules = [
            'food_name_edit' => 'required',
            'food_price_edit' => 'required|numeric'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $fooddata = [
                    'food_name' => $this->request->getVar('food_name_edit'),
                    'food_price' => $this->request->getVar('food_price_edit')
                ];                
                if ($this->foodModel->editFood($food_id, $fooddata)) {
                    $this->session->setTempdata('success', 'Food item edit successful',3);
                    return redirect()->to('/foodItems');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit food item',3);
                    return redirect()->to('/foodItems');
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('food/index', $data);
    }

    public function create() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Create Food Order',
            'page_title' => 'Create Food Order | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'rooms' => $this->roomModel->getAllOccupiedRoom(),
            'food' => $this->foodModel->getAllFoods()
        ];

        $data['validation'] = null;

        $rules1 = [
            'guest_type' => 'required'
        ];

        if ($this->request->getMethod() == 'post') {            
            if ($this->validate($rules1)) {
                $guest_type = $this->request->getVar('guest_type');                
                if ($guest_type == 'walk_in_guest') {
                    $rules = [
                        'payment_option' => 'required',
                        'qty' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $bill_no = rand(10000000,99999999);
                        $order_data = [
                            'bill_no' => $bill_no,
                            'category' => 'Food',
                            'client' => 'Walk-In',
                            'date' => date('d-m-Y'),
                            'amount' => $this->request->getVar('total'),
                            'payment_option' => $this->request->getVar('payment_option'),
                            'sold_by' => session()->get('logged_user')
                        ];

                        $order_id = $this->foodModel->createOrder($order_data);
                        if ($order_id) {
                            $count_item = count($this->request->getVar('item'));
                            for($x = 0; $x < $count_item; $x++) {
                                $items = array(
                                    'order_id' => $order_id,
                                    'item_id' => $this->request->getVar('item')[$x],
                                    'rate' => $this->request->getVar('rate')[$x],
                                    'qty' => $this->request->getVar('qty')[$x],
                                    'amount' => $this->request->getVar('amount')[$x]
                                );
                                $this->foodModel->createOrdersItem($items);
                            }

                            $transaction_data = [
                                'title' => 'Food Order',
                                'bill_no' => $bill_no,
                                'trans_cat' => 'income',
                                'amount' => $this->request->getVar('total'),
                                'staff_id' => session()->get('logged_user'),
                                'ptr' => '0',
                                'guest_id' => '0',
                                'date' => date('d-m-Y')
                            ];
                            $this->transactionModel->create($transaction_data);

                            $transaction_details = [
                                'date' => date('d-m-Y'),
                                'title' => 'Food Order',
                                'guest_id' => '0',
                                'bill_no' => $bill_no,
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                            $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Order created Successfuly',3);
                            return redirect()->to('/allOrder');
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to create order',3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $data['validation'] = $this->validator;
                    }
                }else {
                    $rules = [
                        'ptr' => 'required',
                        'qty' => 'required'
                    ];

                    $bill_no = rand(10000000,99999999);
                    if ($this->validate($rules)) {
                        $ptr = $this->request->getVar('ptr');
                        if ($ptr == '1') {
                            $order_data = [
                                'bill_no' => $bill_no,
                                'category' => 'Food',
                                'client' => $this->request->getVar('guest_id'),
                                'date' => date('d-m-Y'),
                                'amount' => $this->request->getVar('total'),
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'payment_option' => 'Post To Room',
                                'sold_by' => session()->get('logged_user'),
                                'ptr' => $this->request->getVar('ptr'),
                            ];

                            $transaction_details = [
                                'date' => date('d-m-Y'),
                                'title' => 'Food Order',
                                'guest_id' => $this->request->getVar('guest_id'),
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'bill_no' => $bill_no,
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => 'Post To Room',
                                'staff_id' => session()->get('logged_user')
                            ];

                        } else {
                            $order_data = [
                                'bill_no' => $bill_no,
                                'category' => 'Food',
                                'client' => $this->request->getVar('guest_id'),
                                'date' => date('d-m-Y'),
                                'amount' => $this->request->getVar('total'),
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'payment_option' => $this->request->getVar('payment_option'),
                                'sold_by' => session()->get('logged_user'),
                                'ptr' => $this->request->getVar('ptr'),
                            ];

                            $transaction_details = [
                                'date' => date('d-m-Y'),
                                'title' => 'Food Order',
                                'guest_id' => $this->request->getVar('guest_id'),
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'bill_no' => $bill_no,
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];                            
                        }                       
                        
                        $order_id = $this->foodModel->createOrder($order_data);

                        if ($order_id) {
                            $count_item = count($this->request->getVar('item'));
                            for($x = 0; $x < $count_item; $x++) {
                                $items = array(
                                    'order_id' => $order_id,
                                    'item_id' => $this->request->getVar('item')[$x],
                                    'rate' => $this->request->getVar('rate')[$x],
                                    'qty' => $this->request->getVar('qty')[$x],
                                    'amount' => $this->request->getVar('amount')[$x]
                                );
                                $this->foodModel->createOrdersItem($items);
                            }

                            $transaction_data = [
                                'title' => 'Food Order',
                                'trans_cat' => 'income',
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'amount' => $this->request->getVar('total'),
                                'staff_id' => session()->get('logged_user'),
                                'guest_id' => $this->request->getVar('guest_id'),                                
                                'ptr' => $this->request->getVar('ptr'),
                                'date' => date('d-m-Y')
                            ];
                            $this->transactionModel->create($transaction_data);

                            
                            $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Order created Successfuly',3);
                            return redirect()->to('/allOrder');
                        }else{
                            $this->session->setTempdata('error', 'Sorry! Unable to create order',3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $data['validation'] = $this->validator;
                    }
                }
            }else {
                $data['validation'] = $this->validator;
            }
        }
        return view('food/create', $data);
    }

    public function fetchGuestRoomAndData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $room_id = $this->request->getVar('room_id');
        $room_data = $this->roomModel->getRoomData($room_id);
        $lodge_no = $room_data['lodge_no'];
        $lodge_data = $this->lodgeModel->fetchInvoiceData($lodge_no);
        $guest_id = $lodge_data['client_id'];
        $data['lodge_no'] = $lodge_no;
        $data['guest_data'] = $this->clientModel->getClientData($guest_id);
        return $this->response->setJSON($data);
    }

    public function orders() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'All Time Order',
            'page_title' => 'All Time Order | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'orders' => $this->foodModel->getAllFoodOrder(),
            'clients' => $this->clientModel->getAllClients()
        ];

        $data['validation'] = null;

        return view('food/view', $data);
    }

    public function invoice($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'All Time Order',
            'page_title' => 'All Time Order | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'foods' => $this->foodModel->getAllFoods(),
            'orders' => $this->foodModel->getFoodOrderData($id),
            'orders_data' => $this->foodModel->getFoodOrderItemData($id),
            'clients' => $this->clientModel->getAllClients()
        ];

        $data['validation'] = null;
        $orders = $this->foodModel->getFoodOrderData($id);

        return view('food/invoice', $data);
    }

    public function deleteFood($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->foodModel->deleteFood($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Food item delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete food item',3);
        }
        return redirect()->to('/foodItems');
    }

    public function deleteFoodOrder($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->foodModel->deleteFoodOrder($id);
        $do_delete_item = $this->foodModel->deleteFoodOrdersItem($id);
        if ($do_delete && $do_delete_item) {
            $this->session->setTempdata('success', 'Food order delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete food order',3);
        }
        return redirect()->to('/allOrder');
    }
}