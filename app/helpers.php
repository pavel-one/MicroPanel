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
                    'name' => 'Пользователи',
                    'sudo' => true,
                    'link' => route('dashboard.users')
                ]
            ];
        }

        return $menu;
    }
}
