<?php

/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 05/08/2015
 * Time: 11:00
 */


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="Chapter")
 *
 */
class Chapter
{
    use AttCommon;



    public function __construct()
    {
        $this->getPages= new ArrayCollection();
    }

    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer",  name="idChapter")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Comics")
     * @JoinColumn(name="idComic", referencedColumnName="idComic")
     */
    private $comic;


    /**
     * @Column(type="integer")
     */
    private $numChapter;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @return mixed
     */

    /**
     * @OneToMany(targetEntity="Pages", mappedBy="chapter")
     *
     */
    private $pages;

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
    public function getComic()
    {
        return $this->comic;
    }

    /**
     * @param mixed $comic
     */
    public function setComic($comic)
    {
        $this->comic = $comic;
    }

    /**
     * @return mixed
     */
    public function getNumChapter()
    {
        return $this->numChapter;
    }

    /**
     * @param mixed $numChapter
     */
    public function setNumChapter($numChapter)
    {
        $this->numChapter = $numChapter;
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

    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

}