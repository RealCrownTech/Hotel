<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{

    public function index() {
        if (!session()->has('logged_user')) {
            return redirect()->to('/login');
        }

        $data = [
            'user_permission' => $this->permission,
            'page_name' => 'home',
            'page_title' => 'Dashboard | The Ashokas',            
            'company_data' => $this->settingsModel->getCompanyData(),
            'roles_data' => $this->settingsModel->getUserRoles(),
            'occupied' => $this->roomModel->countOccupiedRooms(),
            'vacant' => $this->roomModel->countVacantRooms(),
            'reserved' => $this->roomModel->countReservedRooms(),
            'filled_rooms' => $this->lodgeModel->getAllFilledRoom(),
            'reservations' => $this->reservationModel->getAllReservation(),
            'rooms' => $this->roomModel->getAllRoom(),
            'room_types' => $this->roomModel->getAllRoomType(),
            'stocks' => $this->stockModel->getLowStocks(),
            'totalAmountToday' => $this->transactionModel->getSumOfAllOpenTransactions()
        ];
        
        return view('dashboard', $data);
    }
}