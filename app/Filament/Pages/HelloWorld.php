<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class HelloWorld extends Page
{
    protected static ?string $navigationLabel = 'Hello World';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.hello-world';
}
