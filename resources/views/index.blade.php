@extends('DashboardModule::dashboard.index')

@section('content')
    <div class="content-wrapper">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Views</h4>
                    <p class="card-description m-0 p-0">Lista folderów oraz widoków <code>.blade.php </code>:</p>
                    <button class="btn btn-primary mt-2 mb-4 d-flex justify-content-center align-content-center">
                        <i class="mdi mdi-pencil-plus"></i>
                        <p class="p-0 m-0">Dodaj nowy plik widoku</p>
                    </button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Nazwa pliku</td>
                                <td>Rozmiar</td>
                                <td>Data ostatniej aktualizacji</td>
                                <td>Opcje</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('BladeEditorModule::list', ['path' => $back]) }}">
                                        ..
                                    </a>
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            @include('BladeEditorModule::loop-file', ['files' => $dirs])
                            @include('BladeEditorModule::loop-file', ['files' => $files])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
