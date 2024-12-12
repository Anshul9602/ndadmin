<?php

namespace App\Controllers\Admin\Jobs;
use App\Models\JobViewModel;
use App\Models\JobModel;
use App\Models\JobApplyModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Jobs extends BaseController
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

    public function listAllJobs($segment = null)
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
        $model = new JobModel();
        $data['jobs'] = $model->getallJobData();


        // echo "<pre>"; print_r($post);
        // echo "</pre>";
        // die();

        return view('admin/jobs/list_jobs', $data);
    }
    public function listAllJobs_getByid($id)
    {

        $model = new JobModel();
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
    public function listJob_delete($id)
    {

        // echo "yes";
        $model = new JobModel();

        $post = $model->deletedata($id);

        return redirect()->to(base_url('admin/candidates/list_jobs' . session()->get('token')));
    }
    public function listJobAP_delete($id)
    {

        // echo "yes";
        $model = new JobApplyModel();

        $post = $model->deletedata($id);

        return redirect()->to(base_url('admin/candidates/list_jobs' . session()->get('token')));
    }
    public function listJob_status($id)
    {

        // echo "yes";
        $model = new JobModel();

        $post = $model->update_status_d($id);

        return redirect()->to(base_url('admin/candidates/list_jobs' . session()->get('token')));
    }

    public function listJob_save()
    {

        $data = $this->request->getPost();
       
        $input = [
            'hotelier_id' => isset($data['hotelier_id']) ? $data['hotelier_id'] : '',
            'job_type' => isset($data['job_type']) ? $data['job_type'] : '',
            'start_time' => isset($data['start_time']) ? $data['start_time'] : '',
           
            'end_time' => isset($data['end_time']) ? $data['end_time'] : '',
            'job_title' => isset($data['job_title']) ? $data['job_title'] : '',
            'job_description' => isset($data['job_description']) ? $data['job_description'] : '',
            'department' => isset($data['department']) ? $data['department'] : '',
            'sub_department' => isset($data['sub_department']) ? $data['sub_department'] : '',
            'education' => isset($data['education']) ? $data['education'] : '',
            'off_salery' => isset($data['off_salery']) ? $data['off_salery'] : '',
            'number_employees' => isset($data['number_employees']) ? $data['number_employees'] : '',
            'experience' => isset($data['experience']) ? $data['experience'] : '',
            
        ];


        // echo "<pre>"; print_r($input); echo "</pre>";
        // die();

        $model = new JobModel();

        $user = $model->save($input);

        if ($user === false) {

           
                return "Error: profile image not inserted successfully";
          
        } else {
            return $this->response->setStatusCode(200)->setBody('user saved');
        }

       
    }

}
