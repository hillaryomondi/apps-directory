<?php

namespace Strathmore\AdminTranslations\TranslationLoaders;

use Strathmore\AdminTranslations\Exceptions\InvalidConfiguration;
use Strathmore\AdminTranslations\Translation;

class Db implements TranslationLoader
{
    /**
     * Returns all translations for the given locale and group.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     * @throws InvalidConfiguration
     * @return array
     */
    public function loadTranslations(string $locale, string $group, string $namespace): array
    {
        $model = $this->getConfiguredModelClass();

        return $model::getTranslationsForGroupAndNamespace($locale, $group, $namespace);
    }

    /**
     * @throws InvalidConfiguration
     * @return string
     */
    protected function getConfiguredModelClass(): string
    {
        $modelClass = config('admin-translations.model');

        if (! is_a(new $modelClass, Translation::class)) {
            throw InvalidConfiguration::invalidModel($modelClass);
        }

        return $modelClass;
    }
}
