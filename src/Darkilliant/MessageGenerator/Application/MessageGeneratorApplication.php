<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 11:41
 */

namespace Darkilliant\MessageGenerator\Application;

use Darkilliant\MessageGenerator\Command\ListMessageCollectionCommand;
use Darkilliant\MessageGenerator\Command\GenerateMessageCommand;
use Symfony\Component\Console\Application;

/**
 * MessageGeneratorApplication
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Application;
 */
class MessageGeneratorApplication extends Application
{
    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();

        $defaultCommands[] = new ListMessageCollectionCommand();
        
        $defaultCommands[] = new GenerateMessageCommand();

        return $defaultCommands;
    }
}
