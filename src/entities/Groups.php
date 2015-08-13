<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 31/07/2015
 * Time: 21:31
 */
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="Groups")
 */
class Groups
{

    const ADMIN = 'admin';
    const MEMBERS = 'members';
    const MOD = 'moderator';

    /**
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\Column(name="idGroup", type="integer")
     *  @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string")
     */
    private $name;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string")
     */
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}