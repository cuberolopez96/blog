<?php


namespace App\Models;

/**
 * Class Comment
 * @package App\Models
 * @Entity @Table(name="comments")
 */
class Comment
{
    /**
     * @var integer
     * @Id @GeneratedValue @Column(type="integer")
     */
    private $id;
    /**
     * @var Post
     * @ManyToOne(targetEntity="Post")
     * @JoinColumn(name="idPost",referencedColumnName="id")
     */
    private $post;
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
    private $content;

}
