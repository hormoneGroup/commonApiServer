<?php

namespace App\Sdks\Library\Constants;

/**
 * 路由配置
 *
 * @author dusong<1264735045@qq.com>
 */
class RouteConfig
{
    public static $SETTINGS = [
        'App\Backend\Controllers\id::nextIds' => [
            'filter'   => [
                'App\Sdks\Core\Logic\Router\Filter\Id\NextIds'
            ],
            'validate' => [
                'App\Sdks\Core\Logic\Router\Validate\Id\NextIds'
            ],
        ],
    ];
}