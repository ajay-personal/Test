<?php
namespace Ajay\CmsBlocks\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;

class AddCmsBlocks implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * AddCmsBlocks constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $newCmsStaticBlock = [
        [
            'title' => 'Test Block 1',
            'identifier' => 'test-block-1',
            'content' => '',
            'is_active' => 1,
            'stores' => [0]
            ],
        [
        'title' => 'Test Block 2',
            'identifier' => 'test-block-3',
            'content' => '',
            'is_active' => 1,
            'stores' => [0]
        ],
        [
        'title' => 'Test Block 3',
            'identifier' => 'test-block-3',
            'content' => '',
            'is_active' => 1,
            'stores' => [0]
            ]
        ];




        foreach ($newCmsStaticBlock as $data) {
            $this->blockFactory->create()->setData($data)->save();
        }
        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
