<?php
namespace Van\Featured\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;//tạo biến lưu kết nối đến database
		$installer->startSetup();
		if (!$installer->tableExists('an_featured_product')) {
			$table = $installer->getConnection()->newTable(//chuyền vào phương thức
				$installer->getTable('an_featured_product')
			)
				->addColumn(
					'featured_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Featured ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Name'
				)
				->addColumn(
					'url_key',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'URL Key'
				)
				->addColumn(
					'image',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					['nullable' => true, 'default' => null],
					'Image'
				)

				->addColumn(
					'content',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					['nullable' => false],
					'Content'
                )
                ->addColumn(
                    'sort_order',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['nullable' => false, 'default' => 0]
                )
				->addColumn(
					'is_featured',
					\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
					null,
					['nullable' => false, 'default' => '1'],
					'Is_featured'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
				)
				->setComment('An Bai 4');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('an_featured_product'),
				$setup->getIdxName(
					$installer->getTable('an_featured_product'),
					['name', 'url_key', 'image', 'content'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name', 'url_key', 'image', 'content'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}