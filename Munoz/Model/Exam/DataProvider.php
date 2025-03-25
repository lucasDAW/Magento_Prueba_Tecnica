<?php

namespace Hiberus\Munoz\Model\Exam;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Hiberus\Munoz\Model\ResourceModel\Exam\Collection;

class DataProvider extends AbstractDataProvider
{
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        if ($this->loadedData === null) {
            $items = $this->collection->getItems();
            foreach ($items as $alumno) {
                $this->loadedData[$alumno->getId()] = $alumno->getData();
            }
        }

        return $this->loadedData ?? [];
    }
}
