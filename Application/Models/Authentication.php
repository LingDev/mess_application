<?php 


use MVC\Model;

class ModelsAuthentication  extends Model {

 
    public function login($params) {
        $userName = $params['userName'];
        $password = $params['password'];
        $sql = "SELECT * FROM MESSENGER.auth_account WHERE userName = '$userName' AND password='$password' LIMIT 1  ";
         if($this->db->query($sql)->num_rows>0){
             return $this->db->query($sql);
        }
        else{
            return false;
        }
    }

    public function registration($params){
        $userName = $params['userName'];
        $password = $params['password'];
        $isActive = 1;
        $isBlocked = 0;
        $sql = "INSERT INTO MESSENGER.auth_account(userName, password, is_active,is_blocked,created_at,update_at)
                VALUES( '$userName','$password',$isActive,$isBlocked,now(),now())";
                echo $sql;
        if( $this->db->query($sql)->num_rows>0){
            return true;
        }
        return false;
    }
}
