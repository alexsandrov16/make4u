<?php

namespace Make4U\Framework;

use Exception;
use Make4U\Framework\Traits\Singleton;
use ReflectionClass;

defined('MAKE4U') || die;

/**
 * Contenedor de Servicios
 * 
 * Para versiones futuras
 */
class Container
{
    use Singleton;

    private function __construct(protected array $services)
    {
        $this->services = $services;
    }

    public function set(string $id, string|callable $service = null): Container
    {
        if ($this->has($id)) throw new Exception("Error Processing Request", 1);

        $service = $service ?? $id;

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
                return $this->handwiring($this->services[$id]);
            }
        }
        throw new Exception("NotFoundException Interface", 1);
    }

    public function has(string $id): bool
    {
        return key_exists($id, $this->services);
    }

    public function autowiring(string $service):object
    {
        $ref = new ReflectionClass($service);
        $dependencies = [];

        if ($ref->isInstantiable()) {
            //Valida constructor
            if ($ref->getConstructor() === null) {
                return $ref->newInstance();
            } else {
                $parameters = $ref->getConstructor()->getParameters();

                foreach ($parameters as $parameter) {
                    //valida parametros
                    $dependency = $parameter->getClass();

                    if ($dependency !== null) {

                        $this->set($dependency->name);
                        $dependencies[] = $this->get($dependency->name);
                    } else {
                        if ($parameter->isDefaultValueAvailable()) {
                            //obtener el valor predeterminado del parámetro
                            $dependencies[] = $parameter->getDefaultValue();
                        }
                    }
                }

                return $ref->newInstanceArgs($dependencies);;
            }
        }
        throw new Exception("ContainerException Interface. ", 1);
    }

    public function handWiring(Type $var = null)
    {
        # code...
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
