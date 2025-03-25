<?php

namespace Hiberus\Munoz\Model;

use Hiberus\Munoz\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

class Exam extends AbstractModel implements ExamInterface
{

    public function _construct()
    {
        $this->_init(\Hiberus\Munoz\Model\ResourceModel\Exam::class);
    }

    /**
     * @return int
     */
    public function getIdExam()
    {
        return $this->getData(self::ID_EXAM);
    }

    /**
     * @param int $idExam
     * @return Exam
     */
    public function setIdExam($idExam)
    {
        return $this->setData(self::ID_EXAM, $idExam);
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->getData(self::FIRSTNAME);
    }

    /**
     * @param string $firstname
     * @return ExamInterface
     */
    public function setFirstname($firstname):ExamInterface
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->getData(self::LASTNAME);
    }

    /**
     * @param string $lastname
     * @return Exam
     */
    public function setLastname($lastname):ExamInterface
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * @return string
     */
    public function getMark()
    {
        return (float) $this->getData(self::MARK);
    }

    /**
     * @param string $mark
     * @return Exam
     */
    public function setMark($mark)
    {
        return $this->setData(self::MARK, $mark);
    }
}


