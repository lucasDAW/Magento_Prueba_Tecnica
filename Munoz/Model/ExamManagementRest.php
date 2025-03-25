<?php

namespace Hiberus\Munoz\Model;

use Hiberus\Munoz\Api\Data\ExamInterface;
use Hiberus\Munoz\Api\ExamManagementInterface;
use Hiberus\Munoz\Api\ExamManagementRestInterface;
use Hiberus\Munoz\Api\ExamRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class ExamManagementRest implements ExamManagementRestInterface
{
    /**
     * @var ExamRepositoryInterface
     */
    protected ExamRepositoryInterface $examRepository;

    /**
     * @var ExamManagementInterface
     */
    protected ExamManagementInterface $examManagement;

    public function __construct(ExamRepositoryInterface $examRepository, ExamManagementInterface $examManagement)
    {
        $this->examRepository = $examRepository;
        $this->examManagement = $examManagement;
    }

    /**
     * @return ExamInterface[]|null
     */
    public function getListExam()
    {
        try {
            return $this->examManagement->getList()->getItems();
        } catch (LocalizedException $e) {
            return null;
        }
    }

    /**
     * @param int $idExam
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteExam(int $idExam):bool
    {
        if ($idExam>0) {
            return $this->examRepository->deleteById((int)$idExam);
        } else {
            return false;
        }
    }

    /**
     * @param ExamInterface $exam
     * @return bool
     * @throws LocalizedException
     */
    public function putExam($exam)
    {
        if ($exam->getIdExam() == 0) {
            $exam->setIdExam(null);
        }

        if (empty($exam->getFirstname())) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Not empty first name'));
        }

        if (empty($exam->getLastname())) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Not empty last name'));
        }

        if ($exam->getData(ExamInterface::MARK)>=10 || $exam->getData(ExamInterface::MARK)<0) {
            throw new \Magento\Framework\Exception\LocalizedException(__('The exam mark has to be between 0 and 9.'));
        }

        $this->examRepository->save($exam);
        return true;
    }

    public function getMessageTest(){
        return 'Esto es un prueba';
    }

    public function saveStudent($student){
        try {
            $this->examRepository->save($student);
            return true;            
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('No se pudo guardar el alumno: %1', $e->getMessage()));
        }
    }

    public function updateStudent($id,$student){
        try {
            $exam=$this->examRepository->get($id);
            

    
            // Actualizar solo los valores que se envían
            if ($exam->getFirstname()) {
                $exam->setFirstname($student->getFirstname());
            }
            if ($exam->getLastname()) {
                $exam->setLastname($student->getLastname());
            }
            if ($exam->getMark() !== null) {
                $exam->setMark($student->getMark());
            }
    
            $this->examRepository->save($exam);
            return true;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('No se pudo actualizar el examen: %1', $e->getMessage()));
        }
    }

    public function showStudent($id){
        try {
            $exam=$this->examRepository->get($id);
        
            if (!$exam->getIdExam()) {
                throw new NoSuchEntityException(__('El examen con ID %1 no existe', $id));
            }
        
            return $exam;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('No se pudo mostrar el alumno: %1', $e->getMessage()));
        }
    }

    public function deleteStudent($id){
        try {
            $exam=$this->examRepository->get($id);
        
            if (!$exam->getIdExam()) {
                return 'No existe el alumno con el ID ';
                // throw new NoSuchEntityException(__('El examen con ID %1 no existe', $id));
            }


            $this->examRepository->deleteById((int)$id);

            return 'Alumno borrado correctamente :)';
        } catch (\Exception $e) {
            return '(catch)No existe el alumno con el ID '.$id;
            // throw new CouldNotSaveException(__('No se pudo mostrar el alumno: %1', $e->getMessage()));
        }
    }
}
