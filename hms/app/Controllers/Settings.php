<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Settings extends Controller
{
    
    public function index()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Settings',
            'page_title' => 'Settings | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles()
        ];

        $data['validation'] = null;

        return view('settings/index', $data);
    }

    public function company()
    {
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Settings',
            'page_title' => 'Settings | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles()
        ];

        $rules = [
            'site_title' => 'required',
            'hotel_name' => 'required',
            'company_email' => 'required|valid_email',
            'company_phone' => 'required|numeric|exact_length[11]',
            'company_website' => 'required',
            'company_address' => 'required'
        ];

        $data['validation'] = null;
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $company_data = [
                    'site_title' => $this->request->getVar('site_title'),
                    'hotel_name' => $this->request->getVar('hotel_name'),
                    'tagline' => $this->request->getVar('tagline'),
                    'company_email' => $this->request->getVar('company_email'),
                    'company_phone' => $this->request->getVar('company_phone'),
                    'company_mobile' => $this->request->getVar('company_mobile'),
                    'company_website' => $this->request->getVar('company_website'),
                    'company_address' => $this->request->getVar('company_address')
                ];
                if ($this->settingsModel->create($company_data)) {
                    $this->session->setTempdata('success', 'Company info update successful',3);
                    return redirect()->to('/settings');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to update company info',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('settings/index', $data);
    }

    public function bank()
    {
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Settings',
            'page_title' => 'Settings | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles()
        ];
        
        $rules = [
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric|exact_length[10]',
        ];

        $data['validation'] = null;
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $company_data = [
                    'bank_name' => $this->request->getVar('bank_name'),
                    'account_name' => $this->request->getVar('account_name'),
                    'account_number' => $this->request->getVar('account_number'),
                    'show_on_invoice' => $this->request->getVar('show_on_invoice')
                ];
                if ($this->settingsModel->create($company_data)) {
                    $this->session->setTempdata('success', 'Bank details update successful',3);
                    return redirect()->to('/settings');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to update bank details',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('settings/index', $data);
    }

    public function add_user_role()
    {
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Settings',
            'page_title' => 'Settings | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles()
        ];
        
        $rules = [
            'role' => 'required'
        ];

        $data['validation'] = null;
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $role_data = [
                    'role_name' => $this->request->getVar('role')
                ];
                if ($this->settingsModel->addUserRole($role_data)) {
                    $this->session->setTempdata('success', 'User role successfully added',3);
                    return redirect()->to('/settings');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to add user role',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('settings/index', $data);
    }

    public function permission($role_id)
    {
       $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Permission',
            'page_title' => 'Permission | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'user_role' => $this->settingsModel->getUserRole($role_id)
        ];

        $data['validation'] = null;

        if ($this->request->getMethod() == 'post') {
            $permission_data = [
                'permissions' => serialize($this->request->getVar('permission'))
            ];
            if ($this->settingsModel->updatePermission($role_id, $permission_data)) {
                $this->session->setTempdata('success', 'Permission update successful',3);
                return redirect()->to('/privileges/'.$role_id);
            } else {
                $this->session->setTempdata('error', 'Unable to update permission',3);
                return redirect()->to('/privileges/'.$role_id);
            }
        }

        echo view('settings/permissions', $data);
    }
}