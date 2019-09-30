<?php


class User
{
    private $user_id;
    private $email;
    private $first_name;
    private $last_name;
    private $gender;
    private $adresse;
    private $picture;

    public function __construct()
    {
        $user_id = $this->user_id;
        $email = $this->email;
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $gender = $this->gender;
        $adresse = $this->adresse;
        $picture = $this->picture;
    }
    // Get User_Id
    public function __getUser_Id()
    {
        return $this->user_id;
    }
    // Get Firstname
    public function __getFirst_Name()
    {
        return $this->first_name;
    }
    // Get Lastname
    public function __getLast_Name()
    {
        return $this->last_name;
    }
    // Get Gender
    public function __getGender()
    {
        return $this->gender;
    }
    // Get Adresse
    public function __getAdresse()
    {
        return $this->adresse;
    }
    // Get Picture
    public function __getPicture()
    {
        return $this->picture;
    }
    // Setting User_Id
    public function __setUser_Id($user_id)
    {
        $this->user_id = $user_id;
    }
    // Setting Firstname
    public function __setFirst_Name($first_name)
    {
        $this->first_name = $first_name;
    }
    // Setting Lastname
    public function __setLast_Name($last_name)
    {
        $this->last_name = $last_name;
    }
    // Setting Gender
    public function __setGender($gender)
    {
        $this->gender = $gender;
    }
    // Setting Adresse
    public function __setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    // Setting Picture
    public function __setPicture($picture)
    {
        $this->picture = $picture;
    }
}
