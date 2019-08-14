<?php
namespace RazonYang\MediaWiki\ZhConverter;

class FakeMemCachedClient
{
    public function add($key, $val, $exp = 0)
    {
        return true;
    }

    public function decr($key, $amt = 1)
    {
        return null;
    }

    public function delete($key, $time = 0)
    {
        return false;
    }

    public function makeKey()
    {
    }

    public function disconnect_all()
    {
    }

    public function enable_compress($enable)
    {
    }

    public function forget_dead_hosts()
    {
    }

    public function get($key)
    {
        return null;
    }

    public function get_multi($keys)
    {
        return array_pad(array(), count($keys), null);
    }

    public function incr($key, $amt = 1)
    {
        return null;
    }

    public function replace($key, $value, $exp = 0)
    {
        return false;
    }

    public function run_command($sock, $cmd)
    {
        return null;
    }

    public function set($key, $value, $exp = 0)
    {
        return true;
    }

    public function set_compress_threshold($thresh)
    {
    }

    public function set_debug($dbg)
    {
    }

    public function set_servers($list)
    {
    }
}
