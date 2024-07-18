<?php

return [
    App\Providers\AppServiceProvider::class,
    Barryvdh\DomPDF\ServiceProvider::class,
    'PDF' => Barryvdh\DomPDF\Facade::class,
];
