<?php
namespace Hiberus\Munoz\Model\ResourceModel;



use Hiberus\Munoz\Api\Data\ExamInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Exam extends AbstractDb
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init(ExamInterface::TABLE, ExamInterface::ID_EXAM);
    }
}


