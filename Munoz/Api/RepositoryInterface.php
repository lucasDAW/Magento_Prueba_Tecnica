<?php
namespace Hiberus\Munoz\Api;

use Hiberus\Munoz\Api\Data\DataInterface;

interface RepositoryInterface 
{

    public function save(DataInterface $exam);
    public function getById($id);
    public function delete(DataInterface $exam);
    public function deleteById($id);
}







?>




