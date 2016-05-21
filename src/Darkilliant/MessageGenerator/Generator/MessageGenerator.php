<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 16:05
 */

namespace Darkilliant\MessageGenerator\Generator;


/**
 * MessageGenerator
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Generator;
 */
class MessageGenerator
{
    public function generate($content, $variable)
    {
        $variable = array_combine(
            array_map(
                function($item) { return '%' . $item . '%'; },
                array_keys($variable)
            ), array_values($variable)
        );

        return str_replace(array_keys($variable), array_values($variable), $content);
    }
}
