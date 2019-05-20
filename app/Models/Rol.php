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
     * @var string
     * @Column(type="integer")
     */
    private $order;

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
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
