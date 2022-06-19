<?php
namespace App\Http\Controllers;
 
use BotMan\BotMan\BotMan;
use App\Conversations\BotTaniConversation;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use DB;
 
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
 
        $botman->hears('/ringkasan|ringkasan', function (BotMan $bot) {
            $data =  $this->getDataRingkasan();
            $bot->reply($data);
        })->stopsConversation();
 
        $botman->hears('/restock|restock', function (BotMan $bot) {
            $data =  $this->getDataReStock();
            $bot->reply($data);
        })->stopsConversation();
 
        $botman->listen();
    }
 
    public function getDataRingkasan()
    {
        $tersedia = DB::table('barang')->where('stock','>',5)->count();
        $segera = DB::table('barang')->where('stock','<',5)->count();
        $habis = DB::table('barang')->where('stock','=',0)->count();
        $kata = 'Ringkasan Data Barang'."\n";
       
            $kata .= 'Stock Tersedia : '.$tersedia."\n";
            $kata .= 'Stock  Segera Habis: '.$segera."\n";
            $kata .= 'Stock Habis : '.$habis."\n";
            $kata .= "\n".' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        $rpl = str_replace(array("\n"), "\xA" , $kata);
        $send = urlencode($rpl);
        return $rpl;
 
    }

    public function getDataReStock()
    {
        $data = DB::table('barang')->where('stock','<',5)->get();
        $kata = 'Detail Data Stock Barang'."\n";
        
        if(!$data->isEmpty())
        {
            foreach ($data as $key => $value) {
                $kata .= $value->nama.' '.'Stock :'.$value->stock."\n";
            }
            $kata .= 'Total barang yang perlu di restock sebanyak'.' '.count($data)."\n".' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        }else{
            $all = DB::table('barang')->get();
            $kata .= '\n Total barang : '.count($all)."\n";
            foreach ($all as $key => $value) {
                $kata .= $value->nama."\n".'Stock :'.$value->stock."\n";
            }
            $kata .= "\n".'Belum ada data barang yang perlu di restock ulang semua persediaan masih diatas 5 '."\n".' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        }
        $rpl = str_replace(array("\n"), "\xA" , $kata);
        $send = urlencode($rpl);
        return $rpl;
 
    }
 
}