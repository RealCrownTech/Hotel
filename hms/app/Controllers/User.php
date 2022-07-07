<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class User extends Controller
{    

    public function create()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Add User',
            'page_title' => 'Add User | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
        ];
        $data['validation'] = null;

        $rules = [
            'user_role' => 'required',
            'first_name' => 'required|min_length[3]|max_length[16]',
            'last_name' => 'required|min_length[3]|max_length[16]',
            'user_password' => 'required|min_length[6]',
            'user_email' => 'required|is_unique[users.email]',
            'user_status' => 'required'
        ];

        if ($this->request->getMethod() == 'post') {

            if ($this->validate($rules)) {
                $userdata = [
                    'user_role' => $this->request->getVar('user_role'),
                    'first_name' => $this->request->getVar('first_name'),
                    // 'middle_name' => $this->request->getVar('middle_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'email' => $this->request->getVar('user_email'),
                    // 'mobile' => $this->request->getVar('user_mobile'),
                    // 'gender' => $this->request->getVar('gender'),
                    'user_status' => $this->request->getVar('user_status'),
                    // 'state' => $this->request->getVar('user_state'),
                    // 'address' => $this->request->getVar('address'),
                    'join_date' => date('d-m-Y'),
                    // 'password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
                    'password' => $this->request->getVar('user_password')
                ];
                if ($this->userModel->create($userdata)) {
                    $this->session->setTempdata('success', 'User added successfully',3);
                    return redirect()->to('/users');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to add user',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('users/add', $data);
    }

    public function edit($user_id = '')
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Edit User Profile',
            'page_title' => 'Edit User Profile | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'user_info' => $this->userModel->getUserData($user_id)
        ];
        $data['validation'] = null;

        if ($this->request->getVar('user_password') == '') {
            $rules = [
                'user_role' => 'required',
                'first_name' => 'required|min_length[3]|max_length[16]',
                // 'middle_name' => 'required|min_length[3]|max_length[16]',
                'last_name' => 'required|min_length[3]|max_length[16]',
                'user_email' => 'required',
                // 'user_mobile' => 'required|numeric|exact_length[11]',
                // 'gender' => 'required',
                'user_status' => 'required',
                // 'user_state' => 'required',
                // 'address' => 'required'
            ];
        }else{
            $rules = [
                'user_role' => 'required',
                'first_name' => 'required|min_length[3]|max_length[16]',
                // 'middle_name' => 'required|min_length[3]|max_length[16]',
                'last_name' => 'required|min_length[3]|max_length[16]',
                'user_email' => 'required',
                'user_password' => 'min_length[6]',
                // 'user_mobile' => 'required|numeric|exact_length[11]',
                // 'gender' => 'required',
                'user_status' => 'required',
                // 'user_state' => 'required',
                // 'address' => 'required'
            ];
        }

        if ($this->request->getMethod() == 'post') {

            if ($this->validate($rules)) {
                if ($this->request->getVar('user_password') == '') {
                    $userdata = [
                        'user_role' => $this->request->getVar('user_role'),
                        'first_name' => $this->request->getVar('first_name'),
                        // 'middle_name' => $this->request->getVar('middle_name'),
                        'last_name' => $this->request->getVar('last_name'),
                        'email' => $this->request->getVar('user_email'),
                        // 'mobile' => $this->request->getVar('user_mobile'),
                        // 'gender' => $this->request->getVar('gender'),
                        'user_status' => $this->request->getVar('user_status'),
                        // 'state' => $this->request->getVar('user_state'),
                        // 'address' => $this->request->getVar('address')
                    ];
                }else{
                    $userdata = [
                        'user_role' => $this->request->getVar('user_role'),
                        'first_name' => $this->request->getVar('first_name'),
                        // 'middle_name' => $this->request->getVar('middle_name'),
                        'last_name' => $this->request->getVar('last_name'),
                        'email' => $this->request->getVar('user_email'),
                        // 'mobile' => $this->request->getVar('user_mobile'),
                        // 'gender' => $this->request->getVar('gender'),
                        'user_status' => $this->request->getVar('user_status'),
                        // 'state' => $this->request->getVar('user_state'),
                        // 'address' => $this->request->getVar('address'),
                        // 'password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
                        'password' => $this->request->getVar('user_password')
                    ];
                }
                if ($this->userModel->edit($user_id, $userdata)) {
                    $this->session->setTempdata('success', 'User profile edit successful',3);
                    return redirect()->to('/users');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit user profile',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('users/edit', $data);
    }


    public function view() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Users',
            'page_title' => 'Users | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'users' => $this->userModel->getAllUsers()
        ];
        echo view('users/view', $data);
    }

    public function deleteUser($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->userModel->deleteUser($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Client delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete client',3);
        }
        return redirect()->to('/users');
    }
}