<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Cache\Factory;

use Laminas\Cache\Storage\Adapter\BlackHole;
use Laminas\Cache\Storage\Adapter\Redis;
use Laminas\Cache\Storage\Plugin\Serializer as SerializerPlugin;
use Laminas\Cache\Storage\StorageInterface;
use Laminas\Serializer\Adapter\Json as JsonSerializer;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class LaminasCacheFactory implements FactoryInterface
{
    /**
     * @throws \Throwable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): StorageInterface
    {
        $config = $container->get('Configuration')['redis-cache'] ?? [];
        if (empty($config)) {
            throw new ServiceNotCreatedException('Configuration "rtedis-cache" is empty.');
        }

        if (empty($config['enabled'])) {
            return new BlackHole();
        }

        $cache = new Redis();
        if (!empty($config['unix_socket'])) {
            $cache->getOptions()->setServer($config['unix_socket']);
        } else {
            $cache->getOptions()->setServer(
                [
                    'host'    => $config['host'],
                    'port'    => $config['port'],
                    'timeout' => $config['timeout'] ?? 10,
                ]
            );
        }

        // Serialize the data (via JSON) before saving
        $serializer = new SerializerPlugin();
        $serializer->getOptions()->setSerializer(JsonSerializer::class);
        $cache->addPlugin($serializer);

        $cache->getOptions()->setNamespace($config['namespace']);

        return $cache;
    }
}
