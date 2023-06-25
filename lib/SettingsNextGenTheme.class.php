<?php

/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */
require_once('plugins/arNextGenThemePlugin/lib/form/ahNextGenWidgetFormSchemaFormatter.class.php');

/**
 * Global form definition for settings module - with validation.
 *
 * @author     David Juhasz <david@artefactual.com>
 */
class SettingsNextGenTheme
{
    /**
     * @var array
     * Store all the settings for this object
     * Keys:
     *   label: label to show on the form
     *   help: help text.
     *   i18n: the setting is suitable to be changed per culture.
     *   validator: validator object for the form.
     *   widget: widget object for the form.
     *
     */
    protected array $_settingsConfig;

    protected string $_settingScope;

    protected string $_formatterClass;

    public array $defaultInputAttributes = ['class' => 'form-control'];

    /**
     * Stores the QubitSetting data for this configuration.
     *
     * @var array
     */
    protected array $_settings;

    protected string $_defaultWidgetClass = "sfWidgetFormInput";

    public function __construct()
    {
        $this->setSettingsConfig([]);
        $this->setSettingScope('ahNextGenTheme');
        $this->setFormatterClass('ahNextGenWidgetFormSchemaFormatter');
        $this->_initSettings();
        $this->_createSettings();
    }

    /**
     * Initialize settings object for this class.
     *
     * @return void
     */
    public function _initSettings()
    {
        $i18n = sfContext::getInstance()->getI18N();

        // Read settings field description from a file.
        if ( empty($this->getSettingsConfig())) {
            // TODO: get prefix
            $prefix = 'plugins/arNextGenThemePlugin/lib/';
            $this->setSettingsConfig( sfYaml::load($prefix . 'settings_config.yml')[$this->getSettingScope()]);
        }
    }

    /**
     * @param array $settings
     * @return SettingsNextGenTheme
     */
    public function setSettingsConfig(array $settings): SettingsNextGenTheme
    {
        $this->_settingsConfig = $settings;
        return $this;
    }

    /**
     * @return array
     */
    public function getSettingsConfig(): array
    {
        return $this->_settingsConfig;
    }


    /**
     * Create settings in database in case they don't exists.
     *
     * @param $settings
     * @return SettingsNextGenTheme
     */
    private function _createSettings(): SettingsNextGenTheme
    {
        $this->_settings = [];
        foreach ($this->getSettingsConfig() as $settingConfig) {
            $settingName = $settingConfig['id'];
            // Escape queries, add setting if it's not already created (to avoid adding it in a migration)
            if (null === $setting = QubitSetting::getByNameAndScope($settingName, $this->getSettingScope())) {
                $setting = QubitSetting::createNewSetting($settingName, $settingConfig['default'] ?? null, ['scope' => $this->getSettingScope()]);
                $setting->save();
            }
            $this->_settings[$settingName] = $setting;
        }
        return $this;
    }

    /**
     * @param string $settingScope
     * @return SettingsNextGenTheme
     */
    public function setSettingScope(string $settingScope): SettingsNextGenTheme
    {
        $this->_settingScope = $settingScope;
        return $this;
    }

    /**
     * @return string
     */
    public function getSettingScope(): string
    {
        return $this->_settingScope;
    }

    public function createForm(): sfForm
    {
        $form = new sfForm();

        $this->updateForm($form);
        return $form;
    }

    /** Return default classes for a set of attributes
     * @param $attributes
     * @return void
     */
    public function getDefaultAttributes($attributes) {
        $attributes['class'] ??= $this->defaultInputAttributes['class'];

        if(!str_contains($attributes['class'], $this->defaultInputAttributes['class'])){
            $attributes['class'] .= " " . $this->defaultInputAttributes['class'];
        }
        return $attributes;
    }

    public function updateForm(sfForm $form): sfForm
    {
        foreach ($this->getSettingsConfig() as $settingConfig) {
            $settingName = $settingConfig['id'];

            $widget = $this->getWidgetInstance($settingConfig);
            $form->setWidget($settingName, $widget);
            $form->setValidator($settingName, $this->getValidator($settingConfig));
        }
        $this->decorateForm($form);
        return $form;
    }

    public function getWidgetClass($settingConfig): string
    {
        return $settingConfig['widget'] ?? $this->_defaultWidgetClass();
    }

    private function _defaultWidgetClass()
    {
        return $this->_defaultWidgetClass;
    }

    public function getWidgetInstance($settingConfig): sfWidgetForm
    {
        $className = $this->getWidgetClass($settingConfig);

        $attributes = $this->getWidgetAttributes($this->getDefaultAttributes($settingConfig));
        $widget = new $className($this->getWidgetOptions($settingConfig), $attributes);
        return $widget;
    }

    /**
     * Get attributes for a widget
     *
     * @param $settingConfig
     * @return array
     */
    public function getWidgetAttributes($settingConfig): array
    {
        return array_intersect_key($settingConfig, array_flip(['id', 'class']));
    }

    /**
     * Get options for a widget
     * @param $settingConfig
     * @return array
     */
    public function getWidgetOptions($settingConfig): array
    {
        return array_intersect_key($settingConfig, array_flip(['label', 'default', 'help']));
    }

    /**
     * @param array $settings
     * @return SettingsNextGenTheme
     */
    public function setSettings(array $settings): SettingsNextGenTheme
    {
        $this->_settings = $settings;
        return $this;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->_settings;
    }

    protected function getValidator($settingConfig)
    {
        $options['required'] = $settingConfig['required'] ?? false;
        $validatorClass = "sfValidatorString";

        $validator = new $validatorClass ($options);

        return $validator;
    }
    private function decorateForm(sfForm $form): sfForm
    {
        $formatterClass = $this->getFormatterClass();
        $formatter = new $formatterClass($form->getWidgetSchema());

        $formatter->form = $form;

        $form->getWidgetSchema()->addFormFormatter($form->getName(), $formatter);
        $form->getWidgetSchema()->setFormFormatterName($form->getName());

        return $form;
    }

    /**
     * @param string $formatterClass
     * @return SettingsNextGenTheme
     */
    public function setFormatterClass(string $formatterClass): SettingsNextGenTheme
    {
        $this->_formatterClass = $formatterClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormatterClass(): string
    {
        return $this->_formatterClass;
    }


}
