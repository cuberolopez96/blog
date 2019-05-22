<?php

namespace App\Models;

/**
 * Class User
 * @package App\Models
 * @Entity @Table(name="users")
 */
class User implements ModelInterface
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
     * @var string
     * @Column(type="string")
     */
    private $username;
    /**
     * @var string
     * @Column(type="string")
     */
    private $password;
    /**
     * @var Rol
     * @ManyToOne(targetEntity="Rol")
     * @JoinColumn(name="idRol", referencedColumnName="id")
     */
    private $rol;

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
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return Rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param Rol $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

}
