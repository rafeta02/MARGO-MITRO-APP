@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.salesperson.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.salespeople.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.salesperson.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesperson.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="area_pemasarans">{{ trans('cruds.salesperson.fields.area_pemasaran') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="area_pemasarans[]" id="area_pemasarans" multiple>
                                @foreach($area_pemasarans as $id => $area_pemasaran)
                                    <option value="{{ $id }}" {{ in_array($id, old('area_pemasarans', [])) ? 'selected' : '' }}>{{ $area_pemasaran }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area_pemasarans'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('area_pemasarans') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesperson.fields.area_pemasaran_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="foto">{{ trans('cruds.salesperson.fields.foto') }}</label>
                            <div class="needsclick dropzone" id="foto-dropzone">
                            </div>
                            @if($errors->has('foto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('foto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesperson.fields.foto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('frontend.salespeople.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($salesperson) && $salesperson->foto)
      var file = {!! json_encode($salesperson->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection