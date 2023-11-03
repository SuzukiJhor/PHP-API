<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id = null)
    {
        try {
            if ($id) {
                $response = User::getUser($id);
            } else {
                $response = User::getUserAll();
            }

            return json_encode(array('status' => 'success', 'data' => $response));

        } catch (\Exception $err) {
            return json_encode(array(
                'status' => 'error', 
                'data' => $err->getMessage()
            ),JSON_UNESCAPED_UNICODE);
        }
    }

    public function post()
    {   
        $rawData = file_get_contents('php://input');
        $jsonData = json_decode($rawData, true);
        return json_encode(array('status' => 'success', 'data' => $jsonData));
      
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}