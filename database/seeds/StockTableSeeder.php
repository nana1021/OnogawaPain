<?php

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア
       DB::table('stocks')->insert([
           'name' => 'フィルムカメラ',
           'detail' => '1960年式のカメラです',
           'price' => 200000,
           'image_path' => 'filmcamera.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'イヤホン',
           'detail' => 'ノイズキャンセリングがついてます',
           'price' => 20000,
           'image_path' => 'iyahon.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => '時計',
           'detail' => '1980年式の掛け時計です',
           'price' => 120000,
           'image_path' => 'clock.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => '地球儀',
           'detail' => '珍しい商品です',
           'price' => 120000,
           'image_path' => 'earth.jpg',
       ]);


       DB::table('stocks')->insert([
           'name' => '腕時計',
           'detail' => 'プレゼントにどうぞ',
           'price' => 9800,
           'image_path' => 'watch.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'カメラレンズ35mm',
           'detail' => '最新式です',
           'price' => 79800,
           'image_path' => 'lens.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'シャンパン',
           'detail' => 'パーティにどうぞ',
           'price' => 800,
           'image_path' => 'shanpan.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'ビール',
           'detail' => '大量生産されたビールです',
           'price' => 200,
           'image_path' => 'beer.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'やかん',
           'detail' => 'かなり珍しいやかんです',
           'price' => 1200,
           'image_path' => 'yakan.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => '精米',
           'detail' => '米30Kgです',
           'price' => 11200,
           'image_path' => 'kome.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'パソコン',
           'detail' => 'ジャンク品です',
           'price' => 11200,
           'image_path' => 'pc.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'アコースティックギター',
           'detail' => 'ヤマハ製のエントリーモデルです',
           'price' => 25600,
           'path' => 'aguiter.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'エレキギター',
           'detail' => '初心者向けのエントリーモデルです',
           'price' => 15600,
           'image_path' => 'eguiter.jpg',
       ]);

       DB::table('stocks')->insert([
           'name' => '加湿器',
           'detail' => '乾燥する季節の必需品',
           'price' => 3200,
           'image_path' => 'steamer.jpeg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'マウス',
           'detail' => 'ゲーミングマウスです',
           'price' => 4200,
           'image_path' => 'mouse.jpeg',
       ]);

       DB::table('stocks')->insert([
           'name' => 'Android Garxy10',
           'detail' => '中古美品です',
           'price' => 84200,
           'image_path' => 'mobile.jpg',
       ]);
   }
}
