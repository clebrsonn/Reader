<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 05/08/2015
 * Time: 12:08
 */

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;


trait AttCommon
{

    /**
     * @Column(type="datetime")
     */
    private $created;


    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="idUser", referencedColumnName="idUser")
     */
    private $user;

    /**
     * @Column(type="string", nullable=true)
     */
    private $editor;

    /**
     * @Column(type="string", name="description")
     */
    private $description;

    /**
     * @Column(type="string", name="thumbnail")
     */
    private $thumbnail;

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param mixed $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
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