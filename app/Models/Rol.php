<?php


namespace App\Models;

use phpDocumentor\Reflection\Types\Integer;

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
     * @var integer
     * @Column(type="integer")
     */
    private $numorder;

    /**
     * @return integer
     */
    public function getNumorder(): Integer
    {
        return $this->numorder;
    }

    /**
     * @param integer $numorder
     */
    public function setNumorder($numorder)
    {
        $this->numorder = $numorder;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

}
