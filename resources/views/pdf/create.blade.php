@extends('app')

@section('title','PDF')

@section('content')

<form action="{{route('pdf.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="pdfName">Name</label>
                <input type="text" name="pdfName" id="pdfName" class="form-control" required>
                @error('pdfName')
                    {{$message}}
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
                @error('title')
                    {{$message}}
                @enderror
            </div>
        </div>
        
        <div class="col-12">
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required>
                </textarea>
                @error('content')
                    {{$message}}
                @enderror
            </div>
        </div>

        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Generate PDF">
        </div>
    </div>
</form>

@endsection

@push('script')
    {{-- <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
