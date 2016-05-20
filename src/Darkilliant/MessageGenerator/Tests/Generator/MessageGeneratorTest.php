<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 20/05/16
 * Time: 16:43
 */

namespace Darkilliant\MessageGenerator\Tests\Generator;

use Darkilliant\MessageGenerator\Generator\MessageGenerator;


/**
 * MessageGeneratorTest
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Tests\Generator;
 */
class MessageGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $messageGenerator = new MessageGenerator();

        $this->assertEquals('une vielle baraque sur la colline', $messageGenerator->generate('une %adjectif% baraque sur la colline', array(
            'adjectif' => 'vielle'
        )));
    }
}