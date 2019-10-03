<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateCarouselImagesTable extends Migration {
		
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			
			Schema::create(
			  'carousel_images', function (Blueprint $table) {
				
				$table->bigIncrements('id');
				$table->string('small_text', 50);
				$table->string('big_text', 50);
				$table->string('description');
				$table->string('link');
				$table->string('image');
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			
			Schema::dropIfExists('carousel_images');
		}
	}
