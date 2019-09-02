<?php

namespace Selene\Modules\BladeEditorModule\Support;

/**
 * Class Helper
 * @package App\modules\Selene\BladeEditorModule\src\Support
 */
class Helper
{
    /**
     * @param string $path
     *
     * @return mixed
     */
    public static function getFilenameFormPath(string $path)
    {
        $explodes = explode('/', $path);

        return last($explodes);
    }

    /**
     * @param string $path
     *
     * @return mixed
     */
    public static function getDirectoryPathForFile(string $path)
    {
        preg_match('/^(\/(.)*\/)/', $path, $matches);

        return current($matches);
    }
}
