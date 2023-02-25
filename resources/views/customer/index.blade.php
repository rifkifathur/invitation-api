@extends('layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <a href="{{ route('create-customer') }}" class="btn btn-primary mb-4">Tambah data</a>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->path }}</td>
                            <td>
                                <span>
                                    <a href="http://" class="btn text-light">
                                        <svg class="nav-icon" width="18px" height="18px">
                                            <use
                                                xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}">
                                            </use>
                                        </svg>
                                    </a>
                                </span>
                                <span>
                                    <a href="{{ route('edit-customer', $item->id) }}" class="btn text-info">
                                        <svg class="nav-icon" width="18px" height="18px">
                                            <use
                                                xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}">
                                            </use>
                                        </svg>
                                    </a>
                                </span>
                                <span>
                                    <form action="{{ route('destroy-customer', $item->id) }}" method="POST"
                                        accept-charset="utf-8" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger">
                                            <svg class="nav-icon" width="18px" height="18px">
                                                <use
                                                    xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-trash') }}">
                                                </use>
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
