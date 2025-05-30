<?php

/**
 * iyzico Payment Gateway For Magento 2
 * Copyright (C) 2018 iyzico
 *
 * This file is part of Iyzico/Iyzipay.
 *
 * Iyzico/Iyzipay is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Iyzico\Iyzipay\Model\Config;

use Magento\Config\Model\Config\CommentInterface;
use Magento\Framework\Phrase;

/**
 * Class IyzicowebhhokUrlComment
 *
 * @package Iyzico\Iyzipay\Model\Config
 */
class IyzicowebhhokUrlComment implements CommentInterface
{

    /**
     * @param  string  $elementValue
     * @return Phrase|string
     */
    public function getCommentText($elementValue): Phrase|string
    {
        return __("Don't forget to do webhook Integration.");
    }
}
