<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 20/05/16
 * Time: 15:00
 */

namespace Darkilliant\MessageGenerator\Tests;


/**
 * AbstractTest
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Tests;
 */
class TestAbstract extends \PHPUnit_Framework_TestCase
{
    public function slugify($value)
    {
        return (new \Cocur\Slugify\Slugify())->slugify($value);
    }
}