@extends('dashboard')
@section('content')

@if(count($errors) > 0)
<div class="row-md-5">
    <div class="alert alert-danger">
        @foreach($errors->all() as $errors)

        <li>
            <font color="red"> {{ $errors }} </font>
        </li>

        @endforeach

    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Data</strong>
            </div>
            <!-- Credit Card -->
            @foreach($data as $item)
            <div class="card-body">
                <form action="{{ route('mahasiswa.update',$item['nim']) }}" method="post">
                    @csrf

                    <input id="idf" value="1" type="hidden" />
                    <div class="row">
                        
                        <div class="form-group col-md-2">
                            <label for="nim" class="control-label mb-1">Nim</label>
                            <input type="text" name="nim" id="nim" placeholder="nim" required
                                class="form-control form-control-sm" value="{{ $item['nim'] }}">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="nama" class="control-label mb-1">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="nama" required
                                class="form-control form-control-sm" value="{{ $item['nama'] }}">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="password" class="control-label mb-1">Password</label>
                            <input type="text" name="password" id="password" placeholder="password" required
                                class="form-control form-control-sm" value="{{ $item['password'] }}">
                        </div>
                        @foreach($item['pembimbing'] as $n => $pem)
                        <div class="form-group col-md-3">
                            <label for="pembimbing{{$pem->status}}" class="control-label mb-1">Pembimbing{{$pem->status}}</label>
                            <select required class="form-control form-control-sm" name="pembimbing{{$pem->status}}">
                                
                                <option value="{{$pem->nid}}">[{{ $pem->nid }}] {{$pem->nama}}</option>
                                
                                @foreach($datas as $pilih)
                                <option value="{{ $pilih->nid }}">[{{ $pilih->nid }}] {{ $pilih->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                    </div>
                    <div id="divHobi"></div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                            Simpan
                        </button>
                        <a id="payment-button" href="javascript:history.back()" class="btn btn-danger ">
                            Kembali
                        </a>
                    </div>
                </form>
                    @endforeach
            </div>
        </div>

        <!-- .card -->
    </div>
    <!--/.col-->
</div>
@endsection
