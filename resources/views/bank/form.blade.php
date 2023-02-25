@extends('layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">

        <form action="{{ $data ? route('update-bank', $data->id) : route('store-bank') }}" method="POST"
            enctype="multipart/form-data">
            @if ($data)
                @method('put')
            @endif
            @csrf
            <h1>Bank</h1>
            <div class="container-lg">
                <div class="mb-3">
                    @if ($data)
                        <img src="{{ asset('storage/' . $data->logo) }}" alt="logo bank" width="200px">
                    @endif
                    <div>
                        <label class="form-label" for="logoBank">Logo bank</label>
                        <input class="form-control" id="logoBank" type="file" name="logoBank">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nameBank" class="form-label">Nama bank</label>
                    <input type="text" class="form-control" id="nameBank" name="nameBank"
                        placeholder="Nama bank" value="{{ $data ? $data->name : '' }}">
                </div>

                <div class="container-lg">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('bank') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        var i = parseInt($('#stories div h6 span:last').text());
        $("#add-field").click(function() {
            ++i;
            $("#stories").append(
                '<div class="mb-3 add-form-input"><h6 class="d-inline">Story ' + i +
                '<button type="button" class="remove-input-field btn btn-danger m">X</button></h6><label class="form-label d-block" for="date">Waktu</label><input class="form-control mb-3" id="dateStory" type="datetime-local" name="dateStory[]"><label class="form-label d-block" for="titleStory">Judul</label><input type="text" class="form-control mb-2" id="titleStory" placeholder="Judul cerita"name="titleStory[]"><label class="form-label" for="bodyStory">Cerita</label><input type="text" class="form-control" id="bodyStory" placeholder="Isi cerita" name="bodyStory[]"></div>');
        });

        $(document).on('click', '.remove-input-field', function() {
            --i;
            $(this).parents('.add-form-input').remove();
        });

        $(".remove-input-field").on("click", function() {
            var id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: "{{ route('delete-story') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(result) {
                    $(this).parents('.add-form-input').remove();
                    alert(data.success);
                }
            });
        });
    </script>
@endsection
