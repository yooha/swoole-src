<?php
require_once __DIR__ . "/../include/swoole.inc";

$redis = new swoole_redis();

$redis->on("close", function (){
    echo "closed\n";
});

$result = $redis->connect("127.0.0.1", 19009, function ($redis, $result)
{
    assert($redis->errCode == SOCKET_ECONNREFUSED);
    assert($result === false);
});
?>
