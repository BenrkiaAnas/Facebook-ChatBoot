<?php


class Post
{
    private $post_id;
    private $post_created;
    private $comment_id;

    public function __construct()
    {
        $post_id = $this->post_id;
        $post_created = $this->post_created;
    }

    // Getting Post_Id
    public function __getPost_Id()
    {
        return $this->post_id;
    }
    // Getting Post_Created
    public function __getPost_Created()
    {
        return $this->post_created;
    }
    // Setting Post_Id
    public function __setPost_Id($post_id)
    {
        $this->post_id = $post_id;
    }
    // Setting Post_Created
    public function __setPost_Created($post_created)
    {
        $this->post_created = $post_created;
    }
}
