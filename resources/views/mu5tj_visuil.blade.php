<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0">MU5-TJ Visuil</h1>
                </div>
                <div class="col-6">
                    <div class="float-right">
                        <a href="/5mm/mu5tj/longsong/visuil/create" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="card">
                        <div class="card-body">
                            <table id="myTable" class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Lini</th>
                                    <th scope="col">No. Lot</th>
                                    <th scope="col">Hasil</th>
                                    <th scope="col">Inspektur</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $child )
                                    <tr class="{{$child-> status != 'Terima' ? 'column-invalid' : ''}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $child->tanggal_create->format('d/m/Y') }}</td>
                                        <td>{{ $child->kodeLini->nama }}</td>
                                        <td>{{ $child->no_lot }}</td>
                                        <td class="{{$child->status == 'Terima' ? '!bg-green-400' : ''}}">
                                            {{$child->status}}
                                        </td>
                                        <td>{{ $child->user->codename }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                dom: 'Bfrt',
                responsive: true,
                "pageLength": 10,
            });
        });
    </script>
</x-layout>
