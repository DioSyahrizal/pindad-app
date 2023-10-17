<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">MU5-TJ</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="/5mm/mu5tj/longsong/hb-1/create" class="btn btn-primary">Create</a>
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
                                    {{--                                    <th scope="col">No.</th>--}}
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Lini</th>
                                    <th scope="col">No. Lot</th>
                                    <th scope="col">Hasil</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Inspektur</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                @foreach($data as $child)--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th scope="row">{{$loop->iteration}}</th>--}}
                                {{--                                        <td>{{$child->tanggal_create->format('d/m/Y')}}</td>--}}
                                {{--                                        <td>{{$child->kodeLini->nama}}</td>--}}
                                {{--                                        <td>--}}
                                {{--                                            <a href="/5mm/mu5tj/longsong/hb-1/{{$child->id}}/detail">{{$child->no_lot}}</a>--}}
                                {{--                                        </td>--}}
                                {{--                                        <td>--}}
                                {{--                                            <x-mu5tj-pill-status :mato="$child->mato" :status="$child->status"/>--}}
                                {{--                                        </td>--}}
                                {{--                                        <td>{{$child->status_bakar}}</td>--}}
                                {{--                                        <td>{{$child->user->codename}}</td>--}}

                                {{--                                    </tr>--}}
                                {{--                                @endforeach--}}
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
                ajax: {
                    url: '/5mm/mu5tj/longsong/hb-1/table',
                    type: 'GET',
                    dataSrc: ''
                },
                columnDefs: [
                    {
                        targets: 0,
                        data: "tanggal_create",
                        render: function (data) {
                            const format = new Intl.DateTimeFormat('id', {dateStyle: 'medium'})
                            return format.format(new Date(data))
                        }
                    },
                    {
                        targets: 1,
                        data: "kode_lini",
                        render: function (data) {
                            return data.nama;
                        }
                    },
                    {
                        targets: 2,
                        data: null,
                        render: function (data) {
                            return `<a href="/5mm/mu5tj/longsong/hb-1/${data.id}/detail">${data.no_lot}</a>`;
                        }
                    },
                    {
                        targets: 3,
                        data: null,
                        render: function (data) {
                            return `<span class="badge ${data.mato === 1 ? 'badge-primary' : 'badge-danger'}">${data.status}</span>`;
                        }
                    },
                    {
                        targets: 4,
                        data: 'status_bakar',
                    },
                    {
                        targets: 5,
                        data: null,
                        render: function (data) {
                            return data.user.codename;
                        }
                    },
                ]
            });
        });
    </script>
</x-layout>
