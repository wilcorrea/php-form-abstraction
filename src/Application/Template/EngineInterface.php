<?php

namespace App\Application\Template;

/**
 * Interface EngineInterface
 *
 * @package App\Application\Template
 */
interface EngineInterface
{
    /**
     * @param string $view
     * @param array $values
     *
     * @return string
     */
    public function render(string $view, array $values = []): string;
}
