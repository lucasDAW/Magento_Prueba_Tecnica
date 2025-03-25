<?php

namespace Hiberus\Munoz\Model\ResourceModel\Exam;

use Hiberus\Munoz\Api\Data\ExamInterface;
use Hiberus\Munoz\Model\Exam;
use Hiberus\Munoz\Model\ResourceModel\Exam as ResourceExam;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = ExamInterface::ID_EXAM;

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init(Exam::class, ResourceExam::class);
    }
}
