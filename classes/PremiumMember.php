<?php
/**
 * PremiumMember.php , its the premium object for the dating website.
 * This user will be able to fill up interests
 * User: Bessy Torres-Miller
 * Date: 2/12/2018
 * Time: 9:14 PM
 */

/**
 * Class PremiumMember
 * This user will see the interests page and will it.
 * @author Bessy Torres-Miller
 */
class PremiumMember extends Member
{
    //variables
    private $_inDoorInterests = array();
    private $_outDoorInterests = array();

    /**
     * PremiumMember constructor.
     *
     * @param $fname first Name
     * @param $lname last name
     * @param $age age
     * @param $gender gender
     * @param $phone phone number
     * @param $email email
     * @param $state state
     * @param $seeking seeking
     * @param $bio biography
     * @param $inDoorInterests Indoor activities
     * @param $outDoorInterests Outdoor activities
     */
    function __construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio,
                         $inDoorInterests, $outDoorInterests)
    {
        parent::__construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio);

        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;
    }

    /**
     * Getter for Indoor activities
     * @return array of indoor interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * Setter for indoor interests
     * @param array $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * Getter for outdoor activities
     * @return array
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * Setter for outdoor interests
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }





}