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

class SettingsNextGenAction extends SettingsEditAction
{
    // Arrays not allowed in class constants
    public static $FIELDS = [];
    private string $settingScope = "ahNextGenTheme";

    private SettingsNextGenTheme $settingsNextGenTheme;

    // Arrays not allowed in class constants
    public static $NAMES = [
    ];

    public static $I18N = [
    ];

    public function __construct($context, $moduleName, $actionName)
    {
        parent::__construct($context, $moduleName, $actionName);
        // TODO: Use dependency injection to inject SettingsNextGenTheme
        $this->settingsNextGenTheme = new SettingsNextGenTheme();
    }

    public function setI18N(): SettingsNextGenAction
    {
        self::$I18N= [];
        foreach($this->settingsNextGenTheme->getSettingsConfig() as $settingName => $settingConfig){
            if (array_key_exists('i18n', $settingConfig)){
                array_push(self::$I18N, $settingName);
            }
        }
        return $this;
    }

    public function setNames(): SettingsNextGenAction
    {
        self::$NAMES= [];
        foreach($this->settingsNextGenTheme->getSettingsConfig() as $settingName => $settingConfig){
            array_push(self::$NAMES, $settingName);
        }
        return $this;
    }
    public function _earlyExecute(){
        $this->settings = [];
        $this->culture = $this->context->user->getCulture();
        $this->i18n = sfContext::getInstance()->i18n;

        $this->setI18N();
        $this->setNames();
        $this->loadSettings();
    }

    public function loadSettings()
    {
        // Load setting for each field name
        $this->settings = $this->settingsNextGenThemeNextGenTheme->getSettings();
    }

    public function earlyExecute()
    {
        $this->_earlyExecute();

        $this->_formInit();
        $this->updateMessage = $this->i18n->__('Next Generation theme settings saved.');
    }

    private function _formInit($fieldConfigs)
    {
        return $this->settingsNextGenTheme->createForm();
    }
}
