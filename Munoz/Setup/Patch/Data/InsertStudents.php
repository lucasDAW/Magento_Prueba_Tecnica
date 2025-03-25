<?php

namespace Hiberus\Munoz\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

use Hiberus\Munoz\Model\ExamFactory;
use Hiberus\Munoz\Api\ExamRepositoryInterface;

class InsertStudents implements DataPatchInterface
{

    private $moduleDataSetup;
    private $examFactory;
    private $examRepository;
    
    
    const CSV_FILE ="app/code/Hiberus/Munoz/data/students.csv";
    const TABLE_NAME = "hiberus_munoz_student";

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ExamFactory $examFactory,
        ExamRepositoryInterface $examRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->examFactory = $examFactory;
        $this->examRepository = $examRepository;
    }

    public function apply(){
       
        $file = BP.'/app/code/Hiberus/Munoz/data/students.csv';

        if(!file_exists($file)){
            throw new \Exception(__('CSV File not exist').' '.$file);
        }
        
        $handle = fopen($file,'r');
        if ($handle == false){
            throw new \Exception(__('CSV File can not open'));
            
        }
        fgetcsv($handle);
        while(($data= fgetcsv($handle, 1000,','))!== false){
            list($firstname, $lastname) = $data;
            $mark = round(mt_rand(0,100)/10,2);
            
            $exam = $this->examFactory->create();
            $exam->setFirstname($firstname);
            $exam->setLastname($lastname);
            $exam->setMark($mark);

            $this->examRepository->save($exam);
        }        
            
            
        fclose($handle);
        
    }

    public static function getDependencies(){
        return [];
    }
    public function getAliases(){
        return [];
    }
}

?>