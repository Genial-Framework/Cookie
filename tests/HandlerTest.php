<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Cookie> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cookie/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cookie;

use PHPUnit\Framework\TestCase;

/**
 * ConfigTest.
 */
final class HandlerTest extends TestCase
{

    /**
     * testSet().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testSet()
    {
        $handler = new Handler();
        $this->assertTrue($handler->set('hello', 23332, time() - 42000));
    }

}
