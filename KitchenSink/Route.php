<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace LINE\LINEBot\KitchenSink;

use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Event\AccountLinkEvent;
use LINE\LINEBot\Event\BeaconDetectionEvent;
use LINE\LINEBot\Event\FollowEvent;
use LINE\LINEBot\Event\JoinEvent;
use LINE\LINEBot\Event\LeaveEvent;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\AudioMessage;
use LINE\LINEBot\Event\MessageEvent\ImageMessage;
use LINE\LINEBot\Event\MessageEvent\LocationMessage;
use LINE\LINEBot\Event\MessageEvent\StickerMessage;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\Event\MessageEvent\UnknownMessage;
use LINE\LINEBot\Event\MessageEvent\VideoMessage;
use LINE\LINEBot\Event\PostbackEvent;
use LINE\LINEBot\Event\ThingsEvent;
use LINE\LINEBot\Event\UnfollowEvent;
use LINE\LINEBot\Event\UnknownEvent;
use LINE\LINEBot\Exception\InvalidEventRequestException;
use LINE\LINEBot\Exception\InvalidSignatureException;
use LINE\LINEBot\KitchenSink\EventHandler\BeaconEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\FollowEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\JoinEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\LeaveEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\AudioMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\ImageMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\LocationMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\StickerMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\TextMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\VideoMessageHandler;
use LINE\LINEBot\KitchenSink\EventHandler\PostbackEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\ThingsEventHandler;
use LINE\LINEBot\KitchenSink\EventHandler\UnfollowEventHandler;

class Route
{
    public function register(\Slim\App $app)
    {
        $app->post('/callback', function (\Slim\Http\Request $req, \Slim\Http\Response $res) {
           /** @var \LINE\LINEBot $bot */
            $bot = $this->bot;
            /** @var \Monolog\Logger $logger */
            $logger = $this->logger;
                $logger->info('Reply text');
                $resp = $bot->replyText($event->getReplyToken(), "Hello World");
            $res->write('OK');
            return $res;
        });
    }
}
