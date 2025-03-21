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

namespace Iyzico\Iyzipay\Api;

use Iyzico\Iyzipay\Model\Data\WebhookData;

interface WebhookInterface
{
    /**
     * Check Webhook URL Key
     *
     * @param  string  $webhookUrlKey
     * @return void
     */
    public function check(string $webhookUrlKey): void;

    /**
     * Get Webhook Headers
     *
     * @return string
     */
    public function getWebhookHeader(): string;

    /**
     * Get Webhook Body
     *
     * @return WebhookData
     */
    public function getWebhookBody(): WebhookData;

    /**
     * Validate Webhook Signature
     *
     * @param  string  $signature
     * @param  string  $payload
     * @return bool
     */
    public function validateSignature(string $signature, string $payload): bool;

    /**
     * Process Webhook
     *
     * @param  WebhookData  $webhookData
     * @return void
     */
    public function processWebhook(WebhookData $webhookData): void;

    /**
     * Process Webhook V3
     *
     * @param  WebhookData  $webhookData
     * @return void
     */
    public function processWebhookV3(WebhookData $webhookData): void;

    /**
     * Log Webhook Event
     *
     * @param  string  $eventType
     * @param  array  $data
     * @param  string  $status
     * @return void
     */
    public function logWebhookEvent(string $eventType, array $data, string $status): void;

    /**
     * Generate Key
     *
     * @param  string  $secretKey
     * @param  WebhookData  $webhookData
     * @return string
     */
    public function generateKey(string $secretKey, WebhookData $webhookData): string;
}
