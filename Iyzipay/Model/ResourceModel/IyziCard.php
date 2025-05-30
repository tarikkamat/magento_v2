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

namespace Iyzico\Iyzipay\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class IyziCard extends AbstractDb
{
    /**
     * @var string
     */
    protected string $_eventPrefix = 'iyzico_card_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct(): void
    {
        $this->_init('iyzico_card', 'iyzico_card_id');
        $this->_useIsObjectNew = true;
    }
}
