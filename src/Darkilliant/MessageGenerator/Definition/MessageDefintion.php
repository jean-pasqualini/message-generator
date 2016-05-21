<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 19/05/16
 * Time: 12:13
 */

namespace Darkilliant\MessageGenerator\Defintion;


/**
 * MessageDefintion
 *
 * @author Jean Pasqualini <jpasqualini75@gmail.com>
 * @package Darkilliant\MessageGenerator\Defintion;
 */
class MessageDefintion
{
    protected $template;

    protected $configuration;

    /**
     * MessageDefintion constructor.
     * @param $template
     * @param $configuration
     */
    public function __construct($template, $configuration)
    {
        $this->template = $template;
        $this->configuration = $configuration;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}
