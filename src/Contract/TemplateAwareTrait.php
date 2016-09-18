<?php

namespace App\Contract;

use Twig_Environment;

trait TemplateAwareTrait
{
    protected $template;

    public function setTemplateDriver(Twig_Environment $twig)
    {
        $this->template = $twig;
    }

    public function getTemplateDriver()
    {
        return $this->template;
    }
}
