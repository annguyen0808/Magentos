<?php
namespace Van\Featured\Model;


use Van\Featured\Api\Data;
use Van\Featured\Api\FeaturedRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Van\Featured\Model\ResourceModel\Featured as ResourceFeatured;
use Van\Featured\Model\ResourceModel\Featured\CollectionFactory as FeaturedCollectionFactory;
class FeaturedRepository implements FeaturedRepositoryInterface
{
   
    protected $resource;

  
    protected $FeaturedFactory;

    
    protected $FeaturedCollectionFactory;

    
    protected $searchResultsFactory;
    
    private $collectionProcessor;

    public function __construct(
        ResourceFeatured $resource,
        FeaturedFactory $FeaturedFactory,
        Data\FeaturedInterfaceFactory $dataFeaturedFactory,
        FeaturedCollectionFactory $FeaturedCollectionFactory
    ) {
        $this->resource = $resource;
        $this->FeaturedFactory = $FeaturedFactory;
        $this->FeaturedCollectionFactory = $FeaturedCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    
    public function save(\Van\Featured\Api\Data\FeaturedInterface $Featured)
    {
       
        try {
            $this->resource->save($Featured);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Featured: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Featured;
    }

   
    public function getById($FeaturedId)
    {
        $Featured = $this->FeaturedFactory->create();
        $Featured->load($FeaturedId);
        if (!$Featured->getId()) {
            throw new NoSuchEntityException(__('The CMS Featured with the "%1" ID doesn\'t exist.', $FeaturedId));
        }
        return $Featured;
    }

    
    public function getList()
    {
        $collection = $this->FeaturedCollectionFactory->create();
        return $collection;
    }

   
    public function delete(\Van\Featured\Api\Data\FeaturedInterface $Featured)
    {
        try {
            $this->resource->delete($Featured);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Featured: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    
    public function deleteById($FeaturedId)
    {
        return $this->delete($this->getById($FeaturedId));
    }
}