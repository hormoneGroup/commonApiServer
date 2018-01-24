<?php

namespace App\Sdks\Core\Logic\Router\Validate\Id;

use App\Sdks\Core\Logic\Router\Validate\BsseValidate;

/**
 * 生成多个ID验证器
 *
 * @author dusong<1264735045@qq.com>
 */
class NextIds extends BsseValidate
{
    public function rules()
    {
        return [
            ['num', 'required'],
            ['num', 'number'],
            ['num', 'range', 'min' => 1, 'max' => 10000]
        ];
    }

    public function messages()
    {
        return [
            'num.required' => '生成ID数量必须',
            'num.number'   => '生成ID数量不合法',
            'num.range'    => '生成ID数量范围1~10000',
        ];
    }
}
