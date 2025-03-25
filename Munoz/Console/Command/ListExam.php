<?php

namespace Hiberus\Munoz\Console\Command;

use Hiberus\Munoz\Api\ExamManagementInterface;
use Hiberus\Munoz\Model\ResourceModel\Exam\Collection;

use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Input\InputOption;

class ListExam extends Command
{
    /**
     * @var ExamManagementInterface
     */
    protected ExamManagementInterface $examManagement;
    protected Collection $collection;

    public function __construct(
        ExamManagementInterface $examManagement,
        // Collection $collection,
        string $name = null
    ) {
        parent::__construct($name);
        $this->examManagement = $examManagement;
        // $this->collection = $collection;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws LocalizedException
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $output->writeln('Command');



        // Obtener el argumento "--name" si se proporciona
        $name = $input->getOption('name');

        
        // Si se proporciona un nombre, filtramos la colección
        if ($name) {
            // $collection = $this->collectionFactory->create();
            // $collection->addFieldToFilter('firstname', ['like' => "%$name%"]);
            foreach ($this->examManagement->getListByFirstName($name)->getItems() as $student) {
               

                    $output->writeln(
                        sprintf(
                            "[%d] %s %s - Mark: %.2f",
                            $student->getIdExam(),
                            $student->getFirstname(),
                            $student->getLastname(),
                            $student->getMark()
                            )
                        );
                
            }

            
        }else{

            
            $output->writeln('Student\'s List');
            $output->writeln('----------------------');
            foreach ($this->examManagement->getList()->getItems() as $student) {
                $output->writeln('[' . $student->getIdExam() . ']-' . $student->getFirstname() . ' ' . $student->getLastname() . ': ' . $student->getMark());
            }
        }
        return Cli::RETURN_SUCCESS;
    }

    /**
     * Configure command
     */
    protected function configure()
    {
        $this->setName("hiberus_munoz:list");
        $this->setDescription("List of exam data");
        $this->addOption(
            'name',
            null,
            InputOption::VALUE_REQUIRED,
            'Student\'s name (optional)'
        );
        parent::configure();
    }
}

