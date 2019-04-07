<?php
/**
 * Created by PhpStorm.
 * User: bghanem
 * Date: 01/04/2019
 * Time: 16:38
 */

namespace Bg\GenerateFormBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{


    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bg_generate_form');
        return $treeBuilder;
    }
}