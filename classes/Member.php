<?php
/**
 * This class is the normal member
 * User: Bessy Torres-Miller
 * Date: 2/12/2018
 * Time: 5:05 PM
 */

/**
 * Class Member will create a normal member for the dating site with general information
 *@author Bessy Torres-Miller
 *
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

    /**
     * Member constructor of the class
     * @param $fname first Name
     * @param $lname last name
     * @param $age age
     * @param $gender gender
     * @param $phone phone number
     * @param $email email
     * @param $state state
     * @param $seeking seeking
     * @param $bio biography
     */
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

    /**
     * This is the setter for First Name
     * @param first name
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * Getter for first name
     * @return first Name
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Setter for last name
     * @param last name
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * Getter for last name
     * @return last name
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Setter for age
     * @param age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Getter for age
     * @return age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Setter for gender
     * @param gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Getter for gender
     * @return gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Setter for phone number
     * @param phone number
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Getter for phone number
     * @return phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Setter for email
     * @param email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Getter for email
     * @return email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Setter for state
     * @param state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Getter for state
     * @return state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Setter for Seeking
     * @param seeking
     */
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    /**
     * Getter for seeking
     * @return seeking
     */
    public function getSeeking()
    {
        return $this->seeking;
    }

    /**
     * Getter for Biography
     * @return biography
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Setter for biography
     * @param $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

}