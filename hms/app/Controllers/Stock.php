<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Stock extends Controller
{
    
    public function index() {
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Stock',
            'page_title' => 'Stock Order & Entry | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'stocks' => $this->stockModel->getAllStocks()
        ];

        $data['validation'] = null;

        $rules = [
            'stock_name' => 'required|is_unique[stock.stock_name]',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $stockdata = [
                    'stock_name' => $this->request->getVar('stock_name'),
                    'cost_price' => $this->request->getVar('cost_price'),
                    'selling_price' => $this->request->getVar('selling_price'),
                    'stock_qty' => $this->request->getVar('quantity')
                ];
                if ($this->stockModel->createStock($stockdata)) {
                    $this->session->setTempdata('success', 'Stock added successfully',3);
                    return redirect()->to('/stockItems');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to add stock',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('stock/index', $data);
    }

    public function fetchStockData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $stock_id = $this->request->getVar('stock_id');
        $data['stock_data'] = $this->stockModel->getStockData($stock_id);
        return $this->response->setJSON($data);
    }

    public function fetchAllStockData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data['stock_data'] = $this->stockModel->getAllStocks();
        return $this->response->setJSON($data);
    }

    public function edit($stock_id = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'page_name' => 'Stock',
            'page_title' => 'Stock Order & Entry | The Ashokas',
            'stocks' => $this->stockModel->getAllStocks()
        ];

        $data['validation'] = null;

        $rules = [
            'stock_name_edit' => 'required',
            'selling_price_edit' => 'required|numeric',
            'quantity_edit' => 'required|numeric'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $stockdata = [
                    'stock_name' => $this->request->getVar('stock_name_edit'),
                    'cost_price' => $this->request->getVar('cost_price_edit'),
                    'selling_price' => $this->request->getVar('selling_price_edit'),
                    'stock_qty' => $this->request->getVar('quantity_edit')
                ];
                if ($this->stockModel->editStock($stock_id, $stockdata)) {
                    $this->session->setTempdata('success', 'Stock item edit successful',3);
                    return redirect()->to('/stockItems');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit stock item',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('stock/index', $data);
    }

    public function create() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Create Stock Order',
            'page_title' => 'Create Stock Order | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'rooms' => $this->roomModel->getAllOccupiedRoom(),
            'stock' => $this->stockModel->getAllStocks()
        ];

        $data['validation'] = null;

        $rules1 = [
            'guest_type' => 'required'
        ];

        if ($this->request->getMethod() == 'post') {            
            if ($this->validate($rules1)) {
                $guest_type = $this->request->getVar('guest_type');
                // $stock = $this->stockModel->getAllStocks();
                // $prev_qty = $stock['stock_qty'];                
                if ($guest_type == 'walk_in_guest') {
                    $rules = [
                        'payment_option' => 'required',
                        'qty' => 'required'
                    ];

                    if ($this->validate($rules)) {
                        $bill_no = rand(10000000,99999999);
                        $order_data = [
                            'bill_no' => $bill_no,
                            'client' => 'Walk-In',
                            'category' => 'Stock',
                            'date' => date('d-m-Y'),
                            'amount' => $this->request->getVar('total'),
                            'payment_option' => $this->request->getVar('payment_option'),
                            'sold_by' => session()->get('logged_user')
                        ];

                        $order_id = $this->stockModel->createOrder($order_data);
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
                                $this->stockModel->createOrdersItem($items);

                                $item_id = $this->request->getVar('item')[$x];
                                $stock = $this->stockModel->getStockData($item_id);
                                $stock_qty = $stock['stock_qty'];
                                $qty = $stock_qty - $this->request->getVar('qty')[$x];
                                echo $qty;
                                $stock_data = [
                                    'stock_qty' => $qty,
                                ];
                                $this->stockModel->editStock($item_id, $stock_data);
                            }

                            $transaction_data = [
                                'title' => 'Stock Order',
                                'guest_id' => '0',
                                'bill_no' => $bill_no,
                                'trans_cat' => 'income',
                                'amount' => $this->request->getVar('total'),
                                'ptr' => '0',
                                'staff_id' => session()->get('logged_user'),
                                'date' => date('d-m-Y')
                            ];
                            $this->transactionModel->create($transaction_data);

                            $transaction_details = [
                                'date' => date('d-m-Y'),
                                'title' => 'Stock Order',
                                'guest_id' => '0',
                                'bill_no' => $bill_no,
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                            $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Order created Successfuly',3);
                            return redirect()->to('/allStockOrder');
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
                                'category' => 'Stock',
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
                                'title' => 'Stock Order',
                                'bill_no' => $bill_no,
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'guest_id' => $this->request->getVar('guest_id'),
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => 'Post To Room',
                                'staff_id' => session()->get('logged_user')
                            ];
                        } else {
                            $order_data = [
                                'bill_no' => $bill_no,
                                'category' => 'Stock',
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
                                'title' => 'Stock Order',
                                'bill_no' => $bill_no,
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'guest_id' => $this->request->getVar('guest_id'),
                                'amount' => $this->request->getVar('total'),
                                'paid_with' => $this->request->getVar('payment_option'),
                                'staff_id' => session()->get('logged_user')
                            ];
                        }                       
                        
                        $order_id = $this->stockModel->createOrder($order_data);

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
                                $this->stockModel->createOrdersItem($items);

                                $item_id = $this->request->getVar('item')[$x];
                                $stock = $this->stockModel->getStockData($item_id);
                                $stock_qty = $stock['stock_qty'];
                                $qty = $stock_qty - $this->request->getVar('qty')[$x];
                                echo $qty;
                                $stock_data = [
                                    'stock_qty' => $qty,
                                ];
                                $this->stockModel->editStock($item_id, $stock_data);
                            }

                            $transaction_data = [
                                'title' => 'Stock Order',
                                'bill_no' => $bill_no,
                                'trans_cat' => 'income',
                                'lodge_no' => $this->request->getVar('lodge_no'),
                                'staff_id' => session()->get('logged_user'),
                                'guest_id' => $this->request->getVar('guest_id'),
                                'amount' => $this->request->getVar('total'),
                                'ptr' => $this->request->getVar('ptr'),
                                'date' => date('d-m-Y')
                            ];
                            $this->transactionModel->create($transaction_data);

                            $this->transactionModel->createHidden($transaction_details);

                            $this->session->setTempdata('success', 'Order created Successfuly',3);
                            return redirect()->to('/allStockOrder');
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
        return view('stock/create', $data);
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
            'orders' => $this->stockModel->getAllStockOrder(),
            'clients' => $this->clientModel->getAllClients()
        ];

        $data['validation'] = null;

        return view('stock/view', $data);
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
            'stocks' => $this->stockModel->getAllStocks(),
            'orders' => $this->stockModel->getStockOrderData($id),
            'orders_data' => $this->stockModel->getStockOrderItemData($id),
            'clients' => $this->clientModel->getAllClients()
        ];

        $data['validation'] = null;

        return view('stock/invoice', $data);
    }

    public function deleteStock($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->stockModel->deleteStock($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Stock item delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete stock item',3);
        }
        return redirect()->to('/stockItems');
    }

    public function deleteStockOrder($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->stockModel->deleteStockOrder($id);
        $do_delete_item = $this->stockModel->deleteStockOrdersItem($id);
        if ($do_delete && $do_delete_item) {
            $this->session->setTempdata('success', 'Stock order delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete stock order',3);
        }
        return redirect()->to('/allStockOrder');
    }
}