<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManualsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManualsTable Test Case
 */
class ManualsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManualsTable
     */
    protected $Manuals;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Manuals',
        'app.Videos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Manuals') ? [] : ['className' => ManualsTable::class];
        $this->Manuals = $this->getTableLocator()->get('Manuals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Manuals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ManualsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
