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
                    'name' => 'Страница ошибки',
                    'link' => route('dashboard.sorry')
                ]
            ];
        }

        return json_encode($menu);
    }
}
