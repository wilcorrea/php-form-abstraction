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
     * @trait
     */
    use Components;

    /**
     * @var string
     */
    protected string $path;

    /**
     * @var string
     */
    protected string $ui;

    /**
     * Engine constructor.
     *
     * @param string $path
     * @param string $ui
     */
    public function __construct(string $path, string $ui)
    {
        $this->path = $path;
        $this->ui = $ui;
    }

    /**
     * @inheritDoc
     */
    final public function includes(string $view, array $values = []): void
    {
        echo $this->render($view, $values);
    }

    /**
     * @inheritDoc
     */
    final public function render(string $template, array $values = []): string
    {
        return $this->compile("{$this->path}/{$this->ui}/{$template}", $values);
    }

    /**
     * @inheritDoc
     */
    final public function view(string $template, array $values = []): void
    {
        echo $this->compile("{$this->path}/{$template}", $values);
    }

    /**
     * @param string $file
     * @param array $values
     *
     * @return false|string
     */
    private function compile(string $file, array $values)
    {
        ob_start();
        extract($values, EXTR_OVERWRITE);
        /** @noinspection PhpIncludeInspection */
        include $file;
        return ob_get_clean();
    }
}

