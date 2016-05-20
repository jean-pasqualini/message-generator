<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 12:12
 */

namespace Darkilliant\MessageGenerator\Manager;

use Darkilliant\MessageGenerator\Generator\MessageGenerator;
use Darkilliant\MessageGenerator\Loader\MessageLoader;
use Darkilliant\MessageGenerator\Question\QuestionProcessor;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * MessageManager
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Manager;
 */
class MessageManager
{
    protected $generator;

    protected $loader;

    /**
     * MessageManager constructor.
     * @param $generator
     * @param $loader
     */
    public function __construct(MessageGenerator $generator, QuestionProcessor $questionProcessor, MessageLoader $loader)
    {
        $this->generator = $generator;
        $this->questionProcessor = $questionProcessor;
        $this->loader = $loader;
    }


    public function generate($path)
    {
        list($type, $name) = explode("#", $path);
        
        $messages = array();
        
        if($this->loader->isSupport($type)) {
        
            $definition = $this->loader->load($name);
    
            $variables = $this->questionProcessor->processQuestions(new SymfonyStyle(new ArgvInput(), new ConsoleOutput()), $definition);

            foreach($definition as $key => $messageDefinition)
            {
                if($key != '_selector' && in_array($key, array_keys($variables))) {
                    $messages[] = $this->generator->generate(
                        $messageDefinition['template'],
                        $variables
                    );
                }
            }
        }
        
        return implode(' :: ', $messages);
    }
}
