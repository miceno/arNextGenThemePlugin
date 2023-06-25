<?php

class ahNextGenWidgetFormSchemaFormatter extends arB5WidgetFormSchemaFormatter
{

    private string $defaultLabelClasses = 'form-label';

    /**
     * @param $name
     * @param $attributes
     * @return string
     */
    public function generateLabel($name, $attributes = array())
    {

        $attributes['class'] = $attributes['class'] ?? $this->defaultLabelClasses;

        return parent::generateLabel($name, $attributes);
    }

}