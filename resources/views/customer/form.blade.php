@extends('layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">

        <form action="{{ $data ? route('update-customer', $data->id) : route('store-customer') }}" method="POST"
            enctype="multipart/form-data">
            @if ($data)
                @method('put')
            @endif
            @csrf
            <h1>Mempelai pria</h1>
            <div class="container-lg">
                <div class="mb-3">
                    @if ($data)
                        <img src="{{ asset('storage/' . $data->man_img) }}" alt="foto pria" width="200px">
                    @endif
                    <div>
                        <label class="form-label" for="manImg">Foto sendiri mempelai pria</label>
                        <input class="form-control" id="manImg" type="file" name="manImg">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="manFullName" class="form-label">Nama lengkap mempelai pria</label>
                    <input type="text" class="form-control" id="manFullName" name="manFullName"
                        placeholder="Nama lengkap" value="{{ $data ? $data->fullname_man : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="manCallName" class="form-label">Nama panggilan mempelai pria</label>
                    <input type="text" class="form-control" id="manCallName" name="manCallName"
                        placeholder="Nama panggilan" value="{{ $data ? $data->callname_man : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="manOrder" class="form-label">Anak ke</label>
                    <input type="text" class="form-control" id="manOrder" name="manOrder"
                        placeholder="Pertama/Kedua/Bungsu/Tunggal" value="{{ $data ? $data->order_man : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="manFatherName" class="form-label">Nama Ayah mempelai pria</label>
                    <input type="text" class="form-control" id="manFatherName" name="manFatherName"
                        placeholder="Nama Ayah" value="{{ $data ? $data->fathername_man : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="manMotherName" class="form-label">Nama Ibu mempelai pria</label>
                    <input type="text" class="form-control" id="manMotherName" name="manMotherName"
                        placeholder="Nama Ibu" value="{{ $data ? $data->mothername_man : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="manBank" class="form-label">Pilih bank (Opsional)</label>
                    <select class="form-select" aria-label="Default select example" id="manBank" name="manBank">
                        @if ($data && $data->bank)
                            <option value={{ $data->bank->id }}>{{ $data->bank->name }}</option>
                        @endif
                        <option value='0'>Pilih bank</option>
                        @foreach ($bank as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="manRek" class="form-label">No Rekening mempelai pria (Opsional)</label>
                    <input type="text" class="form-control" id="manRek" placeholder="No rekening" name="manRek"
                        value="{{ $data ? $data->man_rek : '' }}">
                </div>
            </div>

            <h1>Mempelai wanita</h1>
            <div class="container-lg">
                <div class="mb-3">
                    @if ($data)
                        <img src="{{ asset('storage/' . $data->woman_img) }}" alt="foto pria" width="200px">
                    @endif
                    <div>
                        <label class="form-label" for="womanImg">Foto sendiri mempelai wanita</label>
                        <input class="form-control" id="womanImg" type="file" name="womanImg">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="womanFullName" class="form-label">Nama lengkap mempelai wanita</label>
                    <input type="text" class="form-control" id="womanFullName" placeholder="Nama lengkap"
                        name="womanFullName" value="{{ $data ? $data->fullname_woman : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="womanCallName" class="form-label">Nama panggilan mempelai wanita</label>
                    <input type="text" class="form-control" id="womanCallName" placeholder="Nama panggilan"
                        name="womanCallName" value="{{ $data ? $data->callname_woman : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="womanOrder" class="form-label">Anak ke</label>
                    <input type="text" class="form-control" id="womanOrder"
                        placeholder="Pertama/Kedua/Bungsu/Tunggal" name="womanOrder"
                        value="{{ $data ? $data->order_woman : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="womanFatherName" class="form-label">Nama Ayah mempelai wanita</label>
                    <input type="text" class="form-control" id="womanFatherName" placeholder="Nama Ayah"
                        name="womanFatherName" value="{{ $data ? $data->fathername_woman : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="womanMotherName" class="form-label">Nama Ibu mempelai wanita</label>
                    <input type="text" class="form-control" id="womanMotherName" placeholder="Nama Ibu"
                        name="womanMotherName" value="{{ $data ? $data->mothername_woman : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="womanBank" class="form-label">Pilih bank (Opsional)</label>
                    <select class="form-select" aria-label="Default select example" name="womanBank">
                        @if ($data && $data->bank2)
                            <option value={{ $data->bank2->id }}>{{ $data->bank2->name }}</option>
                        @endif
                        <option value='0'>Pilih bank</option>
                        @foreach ($bank as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="womanRek" class="form-label">No Rekening mempelai wanita (Opsional)</label>
                    <input type="text" class="form-control" id="womanRek" placeholder="No rekening" name="womanRek"
                        value="{{ $data ? $data->woman_rek : '' }}">
                </div>
            </div>

            <h1>Pasangan</h1>
            <div class="container-lg">
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="theme">
                        @if ($data)
                            <option value={{ $data->theme->id }}>{{ $data->theme->name }}</option>
                        @endif
                        @foreach ($theme as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pathname" class="form-label">URL</label>
                    <input type="text" class="form-control" id="path" placeholder="URL" name="path"
                        value="{{ $data ? $data->path : '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="song" class="form-label">Lagu (Opsional)</label>
                    <input type="text" class="form-control" id="song" placeholder="Input Youtube ID" name="song"
                        value="{{ $data ? $data->song : '' }}">
                </div>
                <div class="mb-3">
                    @if ($data)
                        <img src="{{ asset('storage/' . $data->couple_img) }}" alt="foto pasangan" width="200px">
                    @endif
                    <div>
                        <label class="form-label" for="coupleImg">Foto pasangan</label>
                        <input class="form-control" id="coupleImg" type="file" name="coupleImg">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="akadDate">Tanggal dan jam akad</label>
                    <input class="form-control" id="akadDate" type="datetime-local" name="akadDate"
                        value="{{ $data ? $data->akad_date : '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="akadAddress">Alamat akad</label>
                    <textarea class="form-control" id="akadAddress" rows="3" name="akadAddress" required>{{ $data ? $data->akad_address : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="akadAddressLink" class="form-label">Link google maps akad</label>
                    <input type="text" class="form-control" id="akadAddressLink" placeholder="Link google maps"
                        name="akadAddressLink" value="{{ $data ? $data->link_akad_address : '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="resepsiDate">Tanggal dan jam resepsi</label>
                    <input class="form-control" id="resepsiDate" type="datetime-local" name="resepsiDate"
                        value="{{ $data ? $data->resepsi_date : '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="resepsiAddress">Alamat resepsi</label>
                    <textarea class="form-control" id="resepsiAddress" rows="3" name="resepsiAddress" required>{{ $data ? $data->resepsi_address : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="resepsiAddressLink" class="form-label">Link google maps resepsi</label>
                    <input type="text" class="form-control" id="resepsiAddressLink" placeholder="Link google maps"
                        name="resepsiAddressLink" value="{{ $data ? $data->link_resepsi_address : '' }}" required>
                </div>
                <div class="mb-3">
                    @if ($data)
                        @foreach ($data->gallery as $gallery)
                            <img src="{{ asset('storage/' . $gallery->img) }}" alt={{ 'foto' }} width="200px"
                                class="m-2">
                        @endforeach
                    @endif
                    <div>
                        <label class="form-label" for="gallery">Foto untuk gallery</label>
                        <input class="form-control" id="gallery" type="file" multiple="" name="gallery[]">
                    </div>
                </div>
                <div class="mb-3" id="stories">
                    <header>
                        <span class="h4">Stories (Opsional)</span>
                        <button type="button" id="add-field" class="btn btn-dark">+</button>
                    </header>
                    @if ($data && count($data->stories) > 0)
                        @foreach ($data->stories as $key => $item)
                            <div class="mb-3 add-form-input">
                                <h6>Story<span class="mx-1">{{ $key + 1 }}</span>
                                    @if ($key > 0)
                                        <button type="button" class="remove-input-field btn btn-danger m">X</button>
                                    @endif
                                </h6>
                                <label class="form-label" for="dateStory">Waktu</label>
                                <input class="form-control mb-3" id="dateStory" type="datetime-local"
                                    name="dateStory[]" value="{{ $item->date }}">
                                <label class="form-label" for="titleStory">Judul</label>
                                <input type="text" class="form-control mb-2" id="titleStory" placeholder="judul cerita"
                                    name="titleStory[]" value="{{ $item->title }}">
                                <label class="form-label" for="bodyStory">Cerita</label>
                                <input type="text" class="form-control" id="bodyStory" placeholder="Isi cerita"
                                    name="bodyStory[]" value="{{ $item->body }}">
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3 add-form-input">
                            <h6>Story<span>1</span></h6>
                            <label class="form-label" for="date">Waktu</label>
                            <input class="form-control mb-3" id="dateStory" type="datetime-local" name="dateStory[]">
                            <label class="form-label" for="titleStory">Judul</label>
                            <input type="text" class="form-control mb-2" id="titleStory" placeholder="Judul cerita"
                                name="titleStory[]">
                            <label class="form-label" for="bodyStory">Cerita</label>
                            <input type="text" class="form-control" id="bodyStory" placeholder="Isi cerita"
                                name="bodyStory[]">
                        </div>
                    @endif
                </div>
            </div>

            <div class="container-lg">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('customer') }}" class="btn btn-secondary">Batal</a>
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
