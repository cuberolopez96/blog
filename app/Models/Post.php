<?php


namespace App\Models;

/**
 * Class Post
 * @package App\Models
 * @Entity @Table(name="posts")
 */
class Post implements ModelInterface
{
    /**
     * @var integer
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @var User
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="idUser",referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     * @Column(type="string")
     */
    private $title;
    /**
     * @var string
     * @Column(type="string")
     */
    private $content;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}
