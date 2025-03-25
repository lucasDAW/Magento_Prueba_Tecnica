<?php


namespace Hiberus\Munoz\Api;

interface ExamRepositoryInterface
{

   
    public function save(
        \Hiberus\Munoz\Api\Data\ExamInterface $exam
    );

   
    public function get($idExam);

    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    
    public function delete(
        \Hiberus\Munoz\Api\Data\ExamInterface $exam
    );

    
    public function deleteById($idExam);
    /**
     * @return string
     */
    public function getMessageTest();
}

