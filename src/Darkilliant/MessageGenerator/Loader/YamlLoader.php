<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 12:16
 */

namespace Darkilliant\MessageGenerator\Loader;


/**
 * YamlLoader
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Loader;
 */
class YamlLoader
{
    public function load($name)
    {
        return array();
    }

    public function isSupport($type)
    {
        return 'yaml' === $type;
    }
}
