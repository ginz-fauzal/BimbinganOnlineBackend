@extends('dashboard')

@section('content')

<!-- Peta -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Dosen</h4>
                <p><a href="{{ route('dosen.create') }}"><button class="btn-success"> Tambah Data </button></a></p>
                            
            </div>
            <div class="row">
                <div class="col-lg-11">
                    <div class="card-body">
                        <div class="peta" style="overflow-x:auto;">
                            <table id='myTable' class="table table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NID</th>
                                        <th>Nama</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->nid }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>
                                        <a href="{{ route('dosen.edit', $item->nid) }}"><button class="btn-info">Edit</button></a>
                                        <a href="{{ route('dosen.destroy', $item->nid) }}"><button class="btn-danger">Hapus</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div>
    </div><!-- /# column -->
</div>
<!--  end Peta -->

@endsection
