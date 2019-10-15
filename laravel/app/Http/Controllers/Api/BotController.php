<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bot;
use App\BotTemplate;
use App\Http\Controllers\Controller;
use LINE\LINEBot;


use App\Services\Line\Event\RecieveLocationService;
use App\Services\Line\Event\RecieveTextService;
use App\Services\Line\Event\FollowService;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = BotTemplate::where("name","like","%".$request->search_text."%")->get();

        return response()->json([
            'status' => 'success',
            'bots' => view("admin/bot/bottemplate",["bot_templates"=>$items])->render(),
        ]);
    }

    
    /**
     * callback from LINE Message API(webhook)
     * @param Request $request
     * @throws LINEBot\Exception\InvalidSignatureException
     */
    public function callback(Request $request)
    {

        /** @var LINEBot $bot */
        $bot = app('line-bot');
        logger($_SERVER);

        $signature = $_SERVER['HTTP_'.LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
        if (!LINEBot\SignatureValidator::validateSignature($request->getContent(), env('LINE_CHANNEL_SECRET'), $signature)) {
            logger()->info('recieved from difference line-server');
            abort(400);
        }

        logger($request->getContent());
        $events = $bot->parseEventRequest($request->getContent(), $signature);

        /** @var LINEBot\Event\BaseEvent $event */
        foreach ($events as $event) {
            $reply_token = $event->getReplyToken();
            $reply_message = 'その操作はサポートしてません。.[' . get_class($event) . '][' . $event->getType() . ']';

            switch (true){
                //友達登録＆ブロック解除
                case $event instanceof LINEBot\Event\FollowEvent:
                    $service = new FollowService($bot);
                    $reply_message = $service->execute($event)
                        ? '友達登録されたからLINE ID引っこ抜いたわー'
                        : '友達登録されたけど、登録処理に失敗したから、何もしないよ';

                    break;
                //メッセージの受信
                case $event instanceof LINEBot\Event\MessageEvent\TextMessage:
                    $service = new RecieveTextService($bot);
                    $reply_message = $service->execute($event);
                    break;

                //位置情報の受信
                case $event instanceof LINEBot\Event\MessageEvent\LocationMessage:
                    $service = new RecieveLocationService($bot);
                    $reply_message = $service->execute($event);
                    break;

                //選択肢とか選んだ時に受信するイベント
                case $event instanceof LINEBot\Event\PostbackEvent:
                    break;
                //ブロック
                case $event instanceof LINEBot\Event\UnfollowEvent:
                    break;
                default:
                    // $body = $event->getEventBody();
                    logger()->warning('Unknown event. ['. get_class($event) . ']', compact('body'));
            }

            $bot->replyText($reply_token, $reply_message);
        }
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $uuid = "U346e65669ad829fbf506947216ff7939";
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);
    
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello'); //ここにメッセージを入れる。
        $response = $bot->pushMessage("{$uuid}", $textMessageBuilder);
    
        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        return response()->json([
            'status' => 'success',
            "responsel" => $response->getHTTPStatus() . ' ' . $response->getRawBody()
            // 'bots' => view("admin/bot/bottemplate",["bot_templates"=>$items])->render(),
        ]);
    }

}
