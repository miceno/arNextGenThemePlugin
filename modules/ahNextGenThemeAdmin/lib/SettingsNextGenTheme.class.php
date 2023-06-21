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

/**
 * Global form definition for settings module - with validation.
 *
 * @author     David Juhasz <david@artefactual.com>
 */
class SettingsNextGenTheme
{
    /*
     *
    'archival_holding_text_1' => [
    'label' => __('Archival holding text 1'), 'i18n' => true
    ],
    'archival_holding_image_url_1' => [
    'label' => __('Archival holding image url 1'), 'i18n' => true
    ],
    'archival_holding_url_1' => [
    'label' => __('Archival holding url 1'), 'i18n' => true
    ],
    'archival_holding_text_2' => [
    'label' => __('Archival holding text 2'), 'i18n' => true
    ],
    'archival_holding_image_url_2' => [
    'label' => __('Archival holding image url 2'), 'i18n' => true
    ],
    'archival_holding_url_2' => [
    'label' => __('Archival holding url 2'), 'i18n' => true
    ],
    'archival_holding_text_3' => [
    'label' => __('Archival holding text 3'), 'i18n' => true
    ],
    'archival_holding_image_url_3' => [
    'label' => __('Archival holding image url 3'), 'i18n' => true
    ],
    'archival_holding_url_3' => [
    'label' => __('Archival holding url 3'), 'i18n' => true
    ],
    'archival_holding_text_4' => [
    'label' => __('Archival holding text 4'), 'i18n' => true
    ],
    'archival_holding_url_4' => [
    'label' => __('Archival holding url 4'), 'i18n' => true
    ],

    'carousel_text_1' => [
    'label' => __('Carousel text 1'), 'i18n' => true
    ],
    'carousel_image_url_1' => [
    'label' => __('Carousel image url 1'), 'i18n' => true
    ],
    'carousel_url_1' => [
    'label' => __('Carousel url 1'), 'i18n' => true
    ],
    'carousel_text_2' => [
    'label' => __('Carousel text 2'), 'i18n' => true
    ],
    'carousel_image_url_2' => [
    'label' => __('Carousel image url 2'), 'i18n' => true
    ],
    'carousel_url_2' => [
    'label' => __('Carousel url 2'), 'i18n' => true
    ],
    'carousel_text_3' => [
    'label' => __('Carousel text 3'), 'i18n' => true
    ],
    'carousel_image_url_3' => [
    'label' => __('Carousel image url 3'), 'i18n' => true
    ],
    'carousel_url_3' => [
    'label' => __('Carousel url 3'), 'i18n' => true
    ],

    'social_icon_1' => [
    'label' => __('Social icon 1'),
    'default' => 'facebook'
    ],
    'social_url_1' => [
    'label' => __('Social URL 1'),
    ],
    'social_icon_2' => [
    'label' => __('Social icon 2'),
    'default' => 'instagram'
    ],
    'social_url_2' => ['label' => __('Social URL 2'),],
    'social_icon_3' => [
    'label' => __('Social icon 3'),
    'default' => 'youtube'
    ],
    'social_url_3' => ['label' => __('Social URL 3'),],
    'social_icon_4' => [
    'label' => __('Social icon 4'),
    'default' => 'telegram'
    ],
    'social_url_4' => ['label' => __('Social URL 4'),],

    'contact_text' => [
    'label' => __('Contact data'), 'i18n' => true
    ],

    'map_url' => ['label' => __('Map URL')],

    'term_and_conditions_url' => [
    'label' => __('Terms and conditions URL'), 'i18n' => true
    ],
    'privacy_policy_url' => [
    'label' => __('Privacy policy URL'), 'i18n' => true
    ],
    'multilingual_disclaimer_url' => [
    'label' => __('Multilingual disclaimer URL'), 'i18n' => true
    ],
     */
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

    /**
     * Stores the QubitSetting data for this configuration.
     *
     * @var array
     */
    protected array $_settings;

    protected string $_defaultWidgetClass;

    public function __construct()
    {
        $this->_initSettings();
        $this->_createSettings();
        $this->setSettingScope('ahNextGenTheme');
    }

    /**
     * Initialize settings object for this class.
     *
     * @return void
     */
    public function _initSettings()
    {
        $this->_settingsConfig = [
            /* Organization name */
            [
                'id' => 'organization_name',
                'label' => __('Organization name'),
                "value" => __("Organization"),
                "widget" => "string",
                "help" => __("This is an organization field"),
                'i18n' => true
            ],
        ];
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
        foreach ($this->getSettingsConfig() as $settingName => $settingConfig) {
            // Escape queries, add setting if it's not already created (to avoid adding it in a migration)
            if (null === $setting = QubitSetting::getByNameAndScope($settingName, $this->getSettingScope())) {
                $setting = QubitSetting::createNewSetting($settingName, $settingConfig['default'] ?? null, ['scope' => $this->getSettingScope()]);
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

        foreach ($this->getSettingsConfig() as $settingName => $settingConfig){
            $form->setWidget($settingName, $this->getWidgetInstance($settingConfig));
        }
        return $form;
    }

    public function getWidgetClass($settingConfig): string {
        return $settingConfig['widget'] ?? $this->_defaultWidgetClass();
    }

    private function _defaultWidgetClass()
    {
        return $this->_defaultWidgetClass;
    }

    public function getWidgetInstance($settingConfig): sfWidgetForm
    {
        $widget = $this->getWidgetClass($settingConfig)($this->getWidgetConfig($settingConfig));
        return $widget;
    }

    public function getWidgetConfig($settingConfig): array
    {
        return $settingConfig;
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


}
