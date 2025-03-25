<?php

namespace Hiberus\Munoz\Controller\Adminhtml\Student;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Hiberus_Munoz::students';

    private $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hiberus_Munoz::students');
        $resultPage->getConfig()->getTitle()->prepend(__('Gestión de Student\'s'));

        return $resultPage;
    }
}
