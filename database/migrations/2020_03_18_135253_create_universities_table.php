<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->enum('ville',['Beijing','Cangzhou','ChangSha','Changchun','Changzhou','Chengdu','Chenzhou','Chongqing','Dalian','Foshan','Guilin','Hangzhou','Harbin','Hefei','Huaian','Huizhou','Huzhou','Jiangmen','Jiaxing','Jilin','Jinan','Jinhua','Jining','Kunming','Lanzhou','Lhasa','Linyi','Lishui','Nanchang','Nanjing','Nanning','Nantong','Nanyang','Ningbo','Qingdao','Sanya','Shanghai','Shantou','Shaoxing','Shenzhen','Suizhou','Suzhou, Anhui','Taian','Taiyuan','Taizhou','Tianjin','Tonghua','Wenzhou','Wuhan','Wuhu','Wuxi','Wuzhong','Xian','Xiamen','Xuzhou','Yangzhou','Yantai','Yencheng','Zhengzhou','Zhenjiang']);
            $table->enum('province',['anhui','beijing','chongqing','fujian','gansu','guangdong','guangxi','guizhou','henan','hebei','hainan','heilongjiang','huan','hubei','jiangsu','jiangxi','jilin','liaoning','mongolie interieure','ningxia','qinghai','shanxi','shandong','shaanxi','sichuan','tibet','yunnan','xinjiang','zhejiang','zhilin']);
            $table->text('details');
            $table->string('slogan');
            $table->string('code');
            $table->string('website');
            $table->string('wechat')->nullable();
            $table->integer('ranking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universities');
    }
}
