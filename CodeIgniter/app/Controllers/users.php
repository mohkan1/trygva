<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;


class users extends ResourceController
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
    public function create()
    {
        $model = new User_model();
        $data = [
            'name' => $this->request->getVar('name'),
            'phone_number'  => $this->request->getVar('phone_number'),
            'email'  => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
        ];
        $model->insert($data);

        echo "Account created!";
    }

    // single user
    public function check()
    {
        $model = new User_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

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
