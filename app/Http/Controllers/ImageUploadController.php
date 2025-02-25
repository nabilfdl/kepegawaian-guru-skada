<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function uploadCroppedImage(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Get the uploaded file
        $file = $request->file('pfp');

        // Generate a unique filename
        $imageName = time() . '.' . $file->getClientOriginalExtension();

        // Store the file in 'storage/app/public/pfp_img/'
        $file->storeAs('pfp_img/', $imageName, 'public');
        
        // Generate the public URL
        $imageUrl = asset('storage/pfp_img/' . $imageName);

        // dd($imageUrl);

        return response()->json([
            'success' => true,
            'image' => $imageUrl,
            'image_name' => $imageName  // Send image name to track deletion
        ]);
    }

    // Delete the image when canceled or refreshed
    public function deleteImage(Request $request)
    {
        $imageName = $request->input('image_name');

        if ($imageName) {
            Storage::disk('public')->delete('pfp_img/' . $imageName);
        }

        return response()->json(['success' => true]);
    }
}
