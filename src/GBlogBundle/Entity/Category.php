<?php

namespace GBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;


/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="GBlogBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255,nullable=true)
     */
    private $icon;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="date")
     */
    private $creationDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
    * @var ArrayCollection
    *
    * @ORM\OneToMany(targetEntity="Post" , mappedBy="category")
    */
    private $posts;


    /**
    * @var \user
    *
    * @ORM\ManyToOne(targetEntity="User", inversedBy="addedCategories")
    * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
    */
    private $addedBy;


    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon( $icon )
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Category
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Category
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
    * get Posts
    *
    * @return ArrayCollection
    */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
    * set posts
    *
    * @return Category
    */
    public function setPosts( $posts )
    {
        $this->posts = $posts;
        return $this;
    }


    public function getAddedBy()
    {
        return $this->addedBy;
    }


    public function setAddedBy( $user )
    {
        $this->addedBy = $user;
        return $this;
    }


    public function __toString()
    {
        return sprintf('%s', $this->getName() );
    }
}
