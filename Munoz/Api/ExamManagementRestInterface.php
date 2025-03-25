<?php

namespace Hiberus\Munoz\Api;

interface ExamManagementRestInterface
{
    /**
     * GET for ListExam api
     * @return \Hiberus\Munoz\Api\Data\ExamInterface[]
     */
    public function getListExam();
    

    /**
     * DELETE for Exam api
     * @param int $idExam
     * @return bool
     */
    public function deleteExam(int $idExam): bool;

    /**
     * PUT for Exam api
     * @param \Hiberus\Munoz\Api\Data\ExamInterface $exam
     * @return bool
     */
    public function putExam($exam);

    // Mis pruebas
    /**
     * @return string
     */
    public function getMessageTest();

    /**
     * PUT for Exam api
     * @param \Hiberus\Munoz\Api\Data\ExamInterface $student
     * @return bool
     */
    public function saveStudent($student);

    /**
    * Actualizar un alumno existente
    *
    * @param int $id
    * @param \Hiberus\Munoz\Api\Data\ExamInterface $student
    * @return bool
    */
    public function updateStudent($id,$student);
    /**
    * Muestra un alumno existente
    *
    * @param int $id
    * @return Hiberus\Munoz\Api\Data\ExamInterface $student
    */
    public function showStudent($id);

    /**
    * Borra un alumno existente
    *
    * @param int $id
    * @return string
    */
    public function deleteStudent($id);
    
    
}

