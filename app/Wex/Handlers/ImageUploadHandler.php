<?php

namespace Wex\Handlers;

use App\Entities\User;
use Image;
use Auth;
use Log;
use Wex\Handlers\Exception\ImageUploadException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use zgldh\QiniuStorage\QiniuStorage;


class ImageUploadHandler
{
    /**
     * @var UploadedFile $file
     */
    protected $file;
    protected $allowed_extensions = ["png", "jpg", "gif", 'jpeg'];

    /**
     * @param UploadedFile $file
     * @param User $user
     * @return array
     */
    public function uploadAvatar($file, User $user)
    {
        $this->file = $file;
        $this->checkAllowedExtensionsOrFail();

        $avatar_name = $user->id . '_' . time() . '.' . $file->getClientOriginalExtension() ?: 'png';
        $this->saveImageToLocal('avatar', 380, $avatar_name);

        return ['filename' => $avatar_name];
    }

    public function uploadImage($file, $type)
    {
        $this->file = $file;
        $this->checkAllowedExtensionsOrFail();

        $qiniuImage = $this->saveImageToQiniu($type, 1440);
        return [
            'filename' => $qiniuImage,
            'fullpath' => qiniu_cdn($qiniuImage)
        ];
    }

    protected function checkAllowedExtensionsOrFail()
    {
        $extension = strtolower($this->file->getClientOriginalExtension());
        if ($extension && !in_array($extension, $this->allowed_extensions)) {
            throw new ImageUploadException('You can only upload image with extensions: ' . implode($this->allowed_extensions, ','));
        }
    }

    protected function saveImageToLocal($type, $resize, $filename = '')
    {
        $folderName = ($type == 'avatar')
            ? 'uploads/avatars'
            : 'uploads/images/' . date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id;

        $destinationPath = public_path() . '/' . $folderName;
        $extension = $this->file->getClientOriginalExtension() ?: 'png';
        $safeName  = $filename ? :str_random(10) . '.' . $extension;
        $this->file->move($destinationPath, $safeName);

        if ($this->file->getClientOriginalExtension() != 'gif') {
            $img = Image::make($destinationPath . '/' . $safeName);
            $img->resize($resize, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save();
        }
        return $folderName .'/'. $safeName;
    }

    protected function saveImageToQiniu($type, $resize = '', $filename = '')
    {
        $destinationPath =  $type . '/';
        $extension = $this->file->getClientOriginalExtension() ?: 'png';
        $safeName  = $filename ? :str_random(10) . '.' . $extension;

        $disk = QiniuStorage::disk('qiniu');
        $disk->put($destinationPath.$safeName, file_get_contents($this->file->getPathname()));

        return $destinationPath.$safeName;
    }
}
