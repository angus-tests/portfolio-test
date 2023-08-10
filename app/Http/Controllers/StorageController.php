<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Log;

class StorageController extends Controller
{
    /**
     * Fetch an image from /storage/app/public/images
     */
    public function image($filename)
    {
      Log::channel('images')->info("Fetching image: ".$filename);
      return $this->serveFileFromStorage('app/public/images/' . $filename);
    }

    /**
     * Fetch an image from /storage/app
     */
    public function storage($filename)
    {
      return $this->serveFileFromStorage('app/' . $filename);
    }

    /**
     * Private method to fetch file from a given path and serve as a response
     */
    private function serveFileFromStorage($path)
    {
      $fullPath = storage_path($path);

      if (!File::exists($fullPath)) {
          abort(404);
      }

      $file = File::get($fullPath);
      $type = File::mimeType($fullPath);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
    }
}
