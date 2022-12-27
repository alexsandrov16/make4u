<?php

namespace Make4U\Framework;

use Exception;
use Make4U\Framework\Traits\Singleton;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;

defined('MAKE4U') || die;

/**
 * Contenedor de Servicios
 */
class Container
{
    use Singleton;

    private function __construct(protected array $services)
    {
        $this->services = $services;
    }

    public function set(string $id, string|callable $service): Container
    {
        if ($this->has($id)) throw new Exception("Error Processing Request", 1);

        $this->services[$id] = $service;
        return $this;
    }

    public function get(string $id): mixed
    {
        if ($this->has($id)) {
            if (is_string($this->services[$id])) {
                return $this->autowiring($this->services[$id]);
            }
            if (is_callable($this->services[$id])) {
                # code...
            }
        }
        throw new Exception("NotFoundException Interface", 1);
    }

    public function has(string $id): bool
    {
        return key_exists($id, $this->services);
    }

    public function autowiring(string $service)
    {
        $ref = new ReflectionClass($service);

        if ($ref->isInstantiable()) {
            if (!is_null($con = $ref->getConstructor())) {
                $parameters = $con->getParameters();

                $p = new ReflectionParameter($parameters);
    
                return var_dump($p);
    
            }
        }
    }



























    /*
    public function resolve(string $id)
    {
        //if (is_call) {
            # code...
        //}
        return new $this->services[$id];
    }

    /*protected function autowiring(string $class)
    {
        $ref = new ReflectionClass($class);

        if ($ref->IsInstantiable()) {
            if (!is_null($con = $ref->getConstructor())) {
                $parameters = $con->getParameters();
    
                var_dump($parameters->getType());
    
            }
        }
        throw new Exception("ContainerException  Interface", 1);
    }*/
}
