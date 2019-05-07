<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api('642406866:AAHMJndO_QhFzliHewOLUvPUtFZOMhjZZtI');
        //dd($this->telegram->getUpdates());
    }
    public function getUpdates()
    {
        $updates = $this->telegram->getUpdates();

        return response()->json($updates);
    }

    public function sendMsg()
    {
        $text = "<b> FACTURACION HECHA </b>\n";
        $this->telegram->sendMessage([
            'chat_id'    => env('TELEGRAM_CHANNEL_ID', '-1001307907673'),
            'parse_mode' => 'HTML',
            'text'       => $text,
        ]);
    }
}
