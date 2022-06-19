<?php
namespace App\Http\Controllers;
 
use BotMan\BotMan\BotMan;
use App\Conversations\BotTaniConversation;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
 
 
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        // Load the driver(s) you want to use
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
 
        $config = [
            // Your driver-specific configuration
            "telegram" => [
               "token" => "5580120648:AAETdJCzjNZgqcr08i_urYPNZtHznLTQP4g"
            ]
        ];
        $botman = BotManFactory::create($config, new LaravelCache());
 
        $botman->hears('/start|start|mulai', function (BotMan $bot) {
            $user = $bot->getUser();
            $bot->reply('Assalamualaikum '.$user->getFirstName().', Selamat datang di BotSahabatTani!. ');
            $bot->startConversation(new BotTaniConversation());
        })->stopsConversation();
 
        // $botman->hears('/kitab|kitab', function (BotMan $bot) {
        //     $bot->startConversation(new BotTaniConversation());
        // })->stopsConversation();
 
        $botman->hears('/lapor|lapor|laporkan', function (BotMan $bot) {
            $bot->reply('Silahkan laporkan di email aurof@gmail.com . Laporan akan segera di perbaiki , terimakasih.');
        })->stopsConversation();
 
        // $botman->hears('/tentang|about|tentang', function (BotMan $bot) {
        //     $bot->reply('HaditsID Telegram Bot By ZaLabs. Mohon maaf jika server terasa lamban, dikarenakan menggunakan free hosting dari Heroku(.)com. Data didapatkan dari https://s.id/zXj6S .');
        // })->stopsConversation();
 
        $botman->listen();
    }
 
}