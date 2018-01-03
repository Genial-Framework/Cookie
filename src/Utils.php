<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Cookie> For the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cookie/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cookie;

/**
 * Utils.
 */
class Utils
{
    
    /**
     * getCookieParams().
     *
     * Get the currently set cookie params.
     *
     * @return array Return the currently set cookie params.
     */
    public static function getCookieParams()
    {
        return session_get_cookie_params();
    }
    
    /**
     * encode().
     *
     * Encode a cookie variable.
     *
     * @param mixed $val The data that should be encoded.
     *
     * @return string Return the encoded data.
     */
    public static function encode($val = null)
    {
        $res = 'n|n';
        if (is_array($val))
        {
            if (!(array_depth($val) > 10))
            {
                $res = 'a|' . json_encode($val);
            } else
            {
                $res = 'n|n';
            }
        } elseif (is_bool($val))
        {
            if ($val)
            {
                $res = 'b|t';
            } else
            {
                $res = 'b|f';
            }
        } elseif (is_int($val))
        {
            if ($val < PHP_INT_MAX)
            {
                $res = 'i|' . strval($val);
            } else
            {
                $res = 'n|n';
            }
        } elseif (is_float($val))
        {
            if (!(strlen(strval($val)) > 250))
            {
                $res = 'f|' . strval($val);
            } else
            {
                $res = 'n|n';
            }
        } elseif (is_string($val))
        {
            if (!(strlen($val) > 500))
            {
                $res = "s|$val";
            } else
            {
                $res = 'n|n';
            }
        } else
        {
            $res = 'n|n';
        }
        return $res;
    }
    
    /**
     * decode().
     *
     * Decode a cookie variable.
     *
     * @param string $data The data that should be decoded.
     *
     * @return mixed Return the decoded data.
     */
    public static function decode(string $data)
    {
        $val = substr($data, 2);
        if ($data[0] == 'a')
        {
            return json_decode($val);
        } elseif ($data[0] == 'b')
        {
            if ($val == 't')
            {
                return true;
            } else
            {
                return false;
            }
        } elseif ($data[0] == 'i')
        {
            return (int) $val;
        } elseif ($data[0] == 'f')
        {
            return (float) $val;
        } elseif ($data[0] == 's')
        {
            return $val;
        } else
        {
            return null;
        }
    }
    
    /**
     * validCookieName().
     *
     * Validate the cookie name.
     *
     * @param string|null $name The name of the cookie variable.
     *
     * @throws BadMethodCallException   If the $name argument is missing.
     * @throws UnexpectedValueException If the name argument is empty.
     * @throws LengthException          If the name argument is too long.
     *
     * @return string The name of the cookie if it is valid.
     */
    public static function validCookieName(string $name = null)
    {
        if (is_null($name))
        {
            throw new Exception\BadMethodCallException(sprintf(
                '`%s` The `$name` argument is missing.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '')
        {
            throw new Exception\UnexpectedValueException(sprintf(
                '`%s` The `$name` argument is empty.',
                __METHOD__
            ));
        }
        if (strlen($name) > 30)
        {
            throw new Exception\LengthException(sprintf(
                '`%s` The `$name` argument is too long.',
                __METHOD__
            ));
        }
        return $name;
    }
    
}
