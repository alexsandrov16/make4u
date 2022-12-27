<?php
namespace Make4U\Test;
/**
 * undocumented class
 */
class Test
{
    public function __construct(ContainerTest $class_property) {
        echo "Holas soy ".__CLASS__." y acaban de inyectarme a $class_property";
    }
}
