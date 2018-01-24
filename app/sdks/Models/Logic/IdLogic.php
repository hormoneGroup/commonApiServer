<?php

namespace App\Sdks\Models\Logic;

use App\Sdks\Library\Error\ErrorHandle;
use App\Sdks\Library\Error\handlers\Err;
use App\Sdks\Library\Error\Settings\CoreLogic;
use App\Sdks\Library\Helpers\IdHelper;

/**
 * ID生成器逻辑
 *
 * @author dusong<1264735045@qq.com>
 */
class IdLogic extends BaseLogic
{
    /**
     * 获取单个ID
     *
     * @return array
     */
    public function getNextId(): array
    {
        $ret = [
            'obj_id' => IdHelper::getNextId(),
        ];

        return $ret;
    }

    /**
     * 获取多个ID
     *
     * @param  int   $num
     * @return array
     */
    public function getNextIds(int $num): array
    {
        $ret = [
            'obj_id' => IdHelper::getNextIds($num),
        ];

        return $ret;
    }

}
