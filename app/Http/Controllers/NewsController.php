<?php
	
	namespace App\Http\Controllers;
	
	use App\News;
	use Cviebrock\EloquentSluggable\Services\SlugService;
	use Illuminate\Http\Request;
	use Storage;
	use Validator;
	
	class NewsController extends Controller {
		
		private $title_max_length;
		private $description_short_max_length;
		private $imageMaxSize;
		
		public function __construct() {
			
			$this->title_max_length = config('app.news_title_max_length');
			$this->description_short_max_length = config('app.news_description_short_max_length');
			$this->imageMaxSize = config('app.news_image_max_weight');
		}
		
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index() {
			
			$news = News::get();
			return view('news.index')->with('news', $news);
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create() {
			
			return view('news.create')
			  ->with('maxTitleLength', $this->title_max_length)
			  ->with('maxImageWeight', $this->imageMaxSize)
			  ->with('maxShortDescriptionlength', $this->description_short_max_length);
		}
		
		/**
		 * @param Request $request
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * @throws \Illuminate\Validation\ValidationException
		 */
		public function store(Request $request) {
			
			$validator = Validator::make(
			  $request->all(), [
			  'title' => "required|max:$this->title_max_length",
			  'description_short' => "required|max:$this->description_short_max_length",
			  'description_long' => "required",
			  'image' => "required|image|max:$this->imageMaxSize|mimes:jpeg,png",
			]);
			if ($validator->fails()) {
				return redirect('news/create')
				  ->withErrors($validator)
				  ->withInput();
			}
			$data = $validator->validated();
			$image_name = Storage::disk('news_uploads')->put('news_images', $data['image']);
			$data['image'] = $image_name;
			News::create($data);
			return redirect()->to('news');
			
		}
		
		/**
		 * @param News $news
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function edit(News $news) {
			
			return view('news.edit')
			  ->with('maxTitleLength', $this->title_max_length)
			  ->with('maxImageWeight', $this->imageMaxSize)
			  ->with('maxShortDescriptionlength', $this->description_short_max_length)
			  ->with('news', $news);
			
		}
		
		/**
		 * @param Request $request
		 * @param News $news
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * @throws \Illuminate\Validation\ValidationException
		 */
		public function update(Request $request, News $news) {
			
			$validator = Validator::make(
			  $request->all(), [
			  'title' => "required|max:$this->title_max_length",
			  'description_short' => "required|max:$this->description_short_max_length",
			  'description_long' => "required",
			  'image' => "image|max:$this->imageMaxSize|mimes:jpeg,png",
			]);
			if ($validator->fails()) {
				return redirect()->route('news_edit', ['news' => $news])
				  ->withErrors($validator)
				  ->withInput();
			}
			$data = $validator->validated();
			$slug = SlugService::createSlug(News::class, 'title_slug', $data['title']);
			$news->title = $data['title'];
			$news->description_short = $data['description_short'];
			$news->description_long = $data['description_long'];
			$news->title_slug = $slug;
			if (array_key_exists('image', $data)) {
				$image_name = Storage::disk('news_uploads')->put('news_images', $data['image']);
				$news->image = $image_name;
			}
			$news->save();
			return redirect()->to('news');
		}
		
		/**
		 * @param News $news
		 * @return \Illuminate\Http\RedirectResponse
		 * @throws \Exception
		 */
		public function destroy(News $news) {
			
			$news->delete();
			return redirect()->to('news');
		}
	}
