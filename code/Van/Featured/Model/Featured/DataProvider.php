<?php

namespace Van\Featured\Model\Featured;

use Van\Featured\Model\ResourceModel\Featured\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;
    protected $dataPersistor;
    protected $loadedData;
    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $featuredCollectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $featuredCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->meta = $this->prepareMeta($this->meta);
    }

    /**
     * Prepares Meta
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * Get data
     */
    public function getData()
    {
        // Get items
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        
        foreach ($items as $featured) {
            $data = $featured->getData();
            // $image = $data['image'];
            // if ($image && is_string($image)) {
            //     $data['images'][0]['name'] = $image;
            //     $data['images'][0]['url'] = $this->storeManager->getStore()
            //             ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)
            //         . 'banner/images/' . $image;
            // }

            $this->loadedData[$featured->getId()] = $data;
        }

        $data = $this->dataPersistor->get('featured');
        if (!empty($data)) {
            $featured = $this->collection->getNewEmptyItem();
            $featured->setData($data);
            $this->loadedData[$featured->getId()] = $featured->getData();
            $this->dataPersistor->clear('featured');
        }

        return $this->loadedData;
    }
}
