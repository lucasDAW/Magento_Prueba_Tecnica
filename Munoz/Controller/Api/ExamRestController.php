<?php

namespace Hiberus\Munoz\Controller\Api;

use Hiberus\Munoz\Api\ExamRepositoryInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class ExamRestController extends Action
{
    /**
     * @var ExamRepositoryInterface
     */
    protected $examRepository;

    public function __construct(
        Context $context,
        ExamRepositoryInterface $examRepository
    ) {
        parent::__construct($context);
        $this->examRepository = $examRepository;
    }

    /**
     * Obtener el listado de alumnos y calificaciones.
     */
    // public function getList()
    // {
    //     $exams = $this->examRepository->getList();
    //     return $this->_sendResponse($exams);
    // }

    // public function getById(){

    //     $id = $this->getRequest()->getParam('id');
    //     if ($id) {
    //         $exam = $this->examRepository->getById($id);
    //         return $this->_sendResponse($exam);
    //     }

    // }
    public function execute(){
        
    }

    /**
     * Responder con los datos en formato JSON.
     *
     * @param mixed $data
     * @return \Magento\Framework\Controller\Result\Json
     */
    private function _sendResponse($data)
    {
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($data);
    }
}
