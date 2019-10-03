<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Cviebrock\EloquentSluggable\Sluggable;
	
	class News extends Model {
		
		use Sluggable;
		
		protected $guarded = ['id', 'created_at', 'updated_at'];
		protected $hidden = ['id'];
		
		public function getRouteKeyName() {
			
			return 'title_slug';
		}
		
		public function sluggable() {
			
			return [
			  'title_slug' => [
				'source' => 'title'
			  ]
			];
		}
	}
