<?php

require_once '../models/service.php';
require_once '../controllers/jwt.php';

require_once '../models/member.php';



class ControllerMember
{
    private Member $member;
    private JWT $jwt;

    public function __construct()
    {
        $this->member = new Member();
        $this->jwt = new JWT();
    }




    public function loginUser(string $email, string $password)
    {
        $userinfo = $this->member->findMember($email, $password);
        return $userinfo;
    }
    //function to generate a JWT
    //@param array $a = tab with  logged member information
    public function getJWT(array $a)
    {
        $now = new DateTime();
        $getTokenAt = $now->getTimestamp();
        $tokenExpire = $getTokenAt + 86400;
        //Header du JWT
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        //Payload du JWT
        $payload = [
            'user_id' => $a[0]['MEMBER_ID'],
            'username' =>  $a[0]['MEMBER_NAME'],
            'username' =>  $a[0]['MEMBER_SURNAME'],
            'roles' =>  $a[0]['MEMBER_PROFIL'],
            'iat' => $getTokenAt,
            'exp' => $tokenExpire
        ];

        $token = $this->jwt->createJWT($header, $payload);
        setcookie('access_token', $token, time() + 86400, "/");
    }

    public function getMember()
    {
        try {
            $users = $this->member->getMembers();
            $result = $users->fetchAll(\PDO::FETCH_ASSOC);
            $result = array('users' => $result);
            return $result;
        } catch (Exception $e) {
            $fakearray = array();
            $result = array('users' => $fakearray);
            return $result;
        }
    }
    public function deleteUser(int $id)
    {
        try {
            $deletUser = $this->member->deleteUser($id);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addNewUser(string $uname, string $usurname, string $uemail, string $upassword, string $ufunction, string $uright)
    {
        try {
            $addUser = $this->member->addNewUser($uname, $usurname, $uemail, $upassword, $ufunction, $uright);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getMailAdress(string $mail)
    {
        try {
            $addUser = $this->member->getMailAdress($mail);
            echo $addUser;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
