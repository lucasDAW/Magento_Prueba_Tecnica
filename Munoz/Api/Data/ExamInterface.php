<?php

namespace Hiberus\Munoz\Api\Data;

interface ExamInterface
{
    const TABLE = 'hiberus_munoz_student';
    const ID_EXAM = 'id_exam';
    const LASTNAME = 'lastname';
    const MARK = 'mark';
    const FIRSTNAME = 'firstname';

    /**
     * Get exam identifier
     * @return int
     */
    public function getIdExam();

    /**
     * Set exam identifier
     * @param int $idExam
     * @return \Hiberus\Lopez\Exam\Api\Data\ExamInterface
     */
    public function setIdExam(int $idExam);

    /**
     * Get student's name
     * @return string|null
     */
    public function getFirstname();

    /**
     * Set student's name
     * @param string $firstname
     * @return \Hiberus\Lopez\Exam\Api\Data\ExamInterface
     */
    public function setFirstname($firstname);

    /**
     * Get student's lastname
     * @return string|null
     */
    public function getLastname();

    /**
     * Set student's lastname
     * @param string $lastname
     * @return \Hiberus\Lopez\Exam\Api\Data\ExamInterface
     */
    public function setLastname($lastname);

    /**
     * Get exam mark
     * @return float|null
     */
    public function getMark();

    /**
     * Set exam mark
     * @param string $mark
     * @return \Hiberus\Lopez\Exam\Api\Data\ExamInterface
     */
    public function setMark($mark);
}

