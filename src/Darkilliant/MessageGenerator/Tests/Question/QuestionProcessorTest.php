<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 17:39
 */

namespace Darkilliant\MessageGenerator\Tests\Question;

use Darkilliant\MessageGenerator\Question\QuestionProcessor;
use Darkilliant\MessageGenerator\Tests\AbstractTest;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;


/**
 * QuestionProcessorTest
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Tests\Question;
 */
class QuestionProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testProcessQuestions()
    {
        $questionProcessor = new QuestionProcessor();

        $symfonyStyle = $this->getMock(SymfonyStyle::class, array(), array(new ArgvInput(), new ConsoleOutput()));

        // Je choisie la voiture et l'avion
        $symfonyStyle->expects($this->at(0))
            ->method('choice')
            ->will($this->returnValue('Y'));
        $symfonyStyle->expects($this->at(1))
            ->method('choice')
            ->will($this->returnValue('Y'));

        // Je choisie la couleur vert pour la voiture
        $symfonyStyle->expects($this->at(2))
            ->method('ask')
            ->will($this->returnValue('vert'));

        // Je choisie la ville Berlin pour l'avion
        $symfonyStyle->expects($this->at(3))
            ->method('choice')
            ->will($this->returnValue('Berlin'));

        $this->assertEquals($questionProcessor->processQuestions($symfonyStyle, array(
            '_selector' => array(
                'As tu une voiture ?' => array(
                    'Y' => 'voiture',
                    'N' => null,
                ),
                'As tu as avion ?' => array(
                    'Y' => 'avion',
                    'N' => null
                )
            ),
            'voiture' => array(
                'template' => 'une voiture %couleur% dans une ville',
                'questions' => array(
                    'couleur' => array(
                        'title' => 'quel est la couleur de la voiture',
                        'choices' => array(),
                        'suggest' => array(
                            'rouge',
                            'vert'
                        )
                    )
                )
            ),
            'avion' => array(
                'template' => 'un avion survole la quote pour aller à %ville%',
                'questions' => array(
                    'ville' => array(
                        'title' => 'ou va tu ?',
                        'choices' => array(
                            'New york',
                            'Paris',
                            'Berlin',
                            'Autre'
                        )
                    )
                )
            )
        )), array(
            'couleur' => 'vert',
            'ville' => 'Berlin'
        ));
    }
}