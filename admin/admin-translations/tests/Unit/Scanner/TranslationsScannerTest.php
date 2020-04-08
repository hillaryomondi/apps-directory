<?php

namespace Strathmore\AdminTranslations\Test\Unit\Scanner;

use Strathmore\AdminTranslations\Test\TestCase;
use Strathmore\AdminTranslations\TranslationsScanner;

class TranslationsScannerTest extends TestCase
{
    private $viewsDir = __DIR__ . '/../../fixtures/views';

    /** @test */
    public function testing()
    {
        $scanner = app(TranslationsScanner::class);
        $scanner->addScannedPath($this->viewsDir);

        $this->assertEquals([
            collect([
                "good.key1",
                "good.key2",
                "good.key6 with a space",
                "admin::auth.key7",
                "brackets/admin-ui::auth.key8",
            ]),
            collect([
                "Good key 3",
                "Good 'key' 4",
                " ",
                "  ",
                "Good \"key\" 5",
                "Good. Key.",
                "File",
                " Good",
                "<strong>Good</strong>",
                "Good (better)",
            ])
        ], $scanner->getAllViewFilesWithTranslations());
    }
}
