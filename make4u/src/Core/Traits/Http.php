<?php

namespace Make4U\Core\Traits;

defined('MAKE4U') || die;

/**
 * Message HTTP
 */
trait Http
{
    protected string $version = '1.1';

    protected array $headers = [];

    /**
     * Mostrar Version del Protocolo Http
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Establecer Version del Protocolo Http
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Obtener todas las Cabeceras
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Mostrar cabecera
     */
    public function getHeader(string $name): string|array
    {
        if ($this->hasHeader($name)) {
            return $this->headers[$this->sanitizeHeader($name)];
        }
        return [];
    }

    /**
     * Verificar si existe una cabecera
     */
    public function hasHeader(string $name): bool
    {
        return key_exists($this->sanitizeHeader($name), $this->headers);
    }

    /**
     * Establecer cabecera
     * 
     * En caso que exista se sobrescribe si no devorver un Exception
     */
    public function setHeader(string $name, string|array $value): self
    {
        if ($this->hasHeader($name)) {
            $this->headers[$this->sanitizeHeader($name)] = $value;
        }

        throw new \Exception("InvalidArgumentException", 1);

        return $this;
    }

    /**
     * Agregar cabecera
     * 
     * Si existe se agrega el valor al final
     */
    public function addHeader(string $name, string|array $value): self
    {
        if ($this->hasHeader($name)) {
            array_push($this->headers[$this->sanitizeHeader($name)],$value);
        } else {
            $this->headers[$this->sanitizeHeader($name)] = $value;
        }
        return $this;
    }

    /**
     * Eliminar Cabecera
     */
    public function removeHeader(string $name): self
    {
        if ($this->hasHeader($name)) {
            unset($this->headers[$this->sanitizeHeader($name)]);
        }

        throw new \Exception("InvalidArgumentException", 1);
        return $this;
    }

    /**
     * Estandarizar nombre de cabecera
     */
    public function sanitizeHeader(string $name): string
    {
        return str_replace(' ', '-', ucwords(str_replace(['-', '_'], ' ', $name)));
    }
}
