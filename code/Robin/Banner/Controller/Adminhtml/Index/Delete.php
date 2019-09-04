<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Robin\Banner\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;

/**
 * Delete CMS page action.
 */
class Delete extends \Magento\Backend\App\Action 
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Robin_Banner::delete';

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // echo 'ấdfasdfasd';
        // die;
        
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Robin\Banner\Model\Banner::class);
                $model->load($id);
                
                $title = $model->getTitle();
                $model->delete();
                
                // display success message
                $this->messageManager->addSuccessMessage(__('The page has been deleted.'));
                
                // go to grid
                $this->_eventManager->dispatch('adminhtml_cmspage_on_delete', [
                    'title' => $title,
                    'status' => 'success'
                ]);
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    ['title' => $title, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
        
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}


// <?php
// namespace Robin\Banner\Controller\Adminhtml\Index;
// class Delete extends \Magento\Backend\App\Action
// {
//     /**
//      * Authorization level of a basic admin session
//      */
//     const ADMIN_RESOURCE = 'Robin_Banner::delete';
//     public function execute()
//     {
//         // Get ID of record by param
//         $id = $this->getRequest()->getParam('id');
//         $resultRedirect = $this->resultRedirectFactory->create();
//         if ($id) {
//             try {
//                 // Init model and delete
//                 $model = $this->_objectManager->create('Robin\Banner\Model\Banner');
//                 $model->load($id);
//                 $id = $model->getId();
//                 $model->delete();
//                 // Display success message
//                 $this->messageManager->addSuccess(__('The image has been deleted.'));
//                 // Redirect to list page
//                 return $resultRedirect->setPath('*/*/');
//             } catch (\Exception $e) {
//                 // Display error message
//                 $this->messageManager->addError($e->getMessage());
//                 // Go back to edit form
//                 return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
//             }
//         }
//         // Display error message
//         $this->messageManager->addError(__('We can\'t find a image to delete.'));
//         // Redirect to list page
//         return $resultRedirect->setPath('*/*/');
//     }
// }





