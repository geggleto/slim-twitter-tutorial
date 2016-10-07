<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 11:31 AM
 */

namespace Twitter\Services;


class SessionService
{
    public function __construct()
    {
    }

    public function start() {
        session_start();

        return $this;
    }

    public function setName($name) {
        session_name($name);

        return $this;
    }

    public function destroy() {
        session_destroy();
    }

    /**
     * @param $k
     * @param $v
     * @return $this
     */
    public function put($k, $v) {
        $_SESSION[$k] = $v;

        return $this;
    }

    /**
     * @param $k
     * @return mixed
     */
    public function get($k) {
        return $_SESSION[$k];
    }
}