<?php

return [
    'home' => [
        ['title' => 'Главная'],
    ],
    'about' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'О нас'],
    ],
    'contacts' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Контакты'],
    ],
    'profiles.map' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Карта профилей'],
    ],
    'services.index' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Услуги'],
    ],
    'services.profiles' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Услуги', 'url' => route('services.index')],
        ['title' => 'Профили по услуге: {slug}'],
    ],
    'profiles.byMetro' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Станции метро'],
        ['title' => 'Профили у метро: {slug}'],
    ],
    'profiles.byCity' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Города'],
        ['title' => 'Профили в городе: {slug}'],
    ],
    'profiles.byDistrict' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Районы'],
        ['title' => 'Профили в районе: {slug}'],
    ],
    'search.advanced' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Расширенный поиск'],
    ],
    'profiles.create' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Мои профили', 'url' => route('profiles.myList')],
        ['title' => 'Добавить профиль'],
    ],
    'profiles.edit' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Мои профили', 'url' => route('profiles.myList')],
        ['title' => 'Редактировать профиль'],
    ],
    'profiles.myList' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Мои профили'],
    ],
    'profiles.show' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Список профилей', 'url' => route('profiles.myList')],
        ['title' => '{profile.name}'],
    ],
    'default' => [
        ['title' => 'Главная', 'url' => route('home')],
        ['title' => 'Страница'],
    ],
];
