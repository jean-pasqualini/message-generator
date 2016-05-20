<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 16:25
 */

namespace Darkilliant\MessageGenerator\Tests\Loader;

use Darkilliant\MessageGenerator\Loader\MessageLoader;


/**
 * YamlLoader
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Loader;
 */
class MessageLoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * On test le chargement de message
     */
    public function testLoad()
    {
        $yamlLoader = new MessageLoader(__DIR__.'/../Resources/config/messages');

        $this->assertEquals(array(
            '_selector' => array(
                'Voiture (Y/N)' => array(
                    'Y' => 'voiture',
                    'N' => null
                )
            ),
            'voiture' => array(
                'template' => 'une voiture %couleur% roulais sur la colline',
                'questions' => array(
                    'couleur' => array(
                        'title' => 'De quel couleur est votre voiture ?',
                        'choices' => null,
                        'default' => false
                    )
                )
            )
        ), $yamlLoader->load('test'));
    }
}