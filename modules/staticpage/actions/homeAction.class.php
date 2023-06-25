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

class StaticPageHomeAction extends StaticPageIndexAction
{
    public function execute($request)
    {
        parent::execute($request);

        $culture = $this->context->user->getCulture();
        if (!in_array($culture, ['en', 'fr'])) {
            $culture = 'en';
        }
        if (null === $this->carouselItems) {
            $this->carouselItems = sfYaml::load('plugins/arNextGenThemePlugin/carousel/config.yml');
        }
        if ($culture !== $this->culture ){
            $this->carouselItemsCulture = $this::itemsForCulture($this->carouselItems, $culture);
        }

        $this->culture = $culture;
    }

    /**
     * Return an object for the culture
     * @param $carouselItems
     * @param string $culture
     * @return array
     */
    static protected function itemsForCulture($carouselItems, string $culture): array
    {
        $resultItems = [];
        foreach ($carouselItems as $item) {
            $resultItem['title'] = $item[$culture]['title'] ?? $item['title'];
            $resultItem['url'] = $item[$culture]['url'] ?? $item['url'];
            $resultItem['image'] = $item[$culture]['image'] ?? $item['image'];
            $resultItem['description'] = $item[$culture]['description'] ?? $item['description'];

            $resultItems[] = $resultItem;
        }
        return $resultItems;
    }
}
