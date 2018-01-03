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

/**
 * Manager.
 */
class Manager implements ManagerInterface
{
  
    /**
     * @var array|[] $cookieParams The internal defualt cookie params.
     */
    protected $cookieParams = [];
  
    /**
     * __construct()
     *
     * Set the internal cookie params.
     *
     * @return void.
     */
    function __construct()
    {
        $this->cookieParams = Utils::getCookieParams();
    }
  
}
