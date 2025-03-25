<?php

namespace Hiberus\Munoz\Setup;

use Hiberus\Munoz\Api\Data\ExamInterface;
use Hiberus\Munoz\Api\Data\ExamInterfaceFactory;
use Hiberus\Munoz\Api\ExamRepositoryInterface;
use Magento\Framework\File\Csv;
use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Math\Random;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Psr\Log\LoggerInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * Relative path of file to import with student data
     */
    const PATH_FILE_IMPORT_DATA = 'data/students.csv';

    /**
     * @var Csv
     */
    protected Csv $csv;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @var string|null
     */
    protected ?string $absolutePath = null;

    /**
     * @var ExamRepositoryInterface
     */
    protected ExamRepositoryInterface $repoExam;

    /**
     * @var ExamInterfaceFactory
     */
    protected ExamInterfaceFactory $examFactory;

    /**+
     * UpgradeData constructor.
     * @param Csv $csv
     * @param LoggerInterface $logger
     * @param DirectoryList $dir
     * @param ExamRepositoryInterface $repoExam
     * @param ExamInterfaceFactory $examFactory
     */
    public function __construct(
        Csv $csv,
        LoggerInterface $logger,
        DirectoryList $dir,
        ExamRepositoryInterface $repoExam,
        ExamInterfaceFactory $examFactory
    ) {
        $this->csv = $csv;
        $this->logger = $logger;
        $this->absolutePath = $dir->getRoot();
        $this->repoExam = $repoExam;
        $this->examFactory = $examFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (version_compare($context->getVersion(), '0.1.1', '<')) {
            try {
                $this->processFileCsv();
            } catch (\Throwable $e) {
                $this->logger->critical($e->getMessage());
            }
        }

        $installer->endSetup();
    }

    /**
     * @throws \Exception
     */
    public function processFileCsv()
    {
        $path = $this->absolutePath . DIRECTORY_SEPARATOR . self::PATH_FILE_IMPORT_DATA;
        if (file_exists($path)) {
            $header = null;
            foreach ($this->csv->getData($path) as $key => $row) {
                if ($key == 0) {
                    $header = $row;
                } else {
                    $data = array_combine($header, $row);
                    $exam = $this->examFactory->create();
                    $exam->setFirstname($data[ExamInterface::FIRSTNAME]);
                    $exam->setLastname($data[ExamInterface::LASTNAME]);
                    $mark = ((float)(Random::getRandomNumber(0, 9) . "." .
                        Random::getRandomNumber(0, 9) . Random::getRandomNumber(0, 9)));
                    $exam->setMark($mark);
                    $this->repoExam->save($exam);
                }
            }
        }
    }
}
