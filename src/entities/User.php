<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 05/08/2015
 * Time: 12:06
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id
     * @Column(name="idUser", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=50)
     *
     */
    protected $name;


    /**
     * @Column(type="string", length=255)
     *
     */
    protected $email;

    /**
     * @Column(type="boolean")
     */
    protected $confirmedEmail;

    /**
     * @Column(type="datetime")
     */
    protected $joinDate;

    /**
     * @Column(type="string", length=255)
     *
     */
    protected $plainPassword;


    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getConfirmedEmail()
    {
        return $this->confirmedEmail;
    }

    /**
     * @param mixed $confirmedEmail
     */
    public function setConfirmedEmail($confirmedEmail)
    {
        $this->confirmedEmail = $confirmedEmail;
    }

    /**
     * @return mixed
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * @param mixed $joinDate
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    }


}