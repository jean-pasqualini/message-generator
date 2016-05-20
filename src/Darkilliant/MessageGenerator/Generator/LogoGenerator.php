<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 12:06
 */

namespace Darkilliant\MessageGenerator\Generator;

use Symfony\Component\Console\Output\OutputInterface;


/**
 * LogoGenerator
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Generator;
 */
class LogoGenerator
{
    static public function generate(OutputInterface $output)
    {
        $logo =  <<<EOF
        .%%...%%..%%%%%%...%%%%....%%%%....%%%%....%%%%...%%%%%%.
        .%%%.%%%..%%......%%......%%......%%..%%..%%......%%.....
        .%%.%.%%..%%%%.....%%%%....%%%%...%%%%%%..%%.%%%..%%%%...
        .%%...%%..%%..........%%......%%..%%..%%..%%..%%..%%.....
        .%%...%%..%%%%%%...%%%%....%%%%...%%..%%...%%%%...%%%%%%.
        .........................................................
        ..%%%%...%%%%%%..%%..%%..%%%%%%..%%%%%....%%%%...%%%%%%...%%%%...%%%%%..
        .%%......%%......%%%.%%..%%......%%..%%..%%..%%....%%....%%..%%..%%..%%.
        .%%.%%%..%%%%....%%.%%%..%%%%....%%%%%...%%%%%%....%%....%%..%%..%%%%%..
        .%%..%%..%%......%%..%%..%%......%%..%%..%%..%%....%%....%%..%%..%%..%%.
        ..%%%%...%%%%%%..%%..%%..%%%%%%..%%..%%..%%..%%....%%.....%%%%...%%..%%.
        ........................................................................
EOF;

        $output->writeln('<info>' . PHP_EOL . $logo . PHP_EOL . '</info>');
    }
}
