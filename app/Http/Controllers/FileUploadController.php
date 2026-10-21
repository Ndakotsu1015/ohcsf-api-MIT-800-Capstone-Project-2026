<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FileUploadController extends Controller
{
    const LOG_KEY = 'FileUploadController';

    public function upload(Request $request) 
    { 
        Log::info(self::LOG_KEY.' [upload] uploading...');
        
        // ✅ Use Validator instead of $this->validate()
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:doc,docx,pdf,txt,csv,png,jpg,jpeg|max:2048'
        ]);

        // ❌ Validation failed? Return error response
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        $file = $request->file('file');
        $visibility = $request->visibility; 
        $path = $visibility === 'private' ? 'files' : 'public/files';
        
        // ✅ Store the file
        $filePath = $file->store($path);

        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "data" => basename($filePath)  // Only return the filename
        ]);
    }

    public function getFile($filename, $visibility = 'public')
    {
        $filepath = $visibility == 'private' ? 'files/' . $filename : 'public/files/' . $filename;
        if (!Storage::disk('local')->exists($filepath)) {
            return $this->error('File not found.', 404);
        }
        return Storage::response($filepath);
    }
}
