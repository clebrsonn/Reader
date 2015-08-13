<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 31/07/2015
 * Time: 21:42
 */


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="Pages")
 *
 */
class Pages
{
    use AttCommon;

    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="idPage")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Chapter", inversedBy="pages")
     * @JoinColumn(name="idChapter", referencedColumnName="idChapter")
     */
    private $chapter;


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
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @param mixed $chapter
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }

}