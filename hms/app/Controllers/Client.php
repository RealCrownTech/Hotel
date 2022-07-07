<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Client extends Controller
{
    
    public function create()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Add Client',
            'page_title' => 'Add Client | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles()
        ];
        $data['validation'] = null;

        $rules = [
        	'client_title' => 'required|min_length[2]|max_length[5]',
            'first_name' => 'required|min_length[3]|max_length[16]',
            'last_name' => 'required|min_length[3]|max_length[16]',
            // 'client_email' => 'required|valid_email|is_unique[clients.client_email]',
            'mobile' => 'required|numeric|exact_length[11]',
            // 'occupation' => 'required',
            'address' => 'required',
            // 'kin_name' => 'required|min_length[3]|max_length[50]',
            // 'kin_mobile' => 'required|numeric|exact_length[11]'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $clientdata = [
                    'client_title' => $this->request->getVar('client_title'),
                    'first_name' => $this->request->getVar('first_name'),
                    'middle_name' => $this->request->getVar('middle_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'client_email' => $this->request->getVar('client_email'),
                    'mobile' => $this->request->getVar('mobile'),
                    'occupation' => $this->request->getVar('occupation'),
                    'address' => $this->request->getVar('address'),
                    'kin_name' => $this->request->getVar('kin_name'),
                    'kin_mobile' => $this->request->getVar('kin_mobile'),
                    'join_date' => date('d-m-Y')
                ];
                if ($this->clientModel->create($clientdata)) {
                    $this->session->setTempdata('success', 'Client added successfully',3);
                    return redirect()->to('/clients');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to add client',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('client/add', $data);
    }

    public function edit($client_id = '')
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Edit Client Profile',
            'page_title' => 'Edit Client Profile | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clientele' => $this->clientModel->getClientData($client_id)
        ];
        $data['validation'] = null;

        $rules = [
            'client_title' => 'required|min_length[2]|max_length[5]',
            'first_name' => 'required|min_length[3]|max_length[16]',
            'last_name' => 'required|min_length[3]|max_length[16]',
            // 'client_email' => 'required|valid_email',
            'mobile' => 'required|numeric|exact_length[11]',
            // 'occupation' => 'required',
            'address' => 'required',
            // 'kin_name' => 'required|min_length[3]|max_length[50]',
            // 'kin_mobile' => 'required|numeric|exact_length[11]'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $clientdata = [
                    'client_title' => $this->request->getVar('client_title'),
                    'first_name' => $this->request->getVar('first_name'),
                    'middle_name' => $this->request->getVar('middle_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'client_email' => $this->request->getVar('client_email'),
                    'mobile' => $this->request->getVar('mobile'),
                    'occupation' => $this->request->getVar('occupation'),
                    'address' => $this->request->getVar('address'),
                    'kin_name' => $this->request->getVar('kin_name'),
                    'kin_mobile' => $this->request->getVar('kin_mobile')
                ];
                if ($this->clientModel->edit($client_id, $clientdata)) {
                    $this->session->setTempdata('success', 'Client profile edit successful',3);
                    return redirect()->to('/viewProfile/'.$client_id);
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit client profile',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('client/edit', $data);
    }

    public function view() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Clients',
            'page_title' => 'All Clients | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clientele' => $this->clientModel->getAllClients()
        ];
        return view('client/view', $data);
    }

    public function profile($client_id = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Client Profile',
            'page_title' => 'Client Profile | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'clientele' => $this->clientModel->getClientData($client_id),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'lodge_data' => $this->lodgeModel->getLodgeData($client_id),
            'sum_all_transactions' => $this->transactionModel->getSumOfAllTransactions()
        ];

        return view('client/profile', $data);
    }

    public function fetchClientData() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $client_id = $this->request->getVar('guest_id');
        $data['clientdata'] = $this->clientModel->getClientData($client_id);
        return $this->response->setJSON($data);

        return view('client/profile', $data);
    }

    public function deleteClient($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->clientModel->deleteClient($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Client delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete client',3);
        }
        return redirect()->to('/clients');
    }
}