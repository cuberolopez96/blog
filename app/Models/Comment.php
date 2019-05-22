<?php


namespace App\Models;

/**
 * Class Comment
 * @package App\Models
 * @Entity @Table(name="comments")
 */
class Comment implements ModelInterface
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
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * @param Post $post
     */
    public function setPost(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }


}
