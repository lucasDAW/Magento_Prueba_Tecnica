<?php


namespace Hiberus\Munoz\Model;

use Hiberus\Munoz\Api\RepositoryInterface;
use Hiberus\Munoz\Api\Data\DataInterface;
use Hiberus\Munoz\Model\ResourceModel\MiModel as ResourceExam;
// use Hiberus\Munoz\Model\ResourceModel\prueba\MiCollection as CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;


class Repository implements RepositoryInterface
{
    protected $resource;
    protected $examFactory;
    protected $examCollectionFactory;

    public function __construct(

        ResourceExam $resource,
        ExamFactory $examFactory,
        // CollectionFactory $examCollectionFactory
    )
    
    {
        $this->resource=$resource;
        $this->examFactory=$examFactory;
        // $this->examCollectionFactory=$examCollectionFactory;

    }

    public function save(DataInterface $exam){
        try{
            $this->resource->save($exam);

        }catch(\Exception $e){
            throw new CouldNotSaveException(__('Could not Save the exam: %1',$e -> getMessage()));
        }
        return $exam;

    }

    public function getById($id){
        $exam = $this->examFactory->create();
        $this->resource->load($exam,$id);
        if(!$exam->getId()){
            throw new NoSuchEntityException(__('Exam with id "%1" not found.',$id));
        }
        return $exam;

    }

    public function delete(DataInterface $exam){
        try{
            $this->resource->delete($exam);

        }catch(\Exception $e){
            throw new CouldNotDeleteException(__('Could not delete the exam: %1',$e -> getMessage()));
        }
        return true;

    }

    public function deleteById($id){
        $exam = $this->getById($id);
        return $this->delete($exam);

    }

}

?>