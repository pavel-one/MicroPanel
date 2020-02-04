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
                    'link' => route('Dashboard index'),
                ],
                [
                    'name' => 'Профиль',
                    'sudo' => false,
                    'link' => route('dashboard.profile')
                ],
                [
                    'name' => 'Пользователи',
                    'sudo' => true,
                    'link' => route('dashboard.users')
                ],
                [
                    'name' => 'Очереди',
                    'sudo' => true,
                    'link' => route('dashboard.jobs')
                ],
            ];
        }

        return $menu;
    }
}
