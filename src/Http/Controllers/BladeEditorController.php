<?php

namespace Selene\Modules\BladeEditorModule\Http\Controllers;

use FilesystemIterator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;
use Selene\Modules\BladeEditorModule\Support\Helper;

/**
 * Class BladeEditorController
 * @package App\modules\Selene\BladeEditorModule\Http\Controllers
 */
class BladeEditorController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $path = Config::get('view.paths');
        $path = current($path);
        $back = '';

        if ($request->get('path') !== null) {
            $strPath = str_replace($path, '', $request->get('path'));
            $path .= $strPath;
            preg_match('/\/(\w)+$/', $strPath, $match);
            $back = str_replace(current($match), '', $strPath);
        }

        $vars = new FilesystemIterator($path);
        $files = [];
        $dirs = [];
        foreach ($vars as $item) {
            if ($item->getType() === 'dir') $dirs[] = $item;
            if ($item->getType() === 'file') $files[] = $item;
        }

        return view('BladeEditorModule::index', ['files' => $files, 'dirs' => $dirs, 'back' => $back]);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function editFile(Request $request)
    {
        $status = explode(PHP_EOL, shell_exec("git diff $request->path"));
        if ($status[0]) {
            $status = false;
        } else {
            $status = true;
        }

        return view('BladeEditorModule::edit.index', [
            'back' => route('BladeEditorModule::list', ['path' => Helper::getDirectoryPathForFile($request->get('path'))]),
            'path' => $request->get('path'),
            'commit' => $status,
            'content' => file_get_contents($request->get('path')),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateFile(Request $request)
    {
        if (!empty($request->get('editor-changes'))) {
            file_put_contents($request->get('path'), $request->get('editor-changes'));
        }

        return redirect()->back();
    }
}
