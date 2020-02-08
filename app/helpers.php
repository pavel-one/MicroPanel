<?php

if (!function_exists('getMenu')) {
    /**
     * GettingMenu
     * @param array $menu
     * @return false|array
     */
    function getMenu($menu = [])
    {
        if (!count($menu)) {
            $menu = [
                [
                    'name' => 'Общее',
                    'sudo' => false,
                    'icon' => 'ni-tv-2',
                    'classes' => 'text-primary',
                    'link' => route('Dashboard index'),
                ],
                [
                    'name' => 'Профиль',
                    'sudo' => false,
                    'icon' => 'ni-circle-08',
                    'classes' => 'text-orange',
                    'link' => route('dashboard.profile')
                ],
                [
                    'name' => 'Пользователи',
                    'sudo' => true,
                    'icon' => 'ni-single-02',
                    'classes' => 'text-yellow',
                    'link' => route('dashboard.users')
                ],
                [
                    'name' => 'Очереди',
                    'sudo' => true,
                    'icon' => 'ni-user-run',
                    'classes' => 'text-red',
                    'link' => route('dashboard.jobs')
                ],
                [
                    'name' => 'Тех.Поддержка',
                    'sudo' => true,
                    'icon' => 'ni-badge',
                    'classes' => 'text-default',
                    'link' => route('dashboard.jobs')
                ],
                [
                    'name' => 'Оплаты',
                    'sudo' => true,
                    'icon' => 'ni-money-coins',
                    'classes' => 'text-gray',
                    'link' => route('dashboard.jobs')
                ],
            ];
        }

        return $menu;
    }
}
