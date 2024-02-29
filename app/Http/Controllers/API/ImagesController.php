<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class ImagesController extends BaseController
{
//    use AuthorizesRequests, ValidatesRequests;

	public function get(Request $request)
	{
		return Image::all()->toArray();
	}

	public function delete(Request $request)
	{
		return 'get';
	}

	public function post(Request $request)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { //TODO: прочитать нужно ли все время проверять?
//			$validated = $request->validate([ //TODO: разобраться с валидатором
//				'url' => ['required'],
//				'title' => ['required'],
//				'promt' => ['required'],
//			]);





			if (isset($request->url)) {
				$url = str_replace('md2_webp','full_webp',$request->url);
				$date = now()->toDateString();
				$contents = file_get_contents($url);
				$mime_type = explode(":", get_headers($url)[2]);
				$extension = array_search(
					trim($mime_type[1]),
					[
						'jpg' => 'image/jpeg',
						'png' => 'image/png',
						'gif' => 'image/gif',
						'webp' => 'image/webp',
						// Добавьте другие MIME-типы и их соответствующие расширения здесь
					],
					true
				);
				if ($extension !== false) {
					$prefix = '';
					$suffix = '';
					$unique_key = uniqid($prefix, true) . $suffix;

					$file_name = $date .'-'.$unique_key .'.' . $extension;
					if(Storage::put($file_name, $contents)){
						$image = new Image;
						$image->url = $url;
						$image->title = $request->title; // TODO: можно ли сохрнять компактнее
						$image->promt = $request->promt;
						$image->filename = $file_name;
						$image->size = 22;
						$image->width = 22;
						$image->height = 22;
						$image['user-id'] = 1;
						$image->save();
					}



				}



			}


		}
	}

	public function patch(Request $request)
	{
		return 'get';
	}
}
