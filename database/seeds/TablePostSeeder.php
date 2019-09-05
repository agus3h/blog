<?php
/**
 * 
 */
use Illuminate\Database\Seeder;
class TablePostSeeder extends Seeder {
	
	public function run()
	{
		DB::table('post')->delete();

		$post = array(
			array('id'=>1,'title'=>'Tips Cepat Nikah','content'=>'lorem ipsum'),
			array('id'=>2,'title'=>'Tips Pengusaha Sukses','content'=>'lorem ipsum'),
			array('id'=>3,'title'=>'Tips Wawancara','content'=>'lorem ipsum')
		);
		DB::table('post')->insert($post);
	}
}


?>