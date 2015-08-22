<?php

/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 21/08/2015
 * Time: 19:19
 */
class UserModel
{
    private $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }

    public function newUser($name, $eMail, $pass)
    {
        if (!empty($name) || !empty($eMail)) {
            $user = new User();
            $user->setName($name);
            $user->setEmail($eMail);
            $user->setPlainPassword($pass);

            $userExiste = ($this->userController->searchUser($eMail));
            if ($userExiste) {
                return -2;
            }

            $result = $this->userController->insertUser($user);

            return $result;
        } else {
            return false;
        }
    }

    public function searchUser($options)
    {
        return $this->userController->searchUser($options);
    }

    public function login($mail, $pass)
    {
        $User = new User();
        $User->setEmail($mail);
        $User->setPlainPassword($pass);
        return $this->userController->login($User);
    }

}