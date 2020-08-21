<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{

    /**
     * @param $file
     * @param string $fileDirectory
     * @return string
     */
    public function saveFile($file)
    {
        $fileName = $this->getFileName($file);
        $file->storeAs($this->getDirectoryPath(), $fileName);
        $filePath = $this->getDirectoryPath();
        $file->move($filePath, $fileName);

        return $this->getFilePath(). '/' . $fileName;
    }

    /**
     * @param $file
     * @return string
     */
    public function getFileName($file)
    {
        return uniqid() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    }

    /**
     * @param bool $public
     * @return string
     */
    public function getDirectoryPath($public = true)
    {
        $paths = config('files.paths');

        return ($public ? $paths['public'] : $paths['storage']) . '/'
            . $this->getDirectoryName() . '/'
            . $this->getRecordKey();
    }

    /**
     * @param $field
     */
    public function deleteFile($file)
    {
        Storage::delete('public/' . $file);
    }

    /**
     * @param $field
     * @return string
     */
    public function getFilePath($public = false)
    {
        return 'files/' . $this->getDirectoryName() . '/' . $this->getRecordKey();
    }

    /**
     * @return string
     */
    public function getDirectoryName()
    {
        return Str::lower(class_basename(get_class($this)));
    }

    /**
     * @return mixed
     */
    public function getNextKey()
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE '" . $this->getTable() . "'");
        return $statement[0]->Auto_increment;
    }

    /**
     * @return mixed
     */
    public function getRecordKey()
    {
        return $this->getKey() ?? $this->getNextKey();
    }
}
