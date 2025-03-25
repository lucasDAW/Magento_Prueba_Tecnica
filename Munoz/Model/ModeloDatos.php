<?php

namespace Hiberus\Munoz\Model;

use Magento\Framework\Model\AbstractModel;


class ModeloDatos extends AbstractModel
{
    protected function __construct(){
        $this->_init(\Hiberus\Munoz\Model\ResourceModel\MiModel::class);    
    }

    /**
     * get id
     *
     * @return int
     */
    public function getId(){
        return $this->getData(self::ID_EXAM);
    }

    /**
     * set id
     *
     * @param  $id
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function setId($id){
        return $this->setData(self::setId,$id);
    }

    /**
     * get firstname
     *
     * @return string
     */
    public function getFirstname(){
        return $this->getData(self::FIRSTNAME);
    }

    /**
     * set firstname
     *
     * @param  $firstname
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function setFirstname($firstname){
        return $this->setData(self::setFirstname,$firstname);
    }

    /**
     * get lastname
     *
     * @return string
     */
    public function getLastname(){
        return $this->getData(self::LASTNAME);
    }

    /**
     * set lastname
     *
     * @param  $lastname
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function setLastname($lastname){
        return $this->setData(self::setLastname,$lastname);
    }

    /**
     * get mark
     *
     * @return float
     */
    public function getMark(){
        return $this->getData(self::MARK);
    }

    /**
     * set mark
     *
     * @param  $mark
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function setMark($mark){
        return $this->setData(self::setMark,$mark);
    }

}

?>