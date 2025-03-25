<?php


namespace Hiberus\Munoz\Model\ResourceModel\Exam\Grid;

use Magento\Framework\Api\Search\AggregationInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Munoz\Model\Exam;
use Hiberus\Munoz\Model\ResourceModel\Exam as ExamResource;

class Collection extends AbstractCollection implements SearchResultInterface
{
    protected $_idFieldName = 'id';  // Define el campo de ID primario.
    protected $aggregations;

    protected function _construct()
    {
        $this->_init(Exam::class, ExamResource::class);
    }

    // Implementación de los métodos requeridos por SearchResultInterface

    /**
     * Get aggregations
     *
     * @return AggregationInterface|null
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * Set aggregations
     *
     * @param AggregationInterface $aggregations
     * @return $this
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
        return $this;
    }

    /**
     * Get search criteria
     *
     * @return SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * Set search criteria
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return $this
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria = null)
    {
        return $this;
    }

    /**
     * Get total count
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count
     *
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

    /**
     * Get items
     *
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * Set items list
     *
     * @param array $items
     * @return $this
     */
    public function setItems(array $items = null)
    {
        return $this;
    }
}
