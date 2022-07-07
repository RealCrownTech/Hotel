<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Room extends Controller
{

    public function view($param1 = '') {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Rooms',
            'page_title' => 'Rooms & Room Types | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'rooms' => $this->roomModel->getAllRoom()
        ];
        $data['validation'] = null;

        if ($param1 == 'createRoomType') {
            $rules = [
                'title' => 'required',
                'price' => 'required|numeric',
                // 'adult' => 'required|numeric',
                // 'kid' => 'required|numeric'
            ];
            

            if ($this->request->getMethod() == 'post') {
                if ($this->validate($rules)) {
                    // $air_condition = $this->request->getVar('air_condition') ? 1 : 0;
                    // $breakfast = $this->request->getVar('breakfast') ? 1 : 0;
                    // $free_wifi = $this->request->getVar('free_wifi') ? 1 : 0;
                    // $newspaper = $this->request->getVar('newspaper') ? 1 : 0;
                    // $double_bed = $this->request->getVar('double_bed') ? 1 : 0;
                    // $coffee_maker = $this->request->getVar('coffee_maker') ? 1 : 0;

                    $roomdata = [
                        'title' => $this->request->getVar('title'),
                        'price' => $this->request->getVar('price'),
                        'adult' => $this->request->getVar('adult'),
                        'kid' => $this->request->getVar('kid'),
                        // 'air_condition' => $air_condition,
                        // 'breakfast' => $breakfast,
                        // 'free_wifi' => $free_wifi,
                        // 'newspaper' => $newspaper,
                        // 'double_bed' => $double_bed,
                        // 'coffee_maker' => $coffee_maker,
                    ];
                    if ($this->roomModel->create($roomdata)) {
                        $this->session->setTempdata('success', 'Room Type added successfully',3);
                        return redirect()->to('/rooms');
                    }else{
                        $this->session->setTempdata('error', 'Sorry! Unable to add room type',3);
                        return redirect()->to(current_url());
                    }
                }else{
                    $data['validation'] = $this->validator;
                }
            }
        }

        if ($param1 == 'createRoom') {
            $rules = [
                'room_no' => 'required|numeric|is_unique[rooms.room_no]',
                'room_type' => 'required|numeric',
                'room_status' => 'required'
            ];
            

            if ($this->request->getMethod() == 'post') {
                if ($this->validate($rules)) {
                    $roomdata = [
                        'room_no' => $this->request->getVar('room_no'),
                        'room_type_id' => $this->request->getVar('room_type'),
                        'room_status' => $this->request->getVar('room_status')
                    ];
                    if ($this->roomModel->createRoom($roomdata)) {
                        $this->session->setTempdata('success', 'Room added successfully',3);
                        return redirect()->to('/rooms');
                    }else{
                        $this->session->setTempdata('error', 'Sorry! Unable to add room',3);
                        return redirect()->to(current_url());
                    }
                }else{
                    $data['validation'] = $this->validator;
                }
            }
            return view('rooms/index', $data);
        }

        return view('rooms/index', $data);
    }

    public function editRoom() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $room_id = $this->request->getVar('room_id');
        $data['room_data'] = $this->roomModel->getRoomData($room_id);
        return $this->response->setJSON($data);
    }

    public function editRooms($room_id = '')
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Edit Rooms',
            'page_title' => 'Edit Room | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'rooms' => $this->roomModel->getAllRoom()
        ];
        $data['validation'] = null;

        $rules = [
            'room_no' => 'required|numeric',
            'room_type' => 'required|numeric',
            'room_status' => 'required'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $roomdata = [
                    'room_no' => $this->request->getVar('room_no'),
                    'room_type_id' => $this->request->getVar('room_type'),
                    'room_status' => $this->request->getVar('room_status')
                ];
                if ($this->roomModel->editRoom($room_id, $roomdata)) {
                    $this->session->setTempdata('success', 'Room edit successful',3);
                    return redirect()->to('/rooms');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit room',3);
                    return redirect()->to('/rooms');
                }
            }else{
                $error = 'Please fill correctly.';
                $this->session->setTempdata('error', $error,3);
                return redirect()->to('/rooms');
            }
        }
        return view('rooms/index', $data);
    }

    public function editRoomType() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $room_type_id = $this->request->getVar('room_type_id');
        $data['room_type_data'] = $this->roomModel->getRoomTypeData($room_type_id);
        return $this->response->setJSON($data);
    }

    public function editRoomTypes($room_type_id = '')
    {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'Edit Room Type',
            'page_title' => 'Edit Room Type | The Ashokas',
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'rooms' => $this->roomModel->getAllRoom()
        ];
        $data['validation'] = null;

        $rules = [
            'title' => 'required',
            'price' => 'required|numeric',
            // 'adult' => 'required|numeric',
            // 'kid' => 'required|numeric'
        ];
        

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                // $air_condition = $this->request->getVar('air_condition') ? 1 : 0;
                // $breakfast = $this->request->getVar('breakfast') ? 1 : 0;
                // $free_wifi = $this->request->getVar('free_wifi') ? 1 : 0;
                // $newspaper = $this->request->getVar('newspaper') ? 1 : 0;
                // $double_bed = $this->request->getVar('double_bed') ? 1 : 0;
                // $coffee_maker = $this->request->getVar('coffee_maker') ? 1 : 0;

                $roomdata = [
                    'title' => $this->request->getVar('title'),
                    'price' => $this->request->getVar('price'),
                    'adult' => $this->request->getVar('adult'),
                    // 'kid' => $this->request->getVar('kid'),
                    // 'air_condition' => $air_condition,
                    // 'breakfast' => $breakfast,
                    // 'free_wifi' => $free_wifi,
                    // 'newspaper' => $newspaper,
                    // 'double_bed' => $double_bed,
                    // 'coffee_maker' => $coffee_maker,
                ];
                if ($this->roomModel->editRoomTypes($room_type_id, $roomdata)) {
                    $this->session->setTempdata('success', 'Room Type edit successful',3);
                    return redirect()->to('/rooms');
                }else{
                    $this->session->setTempdata('error', 'Sorry! Unable to edit room type',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }

        return view('rooms/index', $data);
    }

    public function fetchRoomOfID() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $room_type_id = $this->request->getVar('room_type_id');
        $data['room_data'] = $this->roomModel->fetchRoomOfID($room_type_id);
        return $this->response->setJSON($data);
    }

    public function deleteRoom($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->roomModel->deleteRoom($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Room delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete room',3);
        }
        return redirect()->to('/rooms');
    }

    public function deleteRoomType($id) {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }
        
        $do_delete = $this->roomModel->deleteRoomType($id);
        if ($do_delete) {
            $this->session->setTempdata('success', 'Room type delete successful',3);
        } else {
            $this->session->setTempdata('error', 'Unable to delete room type',3);
        }
        return redirect()->to('/rooms');
    }
}