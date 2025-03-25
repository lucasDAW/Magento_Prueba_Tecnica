<?php

namespace Hiberus\Munoz\Model;

use Hiberus\Munoz\Api\Data\ExamInterface;
use Hiberus\Munoz\Api\Data\ExamInterfaceFactory;
use Hiberus\Munoz\Api\Data\ExamSearchResultsInterfaceFactory;
use Hiberus\Munoz\Api\ExamRepositoryInterface;
use Hiberus\Munoz\Model\ResourceModel\Exam as ResourceExam;
use Hiberus\Munoz\Model\ResourceModel\Exam\CollectionFactory as ExamCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ExamRepository implements ExamRepositoryInterface
{

    /**
     * @var ExamInterfaceFactory
     */
    protected ExamInterfaceFactory $examFactory;

    /**
     * @var ResourceExam
     */
    protected ResourceExam $resource;

    /**
     * @var ExamSearchResultsInterfaceFactory
     */
    protected ExamSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    /**
     * @var ExamCollectionFactory
     */
    protected ExamCollectionFactory $examCollectionFactory;


    /**
     * @param ResourceExam $resource
     * @param ExamInterfaceFactory $examFactory
     * @param ExamCollectionFactory $examCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ExamSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourceExam $resource,
        ExamInterfaceFactory $examFactory,
        ExamCollectionFactory $examCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        ExamSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->examFactory = $examFactory;
        $this->examCollectionFactory = $examCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param ExamInterface $exam
     * @return ExamInterface
     * @throws CouldNotSaveException
     */
    public function save(ExamInterface $exam)
    {
        try {
            $this->resource->save($exam);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the exam: %1',
                $exception->getMessage()
            ));
        }
        return $exam;
    }

    /**
     * @param string $idExam
     * @return ExamInterface
     * @throws NoSuchEntityException
     */
    public function get($idExam)
    {
        $exam = $this->examFactory->create();
        $this->resource->load($exam, $idExam);
        if (!$exam->getId()) {
            throw new NoSuchEntityException(__('Exam with id "%1" does not exist.', $idExam));
        }
        return $exam;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->examCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var SearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param ExamInterface $exam
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ExamInterface $exam)
    {
        try {
            $examModel = $this->examFactory->create();
            $this->resource->load($examModel, $exam->getIdExam());
            $this->resource->delete($examModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Exam: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @param string $idExam
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($idExam)
    {
        return $this->delete($this->get($idExam));
    }


    public function getMessageTest(){
        return 'Esto es un prueba';
    }
}

