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
     * @var string
     */
    protected string $components = 'bootstrap';

    /**
     * @param array $properties
     */
    public function input(array $properties = []): void
    {
        $this->includes("{$this->components}/components/input.phtml", $properties);
    }

    /**
     * @param array $properties
     */
    public function checkbox(array $properties = []): void
    {
        $this->includes("{$this->components}/components/checkbox.phtml", $properties);
    }

    /**
     * @param array $properties
     */
    public function radio(array $properties = []): void
    {
        $this->includes("{$this->components}/components/radio.phtml", $properties);
    }

    /**
     * @param array $properties
     */
    public function select(array $properties = []): void
    {
        $this->includes("{$this->components}/components/select.phtml", $properties);
    }
}