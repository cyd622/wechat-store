<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'post_count' => 0,
                'weight' => 0,
                'name' => '技术',
                'slug' => 'tech',
                'type' => 'topic',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'post_count' => 0,
                'weight' => 0,
                'name' => 'WxStore',
                'type' => 'topic',
                'slug' => 'document',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'post_count' => 0,
                'weight' => 0,
                'name' => '资源',
                'type' => 'topic',
                'slug' => 'resource',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 0,
                'post_count' => 0,
                'weight' => 0,
                'name' => '问答',
                'type' => 'topic',
                'slug' => 'qa',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 0,
                'post_count' => 0,
                'weight' => 0,
                'name' => '工具',
                'type' => 'topic',
                'slug' => 'tools',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),

            // 文章的分类
            5 =>
                array (
                    'id' => 5,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 0,
                    'name' => '官方文档解读',
                    'type' => 'post',
                    'slug' => 'docs',
                    'description' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),

            6 =>
                array (
                    'id' => 6,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 0,
                    'name' => '小程序资讯',
                    'type' => 'post',
                    'slug' => 'news',
                    'description' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),

            7 =>
                array (
                    'id' => 7,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 0,
                    'name' => '小程序教程',
                    'type' => 'post',
                    'slug' => 'teach',
                    'description' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),

            8 =>
                array (
                    'id' => 8,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 0,
                    'name' => '小程序资源',
                    'type' => 'post',
                    'slug' => 'resource',
                    'description' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
        ));
        
        
    }
}