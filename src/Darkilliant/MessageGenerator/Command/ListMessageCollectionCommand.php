<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 11:44
 */

namespace Darkilliant\MessageGenerator\Command;

use Darkilliant\MessageGenerator\Generator\LogoGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


/**
 * ListMessageCollectionCommand
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Command;
 */
class ListMessageCollectionCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('message:list')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // On affiche le logo
        LogoGenerator::generate($output);

        $symfonyStyle = new SymfonyStyle($input, $output);

        $symfonyStyle->block('test');
    }
}
