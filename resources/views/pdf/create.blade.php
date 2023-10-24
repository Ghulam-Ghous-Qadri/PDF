@extends('app')

@section('title','PDF')

@section('content')

<div class="row">
    <div class="col-12 text-right">
        <a href="{{route('pdf.index')}}" class="btn btn-primary">Back</a>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <form action="{{route('pdf.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="pdfName">Name</label>
                        <input type="text" name="pdfName" value="{{$data['name']}}" id="pdfName" class="form-control" required>
                        @error('pdfName')
                            {{$message}}
                        @enderror
                    </div>
                </div>
        
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{$data['title']}}" class="form-control" required>
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" required>
                            {{$data['content']}}
                        </textarea>
                        @error('content')
                            {{$message}}
                        @enderror
                    </div>
                </div>
        
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button type="button" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
