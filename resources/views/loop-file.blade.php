@foreach($files as $file)
    <tr>
        <td>
            @if($file->getType() === 'file')
                <a href="{{ route('BladeEditorModule::edit', ['path' => $file->getPathname()]) }}" class="font-danger d-flex">
                    <i class="mdi mdi-laravel mr-2"></i>
                    <div>
                        <code>{{ $file->getFileName() }}</code>
                    </div>
                </a>
            @else
                <a href="{{ route('BladeEditorModule::list', ['path' => $file->getPathname()]) }}" class="font-warning d-flex">
                    <i class="mdi mdi-folder mr-2"></i>
                    <div>{{ $file->getFileName() }}</div>
                </a>
            @endif
        </td>
        <td>{{ $file->getSize() }} kb</td>
        <td>{{ date('Y-m-d g:i a', $file->getMTime()) }}</td>
        <td>
            <button class="btn btn-primary btn-danger d-flex justify-content-center align-content-center">
                <i class="mdi mdi-delete"></i>
                <p class="p-0 m-0">Usuń</p>
            </button>
        </td>
    </tr>
@endforeach
