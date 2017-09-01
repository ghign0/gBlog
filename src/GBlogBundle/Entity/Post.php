<?php

namespace GBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="GBlogBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="date")
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishDate", type="date" ,nullable=true)
     */
    private $publishDate;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
    * @var \User
    *
    * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
    * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
    */
    private $user;

    /**
    * @var \User
    *
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="posts")
    * @ORM\JoinColumn(name="idCategory", referencedColumnName="id")
    */
    private $category;

    /**
    * @var ArrayCollection
    *
    * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts")
    * @ORM\JoinTable(name="tags")
    */
    private $tags;

    public function __construct()
    {
        $this->tags = new Arraycollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Post
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
     * Set status
     *
     * @param integer $status
     *
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return Post
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    public function getUser()
    {
        return $this->user;
    }

    public function setUser( $user )
    {
        $this->user = $user;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory( $category )
    {
        $this->category = $category;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }
}
