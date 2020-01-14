<?php

namespace App\Application\Template;

/**
 * Class Engine
 *
 * @package App\Application\Template
 */
class Engine implements EngineInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * Engine constructor.
     *
     * @param string $dir
     */
    public function __construct(string $dir)
    {
        $this->path = $dir;
    }

    /**
     * @inheritDoc
     */
    public function render(string $view, array $values = []): string
    {
        ob_start();
        extract($values, EXTR_OVERWRITE);
        /** @noinspection PhpIncludeInspection */
        include "{$this->path}/{$view}";
        return ob_get_clean();
    }
}

