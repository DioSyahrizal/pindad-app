<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0">MU5-TJ Dimensi</h1>
                </div>
                <div class="col-6">
                    <div class="float-right">
                        <a href="/5mm/mu5tj/longsong/dimensi/create" class="btn btn-primary">Create</a>
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
                            <table id="myTable" class="table display table-responsive-md nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Lini</th>
                                    <th scope="col">No. Lot</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Inspektur</th>
                                    <th scope="col" class="none">P Status</th>
                                    <th scope="col" class="none">P Result</th>
                                    <th scope="col" class="none">DD Status</th>
                                    <th scope="col" class="none">DD Result</th>
                                    <th scope="col" class="none">DLA Status</th>
                                    <th scope="col" class="none">DLA Result</th>
                                    <th scope="col" class="none">DMD Status</th>
                                    <th scope="col" class="none">DMD Result</th>
                                    <th scope="col" class="none">MB Status</th>
                                    <th scope="col" class="none">MB Result</th>
                                    <th scope="col" class="none">DLP Status</th>
                                    <th scope="col" class="none">DLP Result</th>
                                    <th scope="col" class="none">DML Status</th>
                                    <th scope="col" class="none">DML Result</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $child)
                                    <tr class="{{$child-> status != 'Terima' ? 'column-invalid' : ''}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $child->tanggal_create->format('d/m/Y') }}</td>
                                        <td>{{ $child->kodeLini->nama }}</td>
                                        <td><a href="/5mm/mu5tj/longsong/dimensi/{{ $child->id }}/detail">{{ $child->no_lot
                                                }}</a>
                                        </td>
                                        <td class="{{$child->status == 'Tolak' ? '!bg-red-400' : '!bg-green-400' }} text-white">{{$child->status}}</td>
                                        <td>{{$child->user->codename}}</td>
                                        <td>{{$child->p_status}}</td>
                                        <td>{{$child->p_result}}</td>
                                        <td>{{$child->dd_status}}</td>
                                        <td>{{$child->dd_result}}</td>
                                        <td>{{$child->dla_status}}</td>
                                        <td>{{$child->dla_result}}</td>
                                        <td>{{$child->dmd_status}}</td>
                                        <td>{{$child->dmd_result}}</td>
                                        <td>{{$child->mb_status}}</td>
                                        <td>{{$child->mb_result}}</td>
                                        <td>{{$child->dlp_status}}</td>
                                        <td>{{$child->dlp_result}}</td>
                                        <td>{{$child->dml_status}}</td>
                                        <td>{{$child->dml_result}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            let table =
                new DataTable('#myTable', {
                    responsive: true,
                    dom: 'Bfrt',
                    "pageLength": 10,
                });


        });
    </script>
</x-layout>
