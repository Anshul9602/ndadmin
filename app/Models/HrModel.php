<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use \Datetime;

class HrModel extends Model
{
    protected $table = 'hr_policies';

    protected $allowedFields = [
        'mobile_number',

    ];
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {

        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $plaintextPassword = $data['data']['password'];
            $data['data']['password'] = $this->hashPassword($plaintextPassword);
        }
        return $data;
    }

    private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }
    public function get_data()
    {
        // echo "test";
        $builder = $this->db->table('hr_policies');
        $builder->select('hr_policies.*');


        $query = $builder->get();

        $user = $query->getResult();

        $result = $user;
        return $result;
    }
    public function get_data_id($Id)
    {
        // echo "test";
        $builder = $this->db->table('hr_policies');
        $builder->select(' hr_policies.*');
        $builder->where('hr_policies.id', $Id);

        $query = $builder->get();

        $user = $query->getResult();

        $result = $user;
        return $result;
    }
  
  


    public function getUserCount()
    {
        $builder = $this->db->table('hr_policies');
        $builder->select('COUNT(*) as user_count');

        $query = $builder->get();
        $result = $query->getRow();

        return $result->user_count;
    }
 
    public function findUserByUserNumber1(string $mobile_number)
    {
        // echo "test";
        // die();
        $user = $this
            ->asArray()
            ->where(['mobile_number' => $mobile_number])
            ->first();

        if (!$user) {
            return 0;
        } else {
            return $user;
        }
    }

    


    public function findAll(int $limit = 0, int $offset = 0)
    {
        if ($this->tempAllowCallbacks) {
            // Call the before event and check for a return
            $eventData = $this->trigger('beforeFind', [
                'method'    => 'findAll',
                'limit'     => $limit,
                'offset'    => $offset,
                'singleton' => false,
            ]);

            if (!empty($eventData['returnData'])) {
                return $eventData['data'];
            }
        }

        $eventData = [
            'data'      => $this->doFindAll($limit, $offset),
            'limit'     => $limit,
            'offset'    => $offset,
            'method'    => 'findAll',
            'singleton' => false,
        ];

        if ($this->tempAllowCallbacks) {
            $eventData = $this->trigger('afterFind', $eventData);
        }

        $this->tempReturnType     = $this->returnType;
        $this->tempUseSoftDeletes = $this->useSoftDeletes;
        $this->tempAllowCallbacks = $this->allowCallbacks;

        return $eventData['data'];
    }
    public function findHrById($id)
    {
        $user = $this
            ->asArray()
            ->where(['id' => $id])
            ->first();

        if (!$user)
            throw new Exception('User does not exist for specified user id');

        return $user;
    }


    public function save($data): bool
    {

     
        // echo "<pre>"; print_r($mobile_number); echo "</pre>";
        // die();
        $name = $data['name'];
        $dis = $data['dis'];
        $profile_pic = $data['prof_img'];
        $status = $data['status'];
        

        
        $date = new DateTime();
        $date = date_default_timezone_set('Asia/Kolkata');
        $date1 = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `hr_policies`(`id`, `name`, `dis`, `status`, `profile_pic`,`created_at`) VALUES (null,'$name','$dis','$status','$profile_pic','$date1')";


        //     echo "<pre>"; print_r($sql); echo "</pre>";
        // die();

        $post = $this->db->query($sql);
        // echo json_encode($post);
        if (!$post)
            throw new Exception('Post does not exist for specified id');

        return $post;
    }

    public function save_profile($data)
    {

        $user_id = $data['user_id'];
        $name = $data['name'];
        $last_name = $data['last_name'];
        $gender = $data['gender'];
        $pin_code = $data['pin_code'];
        $address = $data['address'];
        $dob = $data['dob'];
        $email = $data['email'];
        $role = $data['role'];
        $state = $data['state'];
        $city = $data['city'];
        $country = $data['country'];
        $date = new DateTime();
        $date = date_default_timezone_set('Asia/Kolkata');
        $date1 = date("m-d-Y h:i A");


        $sql = "INSERT INTO `user_profiles`( `user_id`, `name`,`last_name`,`gender`,`address`,`pin_code`,`dob`, `email`,`role`, `state`, `city`, `country`, `created_at`, `updated_at`) VALUES ('$user_id','$name','$last_name','$gender','$address','$pin_code','$dob','$email','$role','$state','$city','$country','$date1','$date1')";


        $post = $this->db->query($sql);

        if (!$post) {
            return false;
        } else {
            return $post;
        }
    }
    public function update_profile($id, $data)
    {
        //    echo json_encode($sql);
        $user_id = $id;
        $name = $data['name'];
        $last_name = $data['last_name'];
        $pin_code = $data['pin_code'];
        $address = $data['address'];
        $dob = $data['dob'];
        $gender = $data['gender'];
        $email = $data['email'];
        $state = $data['state'];
        $city = $data['city'];
        $country = $data['country'];

        $date = new DateTime();
        $date = date_default_timezone_set('Asia/Kolkata');
        $date1 = date("m-d-Y h:i A");

        $sql = "UPDATE `user_profiles` SET 
        `pin_code` = '$pin_code',       `address` = '$address',
        `dob` = '$dob',
        `name`='$name',`last_name`='$last_name',`gender`='$gender',`email`='$email',`state`='$state',`city`='$city',`country`='$country',`updated_at`='$date1' WHERE user_id = $user_id";
        // echo json_encode($sql);
        // echo ( $sql);
        //     die();
        $post = $this->db->query($sql);

        if (!$post) {
            return false;
        } else {
            return $post;
        }
    }
   
   
    public function update_status_d($id)
    {
        $user_id = $id;


        $result = $this->findUserById($user_id);

        // print_r($result);

        if ($result) {
            $current_status = $result['status'];

            // Toggle the status
            $new_status = ($current_status === '1') ? '0' : '1';

            // Update the status in the database
            $date = new DateTime();
            $date = date_default_timezone_set('Asia/Kolkata');
            $date1 = date("m-d-Y h:i A");

            $sql = "UPDATE `hr_policies` SET `status`='$new_status',`updated_at`='$date1' WHERE `id` = $user_id";
            $post = $this->db->query($sql);

            if (!$post) {
                return false;
            } else {
                return $post;
            }
        } else {
            return false; // User not found
        }
    }

   
   
}
