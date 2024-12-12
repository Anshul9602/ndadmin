<?php

namespace App\Controllers\Admin\Candidates;

use App\Controllers\profile_img;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use App\Models\CandidatesModel;
use App\Models\Job_prefModel;
use App\Models\JobApplyModel;
use App\Models\ResumeModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Candidates extends BaseController
{
    protected $candidatesModel;

    public function __construct()
    {
        $this->candidatesModel = new CandidatesModel();
    }

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

    // Display all candidates
    public function listAllCandidates($segment)
    {
        if (!$this->validateToken($segment)) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'token' => $segment,
            'role' => session()->get('role'),
            'users' => [] // Initialize 'users' to an empty array
        ];

        $model = new CandidatesModel();
        $users = $model->getAllUserData();




        $profile = new ProfileModel();
        $baseUrl = rtrim(base_url(), '/'); // Ensure the base URL does not have a trailing slash

        if ($users) {
            foreach ($users as $user) {



                $user_id = $user->user_id;
                $post1 = $profile->findByUId($user_id);

                if ($post1 !== null) {
                    $resume1 = $post1['image_path'];
                    $existingFilePath = FCPATH . $resume1; // FCPATH points to the 'public' directory

                    // Debugging
                    // echo "Checking path: " . $existingFilePath . "<br>";
                    // echo "File exists: " . (file_exists($existingFilePath) ? 'Yes' : 'No') . "<br>";

                    if (file_exists($existingFilePath)) {
                        $user_img = $baseUrl . '/' . $resume1;
                    } else {
                        $user_img = $baseUrl . '/images/user_img.png';
                    }
                } else {
                    $user_img = $baseUrl . '/images/user_img.png';
                }

                $reff = $model->getrefData($user_id);


                $userref = $user->ref_id;

                if ($userref !== null) {
                    $uid = $userref;
                    $ref = $model->getrefbyidData($uid);

                    if ($ref) {
                        $user->ref = $ref['profile'];
                    } else {
                        $user->ref = '';
                    }

                    $user->Referral = $reff;
                } else {
                    $user->ref = "";
                    $user->Referral = "";
                }



                // Add user image to user object
                $user->image_url = $user_img;
                $data['users'][] = $user;
            }
        }
        //  echo "<pre>";

        //                 print_r($data);
        //                 echo "</pre>";
        //                 die();
        // If no users are found, 'users' will be an empty array
        // No need to add null values

        // Debugging


        return view('admin/candidates/list_candidates', $data);
    }

    public function listCandidate_delete($id)
    {

        // echo "yes";
        $model = new CandidatesModel();

        $post = $model->delete_usweb($id);

        return redirect()->to(base_url('admin/candidates/list_candidates' . session()->get('token')));
    }
    public function listCandidate_status($id)
    {

        // echo "yes";
        $model = new CandidatesModel();

        $post = $model->update_status_d($id);

        return redirect()->to(base_url('admin/candidates/list_candidates' . session()->get('token')));
    }
    public function listCandidate_save()
    {

        $data = $this->request->getPost();
        $rofile_pic = $this->request->getFile('profile_pic');
        $resume = $this->request->getFile('resume');
        $input = [
            'name' => isset($data['first_name']) ? $data['first_name'] : '',
            'last_name' => isset($data['last_name']) ? $data['last_name'] : '',
            'mobile_number' => isset($data['phone_number']) ? $data['phone_number'] : '',
            'role' => 'Job Seeker',
            'email' => isset($data['email']) ? $data['email'] : '',
            'dob' => isset($data['dob']) ? $data['dob'] : '',
            'gender' => isset($data['gender']) ? $data['gender'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'pin_code' => isset($data['pincode']) ? $data['pincode'] : '',
            'state' => isset($data['state']) ? $data['state'] : '',
            'city' => '',
            'country' => 'India',

            'points' => isset($data['points']) ? $data['points'] : '',
            'profile_img' => isset($rofile_pic) ? $rofile_pic : '',

            'ten_th' => isset($data['ten_th']) ? $data['ten_th'] : 'false',
            'ten_school' => isset($data['ten_school']) ? $data['ten_school'] : '',
            'ten_year' => isset($data['ten_year']) ? $data['ten_year'] : '',
            'to_th' => isset($data['to_th']) ? $data['to_th'] : 'false',
            'to_th_school' => isset($data['to_th_school']) ? $data['to_th_school'] : '',
            'to_th_year' => isset($data['to_th_year']) ? $data['to_th_year'] : '',
            'gra_dip' => isset($data['gra_dip']) ? $data['gra_dip'] : 'false',
            'gr_university' => isset($data['gr_university']) ? $data['gr_university'] : '',
            'gr_degree' => isset($data['gr_degree']) ? $data['gr_degree'] : '',
            'gr_year' => isset($data['gr_year']) ? $data['gr_year'] : '',
            'post_gra' => isset($data['post_gra']) ? $data['post_gra'] : 'false',
            'pg_university' => isset($data['pg_university']) ? $data['pg_university'] : '',
            'pg_degree' => isset($data['pg_degree']) ? $data['pg_degree'] : '',
            'pg_year' => isset($data['pg_year']) ? $data['pg_year'] : '',
            'doc' => isset($data['doc']) ? $data['doc'] : 'false',

            'doc_university' => isset($data['doc_university']) ? $data['doc_university'] : '',
            'doc_degree' => isset($data['doc_degree']) ? $data['doc_degree'] : '',
            'doc_year' => isset($data['doc_year']) ? $data['doc_year'] : '',
            'hotel_de' => isset($data['hotel_de']) ? $data['hotel_de'] : 'false',
            'h_college' => isset($data['h_college']) ? $data['h_college'] : '',
            'h_year' => isset($data['h_year']) ? $data['h_year'] : '',
            'job_type' => isset($data['job_type']) ? $data['job_type'] : '',
            'pref_state' => isset($data['pref_state']) ? $data['pref_state'] : '',
            'pref_city' => isset($data['pref_city']) ? $data['pref_city'] : '',
            'start_time' => '',
            'end_time' =>  '',
            'sub_dep' =>  '',
            'salery' => isset($data['salary_range']) ? $data['salary_range'] : '',
            'department' => isset($data['department']) ? $data['department'] : '',
            'work_experience' => isset($data['work_experience']) ? $data['work_experience'] : '',
            'resume' => isset($resume) ? $resume : '',
        ];


        // echo "<pre>"; print_r($input); echo "</pre>";
        // die();

        $model = new CandidatesModel();

        $user = $model->findUserByUserNumber1($input['mobile_number']);

        if ($user == 0) {

            $snew = $model->save($input);
            // echo "<pre>"; print_r($snew); echo "</pre>";

            $foruid = $model->findUserByUserNumber($input['mobile_number']);
            // echo "<pre>";
            // print_r($foruid);
            // echo "</pre>";
            $data = $input;
            $data['user_id'] = $foruid['id'];
            $required_fields = ['user_id', 'name'];
            foreach ($required_fields as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    return "Error: Missing required field '$field'";
                }
            }
            $user1 = $model->save_profile($data);
            $userd = $model->getUserData($data['user_id']);
            $prof_img =  $this->store_prof_img($data['user_id'], $input);

            if ($prof_img == true) {
                $edu =  $this->store_edu($data['user_id'], $input);
                if ($edu == true) {
                    $pref =  $this->store_pref($data['user_id'], $input);

                    if ($pref == true) {
                        if ($resume !== null) {
                            $resume =  $this->store_res($data['user_id'], $input);
                        }
                    } else {
                        return "Error: education not inserted successfully";
                    }
                } else {
                    return "Error: education not inserted successfully";
                }
            } else {
                return "Error: profile image not inserted successfully";
            }
        } else {
            // print_r($user);

            $user_id = $user['id'];
            $data['user_id'] = $user['id'];
            $data['point'] = $input['points'];
            $model->update_ref($user_id, $data);
            $model->update_profile($user_id, $input);
            $post = $model->getUserData($user_id);
            // echo "test";
            $prof_img =  $this->store_prof_img($user_id, $input);
            if ($prof_img == true) {
                $edu =  $this->up_edu($data['user_id'], $input);
                if ($edu == true) {
                    $pref =  $this->store_pref($data['user_id'], $input);

                    if ($pref == true) {
                        if ($resume !== null) {
                            $resume =  $this->store_res($data['user_id'], $input);
                        }
                    } else {
                        return "Error: education not inserted successfully";
                    }
                } else {
                    return "Error: education not inserted successfully";
                }
            } else {
                return "Error: profile image not inserted successfully";
            }
            // echo "test";
            // $user1 = null;
            $response =
                $this->response->setStatusCode(200)->setBody('user allrady in list, user updated successfully');
            return $response;
        }

        return $this->response->setStatusCode(200)->setBody('user saved');
    }
    public function listCandidate_getByid($id)
    {
        $user = new CandidatesModel();
        $posts = $user->findUserById($id); // Find all job applications by job ID

        if ($posts) {
            $data = []; // Initialize an array to hold all user data
            $phone = $posts['mobile_number'];
            $points = $posts['points'];

            $baseUrl = base_url(); // Assuming you have configured the base URL in your CodeIgniter configuration
            $baseUrl = str_replace('/public/', '/', $baseUrl);
            $user_id = $id;
            $user = new CandidatesModel();
            $udata = $user->getUserData($user_id);
            $profile = new ProfileModel();
            $baseUrl1 = rtrim(base_url(), '/'); // Ensure the base URL does not have a trailing slash
            $post1 = $profile->findByUId($user_id);

            if ($post1 !== null) {
                $resume1 = $post1['image_path'];
                $existingFilePath = FCPATH . $resume1; // FCPATH points to the 'public' directory
                if (file_exists($existingFilePath)) {
                    $user_img = $baseUrl1 . '/' . $resume1;
                } else {
                    $user_img = $baseUrl1 . '/images/user_img.png';
                }
            } else {
                $user_img = $baseUrl1 . '/images/user_img.png';
            }

            // work exp
            $work = $user->getby_id_data($user_id);
            // job pref
            $model3 = new Job_prefModel();
            $job_pre = $model3->show_userid($user_id);
            // reusme 4
            $model4 = new ResumeModel();
            $post4 = $model4->findByUId($user_id);
            if ($post4) {
                $resume3 = $post4['Resume'];
                $user_resume = $baseUrl . 'writable' . $resume3;
            } else {
                $user_resume = null;
            }
            // edu 
            $edu = $user->getUserEd_id($id);
            // Construct user data array
            $data[] = [
                'user_id' => $user_id,
                'phone_number' => $phone,
                'points' => $points,
                'user' => $udata,
                'user_img' => $user_img,
                'work' => $work,
                'job_pref' => $job_pre,
                'user_edu' => $edu,
                'resume' => $user_resume
            ];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setStatusCode(400)->setBody('user not foruned');
        }
    }
    public function listCandidate_app_getByid($id)
    {
        $user = new CandidatesModel();
        $posts = $user->findUserById($id);

        if ($posts) {
            $data = []; // Initialize an array to hold all user data
            $phone = $posts['mobile_number'];
            $points = $posts['points'];

            $baseUrl = base_url(); // Assuming you have configured the base URL in your CodeIgniter configuration
            $baseUrl = str_replace('/public/', '/', $baseUrl);
            $user_id = $id;
            $user = new CandidatesModel();
            $udata = $user->getUserData($user_id);
            $profile = new ProfileModel();
            $baseUrl1 = rtrim(base_url(), '/'); // Ensure the base URL does not have a trailing slash
            $post1 = $profile->findByUId($user_id);

            if ($post1 !== null) {
                $resume1 = $post1['image_path'];

                // $resume1 = ltrim($resume11, '/');
                // echo $resume1;
                $existingFilePath = FCPATH . $resume1; // FCPATH points to the 'public' directory


                if (file_exists($existingFilePath)) {
                    $user_img = $baseUrl1 . '/' . $resume1;
                } else {
                    $user_img = $baseUrl1 . '/images/user_img.png';
                }
            } else {
                $user_img = $baseUrl1 . '/images/user_img.png';
            }

            // work exp
            $work = $user->getby_id_data($user_id);
            // job pref
            $model3 = new Job_prefModel();
            $job_pre = $model3->show_userid($user_id);
            // reusme 4
            $model4 = new ResumeModel();
            $post4 = $model4->findByUId($user_id);
            if ($post4) {
                $resume3 = $post4['Resume'];
                $user_resume = $baseUrl . 'writable' . $resume3;
            } else {
                $user_resume = null;
            }
            // edu 
            $edu = $user->getUserEd_id($id);
            $ref = $user->getUserRefData($user_id);
            $model5 = new JobApplyModel();

            $job_app = $model5->getJobData($user_id);
            // echo "<pre>";
            // print_r($ref);
            // echo "</pre>";
            // die();


            // Construct user data array
            $data[] = [
                'user_id' => $user_id,
                'phone_number' => $phone,
                'points' => $points,
                'user' => $udata,
                'user_img' => $user_img,
                'work' => $work,
                'job_pref' => $job_pre,
                'job_app' => $job_app,
                'ref' => $ref,
                'user_edu' => $edu,
                'resume' => $user_resume
            ];

            return $this->response->setJSON($data);
        } else {
            return $this->response->setStatusCode(400)->setBody('user not foruned');
        }
    }

    public function store_prof_img($user_id, $input)
    {
        // Get the uploaded file
        $file = $input['profile_img'];

        // Check if the file is uploaded successfully
        if ($file->isValid() && !$file->hasMoved()) {
            // Move the file to the uploads folder
            $newName = $file->getRandomName();
            $file->move('uploads/profile/', $newName);

            // Save file information to the database
            $filepath = 'uploads/profile/' . $newName; // Relative path for storage
            // You may store other file details like $filename if needed

            $model = new ProfileModel();
            $existingProfile = $model->findByUId($user_id);

            // Handle existing profile image
            if ($existingProfile) {
                // Delete existing file if it exists
                $existingFilePath = FCPATH . $existingProfile['image_path'];
                if (file_exists($existingFilePath)) {
                    unlink($existingFilePath);
                }
            }

            // Move the file to user's folder if needed
            $userFolder = FCPATH . 'uploads/profile/' . $user_id . '-img';
            if (!file_exists($userFolder)) {
                mkdir($userFolder, 0777, true); // Create user's folder if it doesn't exist
            }

            $newResumePath = $userFolder . '/' . $newName; // New path with folder
            rename('uploads/profile/' . $newName, $newResumePath); // Move to user's folder
            $res_p = '/uploads/profile/' . $user_id . '-img/' . $newName;
            // Update database with new file path
            $data = [
                'user_id' => $user_id,
                'image_path' => $res_p // Save the file path relative to 'uploads/profile/'
                // Add more information about the file as needed
            ];

            if ($existingProfile) {
                $model->update1($data); // Update existing profile record
            } else {
                $model->save($data); // Save new profile record
            }

            // Prepare data for view
            $post = $model->findByUId($user_id); // Fetch updated data
            $baseUrl = base_url(); // Get base URL from CI configuration
            $baseUrl = rtrim($baseUrl, '/') . '/'; // Ensure base URL ends with '/'

            $imagePath = $post['image_path'];

            if ($imagePath && file_exists($imagePath)) {
                $data['image_path'] = $baseUrl . $imagePath; // Full URL to uploaded image
            } else {
                $data['image_path'] = $baseUrl . 'images/user_img.png'; // Default image if not found
            }

            return $data; // Return data for further processing or display
        } else {
            // Handle file upload error
            return "Error uploading file";
        }
    }

    public function store_edu($user_id, $input)
    {
        $input['user_id'] = $user_id;
        $model = new CandidatesModel();

        $usera = $model->getUserEd_id($input['user_id']);


        $user1 = $model->save_edu($input);



        if ($user1 == true) {
            return $user1;
        } else {

            $response =
                $this->response->setStatusCode(200)->setBody('User education not Added');
            return $response;
        }
    }
    public function up_edu($user_id, $input)
    {
        $input['user_id'] = $user_id;
        $model = new CandidatesModel();

        $usera = $model->getUserEd_id($input['user_id']);


        $user1 = $model->save_edu_up($input);



        if ($user1 == true) {
            return $user1;
        } else {

            $response =
                $this->response->setStatusCode(200)->setBody('User education not Added');
            return $response;
        }
    }
    public function store_pref($user_id, $input)
    {
        $input['user_id'] = $user_id;
        $model = new Job_prefModel();

        $user = $model->show_userid($input['user_id']);
        if ($user) {



            // $id = $user[0]['user_id'];
            // print_r($id);
            $post = $model->user_update11($input['user_id'], $input);
            $message = 'Job pref update successfully';
        } else {
            $post = $model->user_save($input);
            $message = 'Job pref added successfully';
        }
        if ($post == true) {
            return  $post;
        } else {

            $response =
                $this->response->setStatusCode(200)->setBody('User prefrence not Added');
            return $response;
        }
    }

    public function store_res($user_id, $input)
    {
        $file = $input['resume'];

        // Check if the file is uploaded successfully
        if ($file->isValid() && !$file->hasMoved()) {
            // Move the file to the uploads folder
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);

            // Save file information to the database
            $filepath = '/uploads/' . $newName; // Relative path for storage
            // You may store other file details like $filename if needed

            $model = new ResumeModel();
            $existingResume = $model->findByUId($user_id);

            // Handle existing resume
            if ($existingResume) {
                // Delete existing file if it exists
                $existingFilePath = WRITEPATH . $existingResume['resume'];
                if (file_exists($existingFilePath)) {
                    unlink($existingFilePath);
                }
            }

            // Move the file to user's folder if needed
            $userFolder = WRITEPATH . 'uploads/' . $user_id . '-resume';
            if (!file_exists($userFolder)) {
                mkdir($userFolder, 0777, true); // Create user's folder if it doesn't exist
            }

            $newResumePath = $userFolder . '/' . $newName; // New path with folder
            rename(WRITEPATH . 'uploads/' . $newName, $newResumePath); // Move to user's folder

            // Update database with new file path
            $data = [
                'user_id' => $user_id,
                'resume' => $filepath // Save the file path relative to 'uploads/'
                // Add more information about the file as needed
            ];

            if ($existingResume) {
                $model->update1($data); // Update existing resume record
            } else {
                $model->save($data); // Save new resume record
            }

            return true; // Return true or success message upon successful upload and save
        } else {
            // Handle file upload error
            return "Error uploading file";
        }
    }
}
