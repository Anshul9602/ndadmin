<?php

namespace App\Controllers\Admin\Role;
use App\Models\JobViewModel;
use App\Models\RoleModel;
use App\Models\JobApplyModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Role extends BaseController
{
    private function validateToken($token)
    {
        if ($token !== session()->get('token')) {
            return false;
        }
        return true;
    }

    private function jsonResponse($status, $message)
    {
        return $this->response->setJSON(['status' => $status, 'message' => $message]);
    }

    public function listAllRoles($segment = null)
    {
        if (!$this->validateToken($segment)) {
            return redirect()->to('/admin/login');
        }

        $role = session()->get('role');

        // Pass the role to the view
        $data = [
            'role' => $role,
            'token' => $segment
        ];
        $model = new RoleModel();
        $data['roles'] = $model->getallRoleData();


        // echo "<pre>"; print_r( $data['Role']);
        // echo "</pre>";
        // die();

        return view('admin/userroll/role_list', $data);
    }
    public function listAllRole_Form($segment)
    {
        if (!$this->validateToken($segment)) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'token' => $segment,
            'role' => session()->get('role'),
            'users' => [] // Initialize 'users' to an empty array
        ];

        $model = new RoleModel();
        
        $profile = new RoleModel();
        $baseUrl = rtrim(base_url(), '/'); // Ensure the base URL does not have a trailing slash

      

        return view('admin/userroll/role_form', $data);
    }
    public function listAllRole_getByid($id)
    {

        $model = new RoleModel();
        $data['post'] = $model->getJobDataid($id);


        $model1 = new JobApplyModel();
        $data['job_apply'] = $model1->getJobData($id);
        $model2 = new JobViewModel();
        $data['jobview']= $model2->getJobviewData($id);
        if ($data) {
            return $this->response->setJSON($data);
        } else {

            return $this->response->setStatusCode(400)->setBody('user not foruned');
        }
    }
    public function listRole_delete($id)
    {

        // echo "yes";
        $model = new RoleModel();

        $post = $model->deletedata($id);

        return redirect()->to(base_url('admin/candidates/list_jobs' . session()->get('token')));
    }
    
    public function listRole_status($id)
    {

        // echo "yes";
        $model = new RoleModel();

        $post = $model->update_status_d($id);

        return redirect()->to(base_url('admin/candidates/list_jobs' . session()->get('token')));
    }

    public function listRole_save($segment)
    {

        $data = $this->request->getPost();

         
       
        $input = [
            'name' => isset($data['name']) ? $data['name'] : '',
            'permission' => isset($data['permission']) ? implode(',', $data['permission']) : '',
            'status' => isset($data['status']) ? $data['status'] : ''
        ];


        // echo "<pre>"; print_r($input); echo "</pre>";
        // die();

        $model = new RoleModel();

        $user = $model->save($input);

        if ($user === false) {

           
                return "Error: profile image not inserted successfully";
          
        } else {
            if (!$this->validateToken($segment)) {
                return redirect()->to('/admin/login');
            }
    
            $role = session()->get('role');
    
            // Pass the role to the view
            $data = [
                'role' => $role,
                'token' => $segment
            ];
            return view('admin/userroll/role_list', $data);
            
        }

       
    }

}
