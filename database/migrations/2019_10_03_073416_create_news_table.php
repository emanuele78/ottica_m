<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateNewsTable extends Migration {
		
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			
			Schema::create(
			  'news', function (Blueprint $table) {
				
				$table->bigIncrements('id');
				$table->string('title', config('app.news_title_max_length'));
				$table->string('title_slug');
				$table->string('image');
				$table->string('description_short', config('app.news_description_short_max_length'));
				$table->text('description_long');
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			
			Schema::dropIfExists('news');
		}
	}
