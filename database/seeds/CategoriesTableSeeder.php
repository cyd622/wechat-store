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
                'name' => '文档',
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
                'slug' => 'tools',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}