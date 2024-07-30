<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
  public static function upload($imageFile, $folderName){

    if(is_array($imageFile)){
      $file = $imageFile['image'];
    } else {
      $file = $imageFile;
    }
    $fileName = uniqid(rand().'_');
    $extension = $file->extension();
    $fileNameToStore = $fileName . '.' . $extension;
    $manager = new ImageManager(new Driver());
    $resizedImage = $manager->read($file)->resize(1920, 1080)->encode();
    Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);
    return $fileNameToStore;
  } 
}