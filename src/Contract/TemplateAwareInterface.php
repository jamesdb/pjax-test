<?php

namespace App\Contract;

use Twig_Environment;

interface TemplateAwareInterface
{
    public function setTemplateDriver(Twig_Environment $twig);

    public function getTemplateDriver();
}
