<?php


namespace App\Application;

/**
 * Class Schema
 *
 * @package App\Application
 */
abstract class Schema
{
    /**
     * @var array
     */
    protected array $fields = [];

    /**
     * @var string
     */
    private string $__current;

    /**
     * Schema constructor.
     */
    public function __construct()
    {
        $this->construct();
    }

    /**
     * @return void
     */
    abstract protected function construct(): void;

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param string $id
     * @param array $properties
     *
     * @return $this
     */
    protected function addField(string $id, array $properties = []): self
    {
        $this->__current = $id;
        $default = [
            'id' => $id,
            'type' => 'text',
            'class' => '',
            'placeholder' => '',
            'value' => '',
            'label' => '',
        ];
        $this->fields[$id] = [...$default, ...$properties];
        return $this;
    }

    /**
     * @param string $label
     * @param string $detail
     *
     * @return $this
     */
    protected function setFieldLabel(string $label, string $detail = ''): self
    {
        $this->fields[$this->__current]['label'] = $label;
        $this->fields[$this->__current]['detail'] = $detail;
        return $this;
    }

    /**
     * @param string $placeholder
     *
     * @return $this
     */
    protected function setFieldPlaceholder(string $placeholder): self
    {
        $this->fields[$this->__current]['placeholder'] = $placeholder;
        return $this;
    }

    /**
     * @param string $feedback
     *
     * @return $this
     */
    protected function setFieldInvalidFeedback(string $feedback): self
    {
        $this->fields[$this->__current]['invalidFeedback'] = $feedback;
        return $this;
    }

    /**
     * @param string $info
     *
     * @return $this
     */
    protected function setFieldInfo(string $info): self
    {
        $this->fields[$this->__current]['info'] = $info;
        return $this;
    }

    /**
     * @return $this
     */
    protected function isRequired(): self
    {
        $this->fields[$this->__current]['required'] = true;
        return $this;
    }

    /**
     * @return array
     */
    public static function provide(): array
    {
        $schema = new static();
        return [
            'fields' => $schema->getFields(),
        ];
    }
}