<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Form text element
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace OsmanSorkar\Blog\Model\Form\Element;

use Magento\Framework\Escaper;
use Magento\Framework\Data\Form\Element\Factory;
use Magento\Framework\Data\Form\Element\CollectionFactory;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Editor extends AbstractElement
{
    /**
     * @param Factory $factoryElement
     * @param CollectionFactory $factoryCollection
     * @param Escaper $escaper
     * @param array $data
     */
    public function __construct(
        Factory $factoryElement,
        CollectionFactory $factoryCollection,
        Escaper $escaper,
        $data = []
    ) {
        parent::__construct($factoryElement, $factoryCollection, $escaper, $data);
        $this->setType('text');
        $this->setExtType('textfield');
    }

    /**
     * @return array
     */
    protected function getButtonTranslations()
    {
        $buttonTranslations = [
            'Insert Image...' => $this->translate('Insert Image...'),
            'Insert Media...' => $this->translate('Insert Media...'),
            'Insert File...' => $this->translate('Insert File...'),
        ];

        return $buttonTranslations;
    }

    /**
     * Translate string using defined helper
     *
     * @param string $string String to be translated
     * @return \Magento\Framework\Phrase
     */
    public function translate($string)
    {
        return (string)new \Magento\Framework\Phrase($string);
    }

    /**
     * Get the HTML
     *
     * @return mixed
     */
    public function getHtml()
    {
        $this->addClass('input-text admin__control-text');
        return $this->getButtonHtml().parent::getHtml();
    }

    public function getButtonHtml($visible = true){
        $buttonsHtml='';
        if ($this->getConfig('add_images')) {
            $buttonsHtml .= $this->_getButtonHtml(
                [
                    'title' => $this->translate('Insert Image...'),
                    'onclick' => "MediabrowserUtility.openDialog('" . $this->getConfig(
                        'files_browser_window_url'
                    ) . "target_element_id/" . $this->getHtmlId() . "/" . (null !== $this->getConfig(
                        'store_id'
                    ) ? 'store/' . $this->getConfig(
                        'store_id'
                    ) . '/' : '') . "')",
                    'class' => 'action-add-image plugin no-label',
                    'style' => $visible ? 'margin-left: 20%; margin-bottom: 3px;' : 'display:none; margin-left: 20%; margin-bottom: 3px;',
                ]
            );
        }
        return $buttonsHtml;
    }

    /**
     * Return custom button HTML
     *
     * @param array $data Button params
     * @return string
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    protected function _getButtonHtml($data)
    {
        $html = '<button type="button"';
        $html .= ' class="scalable ' . (isset($data['class']) ? $data['class'] : '') . '"';
        $html .= isset($data['onclick']) ? ' onclick="' . $data['onclick'] . '"' : '';
        $html .= isset($data['style']) ? ' style="' . $data['style'] . '"' : '';
        $html .= isset($data['id']) ? ' id="' . $data['id'] . '"' : '';
        $html .= '>';
        $html .= isset($data['title']) ? '<span><span><span>' . $data['title'] . '</span></span></span>' : '';
        $html .= '</button>';

        return $html;
    }

    /**
     * Get the attributes
     *
     * @return string[]
     */
    public function getHtmlAttributes()
    {
        return [
            'type',
            'title',
            'class',
            'style',
            'onclick',
            'onchange',
            'onkeyup',
            'disabled',
            'readonly',
            'maxlength',
            'tabindex',
            'placeholder',
            'data-form-part',
            'data-role',
            'data-action'
        ];
    }
}
