<?php

namespace Hiberus\Munoz\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;


class MiModel extends AbstractDb{

    protected function __construct(Context $context,
    $resourcePrefix = null){
        parent::__construct($context, $resourcePrefix);   
    }

    protected function _construct()
    {
        $this->_init('hiberus_munoz_student', 'id_exam'); // Especifica la tabla y la clave primaria
    }

}



?>