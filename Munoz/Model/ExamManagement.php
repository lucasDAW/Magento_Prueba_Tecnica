<?php


namespace Hiberus\Munoz\Model;

use Hiberus\Munoz\Api\ExamManagementInterface;
use Hiberus\Munoz\Api\ExamRepositoryInterface;
use Hiberus\Munoz\Api\Data\ExamInterface;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\LocalizedException;

class ExamManagement implements ExamManagementInterface
{
    /**
     * @var ExamRepositoryInterface
     */
    protected ExamRepositoryInterface $examRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @param ExamRepositoryInterface $examRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ExamRepositoryInterface $examRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->examRepository = $examRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return SearchResultsInterface
     * @throws LocalizedException
     */
    public function getList()
    {
        $searchCriteria=$this->searchCriteriaBuilder->create();
        return $this->examRepository->getList($searchCriteria);
        
    }
    // bandera del comando
    public function getListByFirstName($firsname){
        $searchCriteria=$this->searchCriteriaBuilder
            ->addFilter(ExamInterface::FIRSTNAME, '%' . $firsname . '%','like')->create();
        return $this->examRepository->getList($searchCriteria);
    }
}

