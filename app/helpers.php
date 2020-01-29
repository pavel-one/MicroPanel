<?php

if (!function_exists('getMenu')) {
    /**
     * GettingMenu
     * @param array $menu
     * @return false|string
     */
    function getMenu($menu = [])
    {
        if (!count($menu)) {
            $menu = [
                [
                    'name' => 'Общее',
                    'link' => route('Dashboard index'),
                ],
                [
                    'name' => 'Пользователи',
                    'sudo' => true,
                    'link' => route('dashboard.users')
                ]
            ];
        }

        return json_encode($menu);
    }
}
