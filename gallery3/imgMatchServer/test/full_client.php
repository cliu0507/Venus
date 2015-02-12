<?php
$fp = stream_socket_client("tcp://127.0.0.1:9117", $errno, $errstr, 30);

if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    fwrite($fp, "query_id:1:2:100");
    while (!feof($fp)) {
        echo fgets($fp, 1024);
    }
    fclose($fp);
}
?>
