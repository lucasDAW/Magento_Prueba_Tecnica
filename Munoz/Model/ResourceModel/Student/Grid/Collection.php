<?php

namespace Hiberus\Munoz\Model\ResourceModel\Student\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Munoz\Model\Exam;
use Hiberus\Munoz\Model\ResourceModel\Exam as ExamResource;


class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Exam::class, ExamResource::class);
    }

    public function getItems()
    {
        return parent::getItems() ?: [];  // Asegúrate de no devolver null.
    }
    public function getData()
    {
        return parent::getData() ?: [];  // Asegúrate de no devolver null.
    }
    
}
