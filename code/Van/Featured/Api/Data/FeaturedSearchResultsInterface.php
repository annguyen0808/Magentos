<?php

namespace Van\Featured\Api\Data;

interface FeaturedSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

   
    public function getItems();

    public function setItems(array $items);
}