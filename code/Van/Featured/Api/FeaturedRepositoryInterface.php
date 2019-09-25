<?php
namespace Van\Featured\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FeaturedRepositoryInterface
{
    
    public function save(\Van\Featured\Api\Data\FeaturedInterface $Featured);

    public function getById($FeaturedId);

    public function delete(\Van\Featured\Api\Data\FeaturedInterface $Featured);

    public function deleteById($FeaturedId);
}
