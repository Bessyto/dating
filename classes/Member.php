<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/12/2018
 * Time: 5:05 PM
 */

class Member
{
    //variables
    protected $fname;
    protected $lname;
    protected $age;
    protected $gender;
    protected $phone;
    protected $email;
    protected $state;
    protected $seeking;
    protected $bio;



    //constructor
    function __construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
        $this->state = $state;
        $this->seeking = $seeking;
        $this->bio = $bio;

    }

    function Member($fname,$lname, $age, $gender, $phone)
    {

    }

    /**
     * @param $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return first Name
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return last name
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $seeking
     */
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    /**
     * @return seeking
     */
    public function getSeeking()
    {
        return $this->seeking;
    }

    /**
     * @return biography
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }



































}