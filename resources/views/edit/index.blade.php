@extends('DashboardModule::dashboard.index')

@section('content')
    <div class="content-wrapper">
        <div class="col-12">
            <form action="{{ route('BladeEditorModule::update') }}" method="post">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edycja pliku:</h4>
                        <h5 class="card-description">
                            <code>@getNameFromPath($path)</code>
                        </h5>
                        <div id="editor" style="height: 70vh; display: none;">{{ $content }}</div>
                        <input type="hidden" name="path" value="{{ $path }}">
                        <textarea style="display: none;" name="editor-changes" id="editor-changes" cols="0"
                                  rows="0"></textarea>
                    </div>
                    <div class="card-footer">
                        <a
                            href="{{ $back }}"
                            class="btn btn-primary float-left d-flex justify-content-center align-content-center">
                            <i class="mdi mdi-arrow-left"></i>
                            <p class="p-0 m-0">Wróć</p>
                        </a>
                        <button
                            type="button"
                            class="btn btn-primary btn-warning float-right d-flex justify-content-center align-content-center">
                            <i class="mdi mdi-github-box"></i>
                            <p class="p-0 m-0">Commit</p>
                        </button>
                        <button
                            type="submit"
                            class="btn btn-primary btn-success float-right d-flex justify-content-center align-content-center mr-2">
                            <i class="mdi mdi-content-save"></i>
                            <p class="p-0 m-0">Zapisz</p>
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('javascripts')
    @parent
    <script src="{{ mix('/vendor/js/BladeEditorModule.js', '') }}"></script>
@endsection
