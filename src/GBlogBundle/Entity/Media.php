<?php

namespace GBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="GBlogBundle\Repository\MediaRepository")
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=255)
     */
    private $placeholder;

    /**
     * @var int
     *
     * @ORM\Column(name="tpye", type="integer")
     */
    private $tpye;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploadDate", type="date")
     */
    private $uploadDate;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;


    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $name
     *
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set placeholder
     *
     * @param string $placeholder
     *
     * @return Media
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set tpye
     *
     * @param integer $tpye
     *
     * @return Media
     */
    public function setTpye($tpye)
    {
        $this->tpye = $tpye;

        return $this;
    }

    /**
     * Get tpye
     *
     * @return int
     */
    public function getTpye()
    {
        return $this->tpye;
    }

    /**
     * Set uploadDate
     *
     * @param \DateTime $uploadDate
     *
     * @return Media
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;

        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile( $file )
    {
        $this->file=$file;
        return $this;
    }


}
