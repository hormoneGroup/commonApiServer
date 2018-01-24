<?php

namespace App\Sdks\Services;

use App\Sdks\Library\Helpers\IdHelper;
use App\Sdks\Models\Logic\IdLogic;
use App\Sdks\Models\Logic\UserLogic;

/**
 * ID服务
 *
 * @author dusong<1264735045@qq.com>
 */
class IdService extends BaseService
{
    /**
     * 获取ID生成器逻辑
     *
     * @return IdLogic
     */
    protected static function getIdLogic()
    {
        return new IdLogic();
    }

    /**
     * 获取单个ID
     *
     * @return array
     */
    public static function getNextId(): array
    {
        return static::getIdLogic()->getNextId();
    }

    /**
     * 获取多个ID
     *
     * @param  int   $num
     * @return array
     */
    public static function getNextIds(int $num): array
    {
        return static::getIdLogic()->getNextIds($num);
    }

}
