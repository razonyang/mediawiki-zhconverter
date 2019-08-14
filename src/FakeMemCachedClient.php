<?php
namespace RazonYang\MediaWiki\ZhConverter;

class FakeMemCachedClient
{
    function add($key, $val, $exp = 0)
    {
        return true;
    }

    function decr($key, $amt = 1)
    {
        return null;
    }

    function delete($key, $time = 0)
    {
        return false;
    }

    function makeKey()
    {

    }

    function disconnect_all()
    {
    }

    function enable_compress($enable)
    {
    }

    function forget_dead_hosts()
    {
    }

    function get($key)
    {
        return null;
    }

    function get_multi($keys)
    {
        return array_pad(array(), count($keys), null);
    }

    function incr($key, $amt = 1)
    {
        return null;
    }

    function replace($key, $value, $exp = 0)
    {
        return false;
    }

    function run_command($sock, $cmd)
    {
        return null;
    }

    function set($key, $value, $exp = 0)
    {
        return true;
    }

    function set_compress_threshold($thresh)
    {
    }

    function set_debug($dbg)
    {
    }

    function set_servers($list)
    {
    }
}