<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;


// class users extends ResourceController
class users extends BaseController
{
    use ResponseTrait;


    // all users
    public function index()
    {
        $model = new User_model();
        $data['users'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data["users"]);
    }

    // create
    // public function create()
    // {

    //     // If the the input data is validated
    //     $model = new User_model();
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'phone_number'  => $this->request->getVar('phone_number'),
    //         'email'  => $this->request->getVar('email'),
    //         'password'  => $this->request->getVar('password'),
    //     ];
    //     $model->insert($data);

    //     echo "Account created!";
    // }

    // Create an account with validation rules
    public function create()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'name' => [
                'label' => 'name',
                'rules' => 'required'
            ],
            'phone_number' => [
                'label' => 'phone_number',
                'rules' => 'required|min_length[10]|max_length[50]|alpha_numeric'
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email|is_unique[users.email,id,{id}]'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            if ($validation->hasError('name')) {
                echo $validation->getError('name');
            }

            if ($validation->hasError('phone_number')) {
                echo $validation->getError('phone_number');
            }

            if ($validation->hasError('email')) {
                echo $validation->getError('email');
            }

            if ($validation->hasError('password')) {
                echo $validation->getError('password');
            }
        } else {
            // If the the input data is validated
            // Get the data
            $data = $this->getData($this->request);

            // Insert the data to the database
            $model = new User_model();
            $model->insert($data);

            echo "Account created!";
        }
    }

    // single user
    public function check()
    {

        $validation =  \Config\Services::validation();
        $session = \Config\Services::session();

        $validation->setRules([
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            if ($validation->hasError('email')) {
                echo $validation->getError('email');
            }

            if ($validation->hasError('password')) {
                echo $validation->getError('password');
            }
        } else {
            // If the the input data is validated        
            // Chekcing the input data
            $data = $this->getData($this->request);

            $email = $data["email"];
            $password = $data["password"];

            $model = new user_model();
            $data = $model->where('email', $email)->first();
            if ($data) {
                if ($data["password"] == $password) {
                    return "User found!";
                }
            } else {
                return "User NOT found!";
            }
            return "User NOT found!";
        }
    }

    // // update
    // public function update($id = null)
    // {
    //     $model = new User_model();
    //     $id = $this->request->getVar('id');
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email'  => $this->request->getVar('email'),
    //         'password'  => $this->request->getVar('password')
    //     ];
    //     $model->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Employee updated successfully'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }

    // // delete
    // public function delete($id = null)
    // {
    //     $model = new User_model();
    //     $data = $model->where('id', $id)->delete($id);
    //     if ($data) {
    //         $model->delete($id);
    //         $response = [
    //             'status'   => 200,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Employee successfully deleted'
    //             ]
    //         ];
    //         return $this->respondDeleted($response);
    //     } else {
    //         return $this->failNotFound('No employee found');
    //     }
    // }
}
