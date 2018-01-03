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
 * Handler.
 */
class Handler extends Manager implements HandlerInterface
{
    
    /**
     * set().
     *
     * Set a new cookie variable.
     *
     * @param string|null $name The name of the cookie variable.
     * @param mixed|null $name  The value of the cookie variable.
     * @param int|{0} $expire   The expiration time on the cookie.
     *
     * @throws BadMethodCallException   If the $name argument is missing.
     * @throws UnexpectedValueException If the name argument is empty.
     * @throws LengthException          If the name argument is too long.
     *
     * @return bool|true If the cookie was correctly created.
     */
    public function set(string $name = null, $value = null, $expire = 0)
    {
        $name = Utils::validCookieName($name);
        $value = Utils::encode($value);
        setcookie(
            $name,
            $value,
            intval($expire),
            env('cookie', 'path', $this->cookieParams['path']) == 'null'
                ? $this->cookieParams['path']
                : env('cookie', 'path', $this->cookieParams['path']);
            env('cookie', 'domain', $this->cookieParams['domain']) == 'null'
                ? $this->cookieParams['domain']
                : env('cookie', 'domain', $this->cookieParams['domain']);
            env('cookie', 'secure', $this->cookieParams['secure'])
                ? $this->cookieParams['secure']
                : env('cookie', 'secure', $this->cookieParams['secure']);
            env('cookie', 'http_only', $this->cookieParams['httponly'])
                ? $this->cookieParams['httponly']
                : env('cookie', 'http_only', $this->cookieParams['httponly']);
        );
        $_COOKIE[$name] = $value;
        return true;
    }
    
    /**
     * delete().
     *
     * Delete a cookie variable.
     *
     * @param string|null $name The name of the cookie variable.
     *
     * @throws BadMethodCallException   If the $name argument is missing.
     * @throws UnexpectedValueException If the name argument is empty.
     * @throws LengthException          If the name argument is too long.
     *
     * @return bool|true If the cookie was successfully deleted.
     */
    public function delete(string $name = null)
    {
        $name = Utils::validCookieName($name);
        if (isset($_COOKIE[$name]))
        {
            unset($_COOKIE[$name]);
            setcookie(
                $name,
                '',
                time() - 42000,
                env('cookie', 'path', $this->cookieParams['path']) == 'null'
                    ? $this->cookieParams['path']
                    : env('cookie', 'path', $this->cookieParams['path']);
                env('cookie', 'domain', $this->cookieParams['domain']) == 'null'
                    ? $this->cookieParams['domain']
                    : env('cookie', 'domain', $this->cookieParams['domain']);
                env('cookie', 'secure', $this->cookieParams['secure'])
                    ? $this->cookieParams['secure']
                    : env('cookie', 'secure', $this->cookieParams['secure']);
                env('cookie', 'http_only', $this->cookieParams['httponly'])
                    ? $this->cookieParams['httponly']
                    : env('cookie', 'http_only', $this->cookieParams['httponly']);
            );
        }
        return true;
    }
    
    /**
     * get().
     *
     * Get a cookie variable.
     *
     * @param string|null $name     The name of the cookie variable.
     * @param mixed|null $defRetVal The defualt return value if the cookie is not found.
     *
     * @throws BadMethodCallException   If the $name argument is missing.
     * @throws UnexpectedValueException If the name argument is empty.
     * @throws LengthException          If the name argument is too long.
     *
     * @return mixed The cookie value.
     */
    public function get(string $name = null, $defRetVal = null)
    {
        $name = Utils::validCookieName($name);
        if (isset($_COOKIE[$name]))
        {
            return Utils::decode($_COOKIE[$name]);
        }
        return $defRetVal;
    }
    
}
