<?php

namespace App\Controllers\Admin\Hotels;

use App\Controllers\profile_img;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use App\Models\CandidatesModel;
use App\Models\Job_prefModel;
use App\Models\JobApplyModel;
use App\Models\ResumeModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Hotels extends BaseController
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
        $users = $model->getAllHUserData();




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


        return view('admin/hotels/list_candidates', $data);
    }

    public function listCandidate_delete($id)
    {

        // echo "yes";
        $model = new CandidatesModel();

        $post = $model->delete_usweb($id);

        return redirect()->to(base_url('admin/hotels/list_candidates' . session()->get('token')));
    }
    public function listCandidate_status($id)
    {

        // echo "yes";
        $model = new CandidatesModel();

        $post = $model->update_status_d($id);

        return redirect()->to(base_url('admin/hotels/list_candidates' . session()->get('token')));
    }
    public function listCandidate_save()
    {

        $data = $this->request->getPost();
        $rofile_pic = $this->request->getFile('profile_pic');
        $resume = $this->request->getFile('resume');
        $input = [
            'name' => isset($data['name']) ? $data['name'] : '',
            'location' => isset($data['location']) ? $data['location'] : '',
            'mobile_number' => isset($data['mobile_number']) ? $data['mobile_number'] : '',
            'role' => 'Employers',
            'email' => isset($data['email']) ? $data['email'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'pin_code' => isset($data['pincode']) ? $data['pincode'] : '',
            'state' => isset($data['state']) ? $data['state'] : '',
            'city' => isset($data['city']) ? $data['city'] : '',
            'country' => 'India',
            'points' => isset($data['points']) ? $data['points'] : '',
            'profile_img' => isset($rofile_pic) ? $rofile_pic : '',
            'gst_number' => isset($data['gst_number']) ? $data['gst_number'] : '',
            'gst_name' => isset($data['gst_name']) ? $data['gst_name'] : '',
            'reg_email' => isset($data['reg_email']) ? $data['reg_email'] : '',
            'reg_hadd' => isset($data['reg_hadd']) ? $data['reg_hadd'] : '',
            
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
            $user1 = $model->save_hprofile($data);
            $userd = $model->getUserData($data['user_id']);
            $prof_img =  $this->store_prof_img($data['user_id'], $input);

            if ($prof_img == true) {
               
            } else {
                return "Error: profile image not inserted successfully";
            }
        } else {
            // print_r($user);

            $user_id = $user['id'];
            $data['user_id'] = $user['id'];
            $data['point'] = $input['points'];
            $model->update_ref($user_id, $data);
            $model->update_hprofile($user_id, $input);
            $post = $model->getUserData($user_id);
            // echo "test";
            $prof_img =  $this->store_prof_img($user_id, $input);
            if ($prof_img == true) {
               
                        return "Error: education not inserted successfully";
                   
                } else {
                    return "Error: education not inserted successfully";
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
            $udata = $user->getHUserData($user_id);


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
            $udata = $user->getHUserData($user_id);
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
