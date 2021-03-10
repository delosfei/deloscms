<?php

namespace App\Services\Upload;

use App\Models\Attachment;
use Auth;

/**
 * 站点服务
 * @package App\Services
 */
class UploadService
{
    /**
     * 本地上传
     *
     * @param [type] $file
     * @return void
     */
    public function local($file)
    {
        $path = $file->store(date('y/m'), 'attachment');
        $path = url("attachment/{$path}");

        return $this->save($file, $path);
    }

    /**
     * 保存数据
     *
     * @param [type] $file
     * @param [type] $path
     * @return void
     */
    protected function save($file, $path)
    {
        $realFile = $file->getRealPath();

        return Attachment::create(
            [
                'path' => $path,
                'user_id' => Auth::id(),
                'name' => $file->getClientOriginalName(),
                'size' => round(filesize($realFile) / 1024, 2),
                'extension' => $file->extension(),
            ]
        );
    }
}
