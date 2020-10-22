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
<script language="javascript">
    function tambahHobi() {
        var idf = document.getElementById("idf").value;
        var stre;
        stre = "<div class='row' id='srow" + idf + "'><div class='form-group col-md-3'><label for='nid' class='control-label mb-1'>NID</label><input type='text' name='nid[]' id='nid' placeholder='nid' required class='form-control form-control-sm' value='{{ old('nid') }}'></div><div class='form-group col-md-3'><label for='nama' class='control-label mb-1'>Nama</label><input type='text' name='nama[]' id='nama' placeholder='nama' required class='form-control form-control-sm' value='{{ old('nama') }}'></div><div class='form-group col-md-3'><label for='password' class='control-label mb-1'>Password</label><input type='text' name='password[]' id='password' placeholder='password' required class='form-control form-control-sm' value='{{ old('password') }}'></div><div class='form-group col-md-1'><center><a href='#' class='btn-danger form-control' style='margin-top:28px' onclick='hapusElemen(\"#srow" +idf + "\"); return false;'>-</a></center></div></div>";
        $("#divHobi").append(stre);
        idf = (idf - 1) + 2;
        document.getElementById("idf").value = idf;
    }

    function hapusElemen(idf) {
        $(idf).remove();
    }

</script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Data</strong>
            </div>
            <!-- Credit Card -->
            <div class="card-body">
                <form action="{{ route('dosen.store') }}" method="post">
                    @csrf

                    <input id="idf" value="1" type="hidden" />
                    <div class="row">
                        
                        <div class="form-group col-md-3">
                            <label for="nid" class="control-label mb-1">NID</label>
                            <input type="text" name="nid[]" id="nid" placeholder="nid" required
                                class="form-control form-control-sm" value="{{ old('nid') }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama" class="control-label mb-1">Nama</label>
                            <input type="text" name="nama[]" id="nama" placeholder="nama" required
                                class="form-control form-control-sm" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password" class="control-label mb-1">Password</label>
                            <input type="text" name="password[]" id="password" placeholder="password" required
                                class="form-control form-control-sm" value="{{ old('password') }}">
                        </div>

                        <div class="form-group col-md-1">
                        <center>
                            <label style="margin-top:28px;" class="btn-success form-control"
                                onclick="tambahHobi(); return false;">+</label>
                        </center>
                        </div>
                    </div>
                    <div id="divHobi"></div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                            Tambah
                        </button>
                        <a id="payment-button" href="javascript:history.back()" class="btn btn-danger ">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- .card -->
    </div>
    <!--/.col-->
</div>
@endsection
