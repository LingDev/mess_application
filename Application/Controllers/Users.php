<?php

use MVC\Controller;
 

class ControllersUsers extends Controller{
 
    public function getAllUsers(){
        $model = $this->model('users');
        $data = $model->getAllUsers();
        $this->response->sendStatus(201);
        $this->response->setContent($data);
 
    }

    public function updateUsersProfile(){

    }
    public function getInfoUser(){
        if($this->validToken()){
            $userName = $this->userName;
            $model = $this->model("users");
            if($model->getInfoUser($userName)->num_rows>0){
                $this->response->sendStatus(200);
                $this->response->setContent($model->getInfoUser($userName)->row);
            }else{
                $this->response->sendStatus(412);
                $this->response->setContent($model->getInfoUser($userName)->row);
            }
        }
    }
 }
