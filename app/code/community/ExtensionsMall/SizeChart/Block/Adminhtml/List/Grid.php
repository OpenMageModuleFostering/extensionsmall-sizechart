<?php

class ExtensionsMall_SizeChart_Block_Adminhtml_List_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('sizechart_id');
        $this->setId('sizechart_list_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass() {
        // This is the model we are using for the grid
        return 'extensionsmall_sizechart/sizechart_collection';
    }

    protected function _prepareCollection() {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        // Add the columns that should appear in the grid
        $this->addColumn('sizechart_id', array(
            'header' => $this->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'sizechart_id'
                )
        );
        $this->addColumn('title', array(
            'header' => $this->__('Title'),
            'index' => 'title'
                )
        );
        $this->addColumn('sizes', array(
            'header' => $this->__('Sizes'),
            'index' => 'sizes'
                )
        );
        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('sizechart_id' => $row->getSizechartId()));
    }

}
