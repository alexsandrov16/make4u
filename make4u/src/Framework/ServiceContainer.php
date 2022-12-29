<?php

namespace Make4U\Framework;

use Exception;
use Make4U\Framework\Traits\Singleton;
use ReflectionClass;

defined('MAKE4U') || die;

/**
 * Contenedor de Servicios
 */
class ServiceContainer
{
    use Singleton;

    private function __construct(protected array $services)
    {
        $this->set($services);
    }

    /**devolver servicio */
    public function get(string $id): object
    {
        if ($this->has($id)) {
            $ref = new ReflectionClass($this->services[$id]);

            if ($ref->isInstantiable()) {
                return $ref->newInstance();
            }
            throw new Exception("ContainerException Interface", 1);
        }
        throw new Exception("NotFoundException Interface", 1);
    }

    /**Verificar si existe el servicio */
    public function has(string $id): bool
    {
        return key_exists($id, $this->services);
    }

    /**Obtener todos los identificadores de servicios */
    public function getServices():string
    {
        foreach ($this->services as $key => $value) {
            return $key.PHP_EOL;
        }
    }

    /**Establecer servicio */
    public function set(string|array $id, string $service = null): ServiceContainer
    {
        if (is_array($id)) {
            foreach ($id as $key => $value) {
                if ($this->has($key)) throw new Exception("Error Processing Request", 1);

                $this->set($key,$value);
            }
            return $this;
        }

        if ($this->has($id)) throw new Exception("Error Processing Request", 1);

        $service = $service ?? $id;

        $this->services[$id] = $service;
        return $this;
    }
}
