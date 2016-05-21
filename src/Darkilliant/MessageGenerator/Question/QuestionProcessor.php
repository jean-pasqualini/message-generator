<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 17:34
 */

namespace Darkilliant\MessageGenerator\Question;

use Symfony\Component\Console\Style\SymfonyStyle;


/**
 * QuestionProcessor
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @copyright MIT
 * @package Darkilliant\MessageGenerator\Question;
 */
class QuestionProcessor
{
    public function processQuestions(SymfonyStyle $symfonyStyle, $definition)
    {
        $responses = array();

        $categoryCollection = array();

        foreach($definition['_selector'] as $questionName => $questionChoices)
        {
            $choix = $symfonyStyle->choice($questionName, array_combine(array_keys($questionChoices), array_keys($questionChoices)));;

            $categoryCollection[] = $questionChoices[$choix];
        }

        $categoryCollection = array_filter($categoryCollection, function($item) { return !empty($item); });

        foreach($categoryCollection as $category)
        {
            foreach($definition[$category]['questions'] as $key => $question)
            {
                if(empty($question['choices']))
                {
                    $reponse = $symfonyStyle->ask($question['title']);
                }
                else
                {
                    $reponse = $symfonyStyle->choice($question['title'], array_combine($question['choices'], $question['choices']));
                }

                $responses[$key] = $reponse;
            }
        }

        return $responses;
    }
}
