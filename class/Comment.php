<?php


class Comment
{
    private $commentaire_id;
    private $commentaire_created;
    private $user_id;
    private $attachement;
    private $post_id;

    public function __construct()
    {
        $commentaire_id = $this->commentaire_id;
        $commentaire_created = $this->commentaire_created;
        $user_id = $this->user_id;
        $attachement = $this->attachement;
        $post_id = $this->post_id;
    }

    // Getting Commentaire_id
    public function __getCommentaire_Id()
    {
        return $this->commentaire_id;
    }
    // Getting Commentaire_Created
    public function __getCommentaire_Created()
    {
        return $this->commentaire_created;
    }
    // Getting User_Id
    public function __getUser_Id()
    {
        return $this->user_id;
    }
    // Getting Attachement
    public function __getAttachement()
    {
        return $this->attachement;
    }
    // Getting Post_Id
    public function __getPost_Id()
    {
        return $this->post_id;
    }
    // Setting Commentaire_Id
    public function __setCommentaire_Id($commentaire_id)
    {
        $this->commentaire_id = $commentaire_id;
    }
    // Setting Commentaire_Created
    public function __setCommentaire_Created($commentaire_created)
    {
        $this->commentaire_created = $commentaire_created;
    }
    // Setting User_Id
    public function __setUser_Id($user_id)
    {
        $this->user_id = $user_id;
    }
    // Setting Attachement
    public function __setAttachement($attachement)
    {
        $this->attachement = $attachement;
    }
    // Setting Post_Id
    public function __setPost_Id($post_id)
    {
        $this->post_id = $post_id;
    }
}
