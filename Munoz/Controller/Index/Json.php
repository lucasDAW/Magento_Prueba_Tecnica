<?php
namespace Hiberus\Munoz\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\Controller\Result\JsonFactory;

class Json implements HttpGetActionInterface 
{

    public function __construct(private readonly JsonFactory $jsonfactory ){
    }

    
    public function execute()
    {
        // $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        // return $resultPage;
        $result = $this->jsonfactory->create();
        $result->setData(['mensaje' => 'test_json']);
        return $result;
    }
}
