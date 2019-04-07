<?php
/**
 * Created by PhpStorm.
 * User: bghanem
 * Date: 01/04/2019
 * Time: 12:26
 */

namespace Bg\GenerateFormBundle;


use Bg\GenerateFormBundle\DependencyInjection\BgGenerateFormExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BgGenerateFormBundle extends Bundle
{

    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new BgGenerateFormExtension();
        }
        return $this->extension;
    }
}