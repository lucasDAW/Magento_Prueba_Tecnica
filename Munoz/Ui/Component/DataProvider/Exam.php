<?php

declare(strict_types=1);

namespace Hiberus\Munoz\Ui\Component\DataProvider;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as UiDataProvider;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Exception\LocalizedException;
use Hiberus\Munoz\Model\ResourceModel\Exam\Grid\Collection;  // Usar la fábrica

class Exam extends UiDataProvider
{
    
}
