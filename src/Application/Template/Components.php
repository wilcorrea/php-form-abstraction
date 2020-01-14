<?php

namespace App\Application\Template;

/**
 * Trait Components
 *
 * @package App\Application\Template
 */
trait Components
{
    /**
     * @param array $properties
     */
    public function input(array $properties = []): void
    {
        $this->includes('components/input.phtml', $properties);
    }

    /**
     * @param array $properties
     */
    public function checkbox(array $properties = []): void
    {
        $this->includes('components/checkbox.phtml', $properties);
    }

    /**
     * @param array $properties
     */
    public function radio(array $properties = []): void
    {
        $this->includes('components/radio.phtml', $properties);
    }

    /**
     * @param array $properties
     */
    public function select(array $properties = []): void
    {
        $this->includes('components/select.phtml', $properties);
    }
}