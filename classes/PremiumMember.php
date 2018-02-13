<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/12/2018
 * Time: 9:14 PM
 */

class PremiumMember extends Member
{
    private $_inDoorInterests = array();
    private $_outDoorInterests = array();



    /**
     * @return array
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param array $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return array
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }





}