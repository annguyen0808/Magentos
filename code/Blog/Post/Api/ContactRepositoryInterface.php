<?php
namespace Blog\Post\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ContactRepositoryInterface
{
    
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact);

    public function getById($ContactId);

    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact);

    public function deleteById($ContactId);
}
