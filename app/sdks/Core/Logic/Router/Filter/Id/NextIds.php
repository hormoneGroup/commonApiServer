<?php

namespace App\Sdks\Core\Logic\Router\Filter\Id;

use App\Sdks\Core\Logic\Router\Filter\BaseFilter;

/**
 * 生成多个ID过滤器
 *
 * @author dusong<1264735045@qq.com>
 */
class NextIds extends BaseFilter
{
    public function rules()
    {
        return [
            ['num', 'int'],
        ];
    }
}
