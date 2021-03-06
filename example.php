<?php

require_once __DIR__ . '/vendor/autoload.php';
$config = include __DIR__ . '/config.php';

try {

    $client = new \ProxmoxApi\ProxmoxClient($config['host'], $config['user'], $config['password'], $config['realm']);
    $node = $client->node('proxmox'/* Node name */);
    $vm = $node->vm(100/* VM id */);

    print_r($vm->get('status/current'));

    /*$vm->set("resize", [
        'disk' => $vm->config()->bootdisk,
        'size' => "+1G"
    ]);*/

    // print_r($client->get('nodes'));
    // print_r($node->get('disks/list'));
    // print_r($vm->config());

} catch(\ProxmoxApi\ProxmoxApiException $e) {
    exit("Error: {$e->getMessage()}\n");
}