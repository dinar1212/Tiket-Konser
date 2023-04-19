



@extends('layouts.admin')

@section('content')

    <div class="card shadow-lg rounded card p-2">
        <div class="card-header" id="#atas">
            <span class="fs-4 fw-700">Booking Tiket</span>
            <button type="button" class="btn mb-3 btn-primary float-end" data-bs-toggle="modal" data-bs-target="#payment">
                Booking
            </button>
            @include('tiket.create')
        </div>
        <div class="table-responsive text-nowrap">
            <div class="container">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>No Telpon</th>
                            <th>Jumlah</th>
                            <th>Jenis</th>
                            <th>Kode Tiket</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-1">
                        @if (count($tikets))
                            @foreach ($tikets as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $data->nama }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $data->no_telpon }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $data->jumlah }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $data->jenis }}
                                        </div>
                                    </td>
                                    <td>{{ $data->kode_peminjam }}</td>
                            
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

