<?php

namespace Strathmore\AdminTranslations\Test\Feature\TestsFromSpatie;

use Strathmore\AdminTranslations\TranslationLoaders\TranslationLoader;

class DummyLoader implements TranslationLoader
{
    public function loadTranslations(string $locale, string $group, string $namespace = null): array
    {
        return ['dummy' => 'this is dummy'];
    }
}
