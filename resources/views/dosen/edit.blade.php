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
                <strong class="card-title">Edit Data</strong>
            </div>
            <!-- Credit Card -->
            <div class="card-body">
                @foreach($dosen as $item)
                <form action="{{ route('dosen.update',$item->nid) }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="nid" class="control-label mb-1">NID</label>
                            <input type="text" name="nid" id="nid" placeholder="nid" required
                                class="form-control form-control-sm" value="{{ $item->nid }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama" class="control-label mb-1">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="nama" required
                                class="form-control form-control-sm" value="{{  $item->nama  }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password" class="control-label mb-1">Password</label>
                            <input type="text" name="password" id="password" placeholder="password" required
                                class="form-control form-control-sm" value="{{  $item->password }}">
                        </div>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                            Simpan
                        </button>
                        <a id="payment-button" href="{{ route('dosen.index') }}" class="btn btn-danger ">
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
