<?php
namespace Blog\Post\Model;


use Blog\Post\Api\Data;
use Blog\Post\Api\ContactRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Blog\Post\Model\ResourceModel\Contact as ResourceContact;
use Blog\Post\Model\ResourceModel\Contact\CollectionFactory as ContactCollectionFactory;
class ContactRepository implements ContactRepositoryInterface
{
   
    protected $resource;

  
    protected $ContactFactory;

    
    protected $ContactCollectionFactory;

    
    protected $searchResultsFactory;
    
    private $collectionProcessor;

    public function __construct(
        ResourceContact $resource,
        ContactFactory $ContactFactory,
        Data\ContactInterfaceFactory $dataContactFactory,
        ContactCollectionFactory $ContactCollectionFactory
    ) {
        $this->resource = $resource;
        $this->ContactFactory = $ContactFactory;
        $this->ContactCollectionFactory = $ContactCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
       
        try {
            $this->resource->save($Contact);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Contact: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Contact;
    }

   
    public function getById($ContactId)
    {
        $Contact = $this->ContactFactory->create();
        $Contact->load($ContactId);
        if (!$Contact->getId()) {
            throw new NoSuchEntityException(__('The CMS Contact with the "%1" ID doesn\'t exist.', $ContactId));
        }
        return $Contact;
    }

    
    public function getList()
    {
        $collection = $this->ContactCollectionFactory->create();
        return $collection;
    }

   
    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
        try {
            $this->resource->delete($Contact);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Contact: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    
    public function deleteById($ContactIdId)
    {
        return $this->delete($this->getById($ContactIdId));
    }
}