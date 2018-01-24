<?php

use App\Backend\Controllers\BaseController;
use App\Sdks\Library\Error\Exceptions\CustomException;
use App\Sdks\Library\Exceptions\JsonFmtException;
use App\Sdks\Library\Error\ErrorHandle;
use App\Sdks\Library\Error\handlers\Err;
use App\Sdks\Library\Error\Settings\CoreLogic;
use App\Sdks\Services\IdService;

/**
 * ID控制器
 *
 * @author dusong<1264735045@qq.com>
 */
class IdController extends BaseController
{
    /**
     * 生成单个ID数据
     *
     * @throws JsonFmtException
     */
    public function nextIdAction()
    {
        try {
            $ret = IdService::getNextId();

            $this->flash->successJson($ret);
        } catch (CustomException $e) {
            throw new JsonFmtException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 生成多个ID数据
     *
     * @throws JsonFmtException
     */
    public function nextIdsAction()
    {
        try {
            $num = $this->request->getPost('num');
            $ret = IdService::getNextIds($num);

            $this->flash->successJson($ret);
        } catch (CustomException $e) {
            throw new JsonFmtException($e->getMessage(), $e->getCode());
        }
    }
}
