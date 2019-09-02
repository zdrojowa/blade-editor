<?php

namespace Selene\Modules\BladeEditorModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeEditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('getNameFromPath', function ($test) {
            return "<?php echo Selene\Modules\BladeEditorModule\Support\Helper::getFilenameFormPath($test); ?>";
        });
    }
}
