<?php

return [
    'home' => [
        ['title' => 'Главная'],
    ],
    'about' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'О нас'],
    ],
    'contacts' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'Контакты'],
    ],
    'profiles.map' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'Карта профилей'],
    ],
    'services.index' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'Услуги'],
    ],
    'services.profiles' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'Услуги', 'url' => '{route.services.index}'],
        ['title' => 'Профили по услуге: {slug}'],
    ],
    'default' => [
        ['title' => 'Главная', 'url' => '{route.home}'],
        ['title' => 'Страница'],
    ],
];
