<?php
class Test extends Ysd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function redis()
    {
        //        $obj = $this->load->driver('cache', array('adapter' => 'apc', 'backup'=>'memcached', 'backup' => 'file'));
        //        $obj = $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'memcached' ));
        //        print_r($obj);
        //        echo 'xxxxx';

        $this->load->driver('cache', array('adapter' => 'redis'));

        if ( ! $foo = $this->cache->get('foo'))
        {
            echo 'Saving to the cache!<br />';
            $foo= 'xxxxxxxxkkkkkkk';
            // Save into the cache for 5 minutes
            $this->cache->save('soho', $foo, 300);
        }

        echo $foo;
    }
}