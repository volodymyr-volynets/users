<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Middleware;

use Object\Middleware;
use Helper\Constant\HTTPConstants;
use Numbers\Users\APIs\Model\BearerTokens;
use NF\Error;
use Object\Reflection;

class BearerToken extends Middleware
{
    /**
     * Run
     *
     * @param \Request $request
     * @param mixed $response
     * @param array $options
     * @return bool|array
     */
    public function run(\Request $request, mixed $response, array $options = []): bool|array
    {
        $result = [
            'success' => true,
            'error' => [],
            'http_status_code' => HTTPConstants::Status200OK,
        ];
        if (!\Application::get('flag.global.__is_api')) {
            return $result;
        }
        /** @var Route $route */
        $route = $options['route'];
        $token = $request->bearerToken();
        $column = Reflection::getProperties($route->resource[0], $route->action_method_code . '_columns')['value']['bearer_token'] ?? null;
        $check_token_validity = false;
        if ($column !== null) {
            if (!empty($column['required'])) {
                $check_token_validity = true;
            }
            if (!empty($column['sometimes']) && $token) {
                $check_token_validity = true;
            }
        }
        // if we need to check validity
        if ($check_token_validity) {
            if (!$token) {
                return [
                    'success' => false,
                    'error' => [loc('NF.Message.Unauthorized', 'Unauthorized!')],
                    'http_status_code' => HTTPConstants::Status401Unauthorized,
                ];
            }
            // for events we do not have sessions and simply accept tokens
            $crypt = new \Crypt();
            $bearer_decoded = $crypt->bearerAuthorizationTokenDecode($token);
            if (!empty($bearer_decoded['valid']) && $bearer_decoded['type'] == 'EVT') {
                return $result;
            }
            // for APIs with permissions we must have bearer token
            if (empty($_SESSION['numbers']['__bearer_token']) || $_SESSION['numbers']['__bearer_token'] !== $token) {
                return [
                    'success' => false,
                    'error' => [loc(Error::ROUTE_BEARER_TOKEN_EXPIRED)],
                    'http_status_code' => HTTPConstants::Status401Unauthorized,
                ];
            }
        }
        return $result;
    }
}
