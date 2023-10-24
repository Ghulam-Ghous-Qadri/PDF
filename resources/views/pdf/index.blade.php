@extends('app')

@section('title','PDF')

@section('content')

<table class="table table-borderd">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Title</th>
            {{-- <th>Content</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->title}}</td>
                {{-- <td>{{strip_tags($item->content)}}</td> --}}
                <td>
                    <a href="{{route('pdf.generate',[$item->id])}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('pdf.generate',[$item->id])}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                    <a href="{{$item->id}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{$item->id}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>

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
