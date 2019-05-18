<?php


namespace App\Models;

/**
 * Class Rol
 * @package App\Models
 * @Entity @Table(name="roles")
 */
class Rol
{
    /**
     * @var integer
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;
    /**
     * @var string
     * @Column(type="string")
     */
    private $name;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $getPost = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $editPost = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $removePost = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $addPost = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $addUser = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $editUser = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $getUser = 0;
    /**
     * @var boolean
     * @Column(type="boolean")
     */
    private $removeUser = 0;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isGetPost()
    {
        return $this->getPost;
    }

    /**
     * @param bool $getPost
     */
    public function setGetPost($getPost)
    {
        $this->getPost = $getPost;
    }

    /**
     * @return bool
     */
    public function isEditPost()
    {
        return $this->editPost;
    }

    /**
     * @param bool $editPost
     */
    public function setEditPost($editPost)
    {
        $this->editPost = $editPost;
    }

    /**
     * @return bool
     */
    public function isRemovePost()
    {
        return $this->removePost;
    }

    /**
     * @param bool $removePost
     */
    public function setRemovePost($removePost)
    {
        $this->removePost = $removePost;
    }

    /**
     * @return bool
     */
    public function isAddPost()
    {
        return $this->addPost;
    }

    /**
     * @param bool $addPost
     */
    public function setAddPost($addPost)
    {
        $this->addPost = $addPost;
    }

    /**
     * @return bool
     */
    public function isAddUser()
    {
        return $this->addUser;
    }

    /**
     * @param bool $addUser
     */
    public function setAddUser($addUser)
    {
        $this->addUser = $addUser;
    }

    /**
     * @return bool
     */
    public function isEditUser()
    {
        return $this->editUser;
    }

    /**
     * @param bool $editUser
     */
    public function setEditUser($editUser)
    {
        $this->editUser = $editUser;
    }

    /**
     * @return bool
     */
    public function isGetUser()
    {
        return $this->getUser;
    }

    /**
     * @param bool $getUser
     */
    public function setGetUser($getUser)
    {
        $this->getUser = $getUser;
    }

    /**
     * @return bool
     */
    public function isRemoveUser()
    {
        return $this->removeUser;
    }

    /**
     * @param bool $removeUser
     */
    public function setRemoveUser($removeUser)
    {
        $this->removeUser = $removeUser;
    }


}
