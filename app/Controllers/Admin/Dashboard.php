<?php

namespace App\Controllers\Admin;
use App\Models\CandidatesModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index($token = null)
    {
        if ($token !== session()->get('token')) {
            return redirect()->to('/admin/login');
        }

        $role = session()->get('role');

        // Pass the role to the view
        $data = [
            'role' => $role,
            'token' => $token
        ];
        $user = new CandidatesModel();
        $data['total_user'] = $user->UserCount();
        $data['total_hotel'] = $user->HotelCount();
        $data['total_agent'] = $user->AgentCount();


        return view('admin/dashboard/dashboard', $data);
    }
    public function hr($token = null)
    {
        if ($token !== session()->get('token')) {
            return redirect()->to('/admin/login');
        }

        $role = session()->get('role');

        // Pass the role to the view
        $data = [
            'role' => $role,
            'token' => $token
        ];
        $user = new CandidatesModel();
        $data['total_user'] = $user->UserCount();
        $data['total_hotel'] = $user->HotelCount();
        $data['total_agent'] = $user->AgentCount();


        return view('admin/dashboard/hr', $data);
    }
    public function calendar($token = null)
    {
        if ($token !== session()->get('token')) {
            return redirect()->to('/admin/login');
        }

        $role = session()->get('role');

        // Pass the role to the view
        $data = [
            'role' => $role,
            'token' => $token
        ];
        $user = new CandidatesModel();
        $data['total_user'] = $user->UserCount();
        $data['total_hotel'] = $user->HotelCount();
        $data['total_agent'] = $user->AgentCount();


        return view('admin/dashboard/calendar', $data);
    }
}
