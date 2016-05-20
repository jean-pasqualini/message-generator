<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 16:48
 */

namespace Darkilliant\MessageGenerator\Loader;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\SplFileInfo;

/**
 * MessageLoader
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Loader;
 */
class MessageLoader
{
    protected $path;

    protected $finder;

    public function __construct($path)
    {
        $this->path = $path;

        $this->finder = new Finder();
    }

    protected function getPathByName($name)
    {
        return $this->path . '/' . $name;
    }

    public function load($name)
    {
        $path = $this->getPathByName($name);

        $fileCollection = $this->finder->in($path)->files();

        $definition = array();

        foreach($fileCollection as $item)
        {
            /** @var SplFileInfo $item */
            $definition[pathinfo($item->getFilename(), PATHINFO_FILENAME)] = Yaml::parse(file_get_contents($item->getPathname()));
        }

        return $definition;
    }

    public function isSupport($type)
    {
        return 'message' === $type;
    }
}
