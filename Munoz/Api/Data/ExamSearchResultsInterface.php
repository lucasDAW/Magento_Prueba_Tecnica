<?php

namespace Hiberus\Munoz\Api\Data;

interface ExamSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

   
    public function getItems();

    
    public function setItems(array $items);
}

