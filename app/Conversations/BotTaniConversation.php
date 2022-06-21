<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use DB;

class BotTaniConversation extends Conversation
{
    protected $tanya = 'ringkasan';
    /**
     * First question
     */
    public function tanyaSesuatu()
    {
        $question = Question::create("Silahkan pilih data yang ingin dilihat.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Ringkasan Data Barang')->value('ringkasan'),
                Button::create('Detail Data Stock Barang')->value('restock'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'restock':
                        $this->tanya = 'restock';
                        $this->jawabanNya('restock');
                        break;
                    case 'ringkasan':
                        $this->tanya = 'ringkasan';
                        $this->jawabanNya('ringkasan');
                        break;
                    default:
                        # code...
                        break;
                }
            }
        });
    }

    public function jawabanNya($ask)
    {
        if ($ask == 'ringkasan') {
            $this->say($this->getDataRingkasan());
        } elseif ($ask == 'restock') {
            $this->say($this->getDataReStock());
        }
    }

    public function getDataRingkasan()
    {
        $tersedia = DB::table('barang')->where('stock', '>', 0)->count();
        $segera = DB::table('barang')->where('stock', '<', 5)->count();
        $habis = DB::table('barang')->where('stock', '=', 0)->count();
        $kata = 'Ringkasan Data Barang' . "\n";

        $kata .= 'Stock Tersedia : ' . $tersedia . "\n";
        $kata .= 'Stock  Segera Habis: ' . $segera . "\n";
        $kata .= 'Stock Habis : ' . $habis . "\n";
        $kata .= "\n" . ' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        $rpl = str_replace(array("\n"), "\xA", $kata);
        $send = urlencode($rpl);
        return $rpl;
    }

    public function getDataReStock()
    {
        $data = DB::table('barang')->where('stock', '<', 5)->get();
        $kata = 'Detail Data yang Perlu Restock Barang' . "\n";

        if (!$data->isEmpty()) {
            foreach ($data as $key => $value) {
                $kata .= $value->nama . ' ' . 'Stock :' . $value->stock . "\n";
            }
            $kata .= 'Total barang yang perlu di restock sebanyak' . ' ' . count($data) . "\n" . ' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        } else {
            $all = DB::table('barang')->get();
            $kata .= '\n Total barang : ' . count($all) . "\n";
            foreach ($all as $key => $value) {
                $kata .= $value->nama . "\n" . 'Stock :' . $value->stock . "\n";
            }
            $kata .= "\n" . 'Belum ada data barang yang perlu di restock ulang semua persediaan masih diatas 5 ' . "\n" . ' Silahkan ketik /start lagi dan kirim untuk memulai ulang';
        }
        $rpl = str_replace(array("\n"), "\xA", $kata);
        $send = urlencode($rpl);
        return $rpl;
    }
    /**
     * Start the conversation
     */
    public function run()
    {
        $this->tanyaSesuatu();
        // $this->cariLagi();
    }
}
