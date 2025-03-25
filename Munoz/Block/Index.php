<?php

namespace Hiberus\Munoz\Block;

use Hiberus\Munoz\Model\ExamManagement;
use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Psr\Log\LoggerInterface;

class Index extends Template
{
    /**
     * @var ExamManagement
     */
    protected ExamManagement $examManagement;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * Constructor
     *
     * @param Context $context
     * @param ExamManagement $examManagement
     * @param array $data
     */
    public function __construct(
        Context $context,
        ExamManagement $examManagement,
        LoggerInterface $logger,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->examManagement = $examManagement;
        $this->logger = $logger;
    }

    /**
     * @return ExtensibleDataInterface[]
     */
    public function getExams()
    {
      
        try {
            return $this->examManagement->getList()->getItems();
        } catch (LocalizedException $e) {
            $this->logger->critical($e->getMessage());
            return [];
        }
    }

    public function test(){
        return 'method test';
    }
}
