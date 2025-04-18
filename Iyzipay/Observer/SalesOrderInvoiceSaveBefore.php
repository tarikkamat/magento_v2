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

namespace Iyzico\Iyzipay\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SalesOrderInvoiceSaveBefore implements ObserverInterface
{

    /**
     * Execute observer
     *
     * This method is called when the event specified in the events.xml file is triggered.
     *
     * @param  Observer  $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $invoice = $observer->getEvent()->getInvoice();
        $order = $invoice->getOrder();

        if ($order->getInstallmentFee()) {
            $total = $order->getGrandTotal();
            $subTotal = $order->getSubTotal();

            $order->setTotalInvoiced($total);
            $order->setBaseTotalInvoiced($total);
            $invoice->setGrandTotal($total);
            $invoice->setBaseGrandTotal($total);
            $invoice->setSubTotal($subTotal);
            $invoice->setBaseSubTotal($subTotal);
            $invoice->setSubTotalInclTax($subTotal);
            $invoice->setBaseSubTotalInclTax($subTotal);
            $invoice->addComment('Invoice Created.');
        }
    }
}
