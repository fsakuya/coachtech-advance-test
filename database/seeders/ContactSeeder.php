<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContactSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Contact::factory()->count(30)->create();

    $param = [
      'fullname' => '山田太郎',
      'gender' => '1',
      'email' => 'test@test.com',
      'postcode' => '1111111',
      'address' => '東京都練馬区',
      'building_name' => '練馬ビルディング',
      'opinion' => '意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。',
    ];
    Contact::create($param);
    $param = [
      'fullname' => '山田花子',
      'gender' => '2',
      'email' => 'test1@test.com',
      'postcode' => '2222222',
      'address' => '東京都新宿区',
      'building_name' => '新宿ビルディング',
      'opinion' => '意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。',

    ];
    Contact::create($param);
    $param = [
      'fullname' => '佐藤太郎',
      'gender' => '1',
      'email' => 'test3@test.com',
      'postcode' => '3333333',
      'address' => '東京都墨田区',
      'building_name' => '墨田ビルディング',
      'opinion' => '意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。',

    ];
    Contact::create($param);
    $param = [
      'fullname' => '佐藤花子',
      'gender' => '2',
      'email' => 'test4@test.com',
      'postcode' => '4444444',
      'address' => '東京都北区',
      'building_name' => '北ビルディング',
      'opinion' => '意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。',
    ];
    Contact::create($param);
    $param = [
      'fullname' => '鈴木太郎',
      'gender' => '1',
      'email' => 'test5@test.com',
      'postcode' => '5555555',
      'address' => '東京都板橋区',
      'building_name' => '板橋ビルディング',
      'opinion' => '意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。意見テストです。',

    ];
    Contact::create($param);
  }
}
