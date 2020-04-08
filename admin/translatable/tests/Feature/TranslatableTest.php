<?php

namespace Strathmore\Translatable\Test\Feature;

use Strathmore\Translatable\Test\TestCase;
use Strathmore\Translatable\Translatable;

class TranslatableTest extends TestCase
{
    /** @test */
    public function package_can_define_used_locales()
    {
        $translatable = app(Translatable::class);
        $this->assertEquals(collect(['en', 'de', 'fr']), $translatable->getLocales());
    }
}
