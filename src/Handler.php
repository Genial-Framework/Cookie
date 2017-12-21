<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Cookie> for the canonical source repository.
 *
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cookie/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cookie;

/**
 * Handler.
 */
class Handler implements HandlerInterface
{
    public function set(string $name = null, $value = null, $expire)
    {
        if (is_null($name)) {
            throw new Exception\BadMethodCallException(sprintf(
                '`%s` The `$name` argument is missing.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new Exception\UnexpectedValueException(sprintf(
                '`%s` The `$name` argument is empty.',
                __METHOD__
            ));
        }
        $value = Utils::encode($value);
        setcookie(
          
        );
        $_COOKIE[$name] = $value;
    }
  
  
}
