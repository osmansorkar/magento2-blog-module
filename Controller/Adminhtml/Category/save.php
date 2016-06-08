<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace OsmanSorkar\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{ 

    /**
     * @param Action\Context $context
     * @param PostDataProcessor $dataProcessor
     */
    public function __construct(
        Action\Context $context
        )
    {
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('OsmanSorkar_Blog::category_save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {

            $model = $this->_objectManager->create('OsmanSorkar\Blog\Model\Category');

            $id = $this->getRequest()->getParam('cat_id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'blog_category_prepare_save',
                ['post' => $model, 'request' => $this->getRequest()]
            );

            

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved this Category.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['cat_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the page.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['cat_id' => $this->getRequest()->getParam('cat_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
