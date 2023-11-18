<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0">MU5-TJ HB-1</h1>
                </div>
                <div class="col-6">
                    <div class="float-right">
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

                            <form action="/5mm/mu5tj/longsong/hb-1" method="GET">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                           value="{{ $search }}" name="search"
                                           placeholder="Search by No. Lot"
                                           aria-describedby="inputGroup-sizing-default">
                                </div>
                            </form>
                            <table id="myTable" class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Lini</th>
                                    <th scope="col">No. Lot</th>
                                    <th scope="col">Hasil</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Inspektur</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $child )
                                    <tr class="{{$child-> status != 'PASSED' ? 'column-invalid' : ''}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $child->tanggal_create->format('d/m/Y') }}</td>
                                        <td>{{ $child->kodeLini->nama }}</td>
                                        <td><a href="/5mm/mu5tj/longsong/hb-1/{{ $child->id }}/detail">{{ $child->no_lot
                                                }}</a></td>
                                        {{--                                        <td><span--}}
                                        {{--                                                class="badge {{ $child->mato === 1 ? 'badge-primary' : 'badge-danger' }}">{{--}}
                                        {{--                                                $child->status }}</span></td>--}}
                                        <td class="{{$child->status == 'PASSED' ? '!bg-green-400' : '!bg-red-400 text-white'}}">
                                            {{$child->status}}
                                        </td>
                                        <td>{{ $child->status_bakar }}</td>
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
                dom: 'Brt',
                responsive: true,
                // ajax: {
                //     url: '/5mm/mu5tj/longsong/hb-1/table',
                //     type: 'GET',
                // },
                // columnDefs: [
                //     {
                //         targets: 0,
                //         data: "tanggal_create",
                //         render: function (data) {
                //             const format = new Intl.DateTimeFormat('id', {dateStyle: 'medium'})
                //             return format.format(new Date(data))
                //         }
                //     },
                //     {
                //         orderable: false,
                //         targets: 1,
                //         data: "kode_lini",
                //         render: function (data) {
                //             return data.nama;
                //         }
                //     },
                //     {
                //         orderable: false,
                //         targets: 2,
                //         data: null,
                //         render: function (data) {
                //             return `<a href="/5mm/mu5tj/longsong/hb-1/${data.id}/detail">${data.no_lot}</a>`;
                //         }
                //     },
                //     {
                //         targets: 3,
                //         data: null,
                //         render: function (data) {
                //             return `<span class="badge ${data.mato === 1 ? 'badge-primary' : 'badge-danger'}">${data.status}</span>`;
                //         }
                //     },
                //     {
                //         targets: 4,
                //         data: 'status_bakar',
                //     },
                //     {
                //         targets: 5,
                //         data: null,
                //         render: function (data) {
                //             return data.user.codename;
                //         }
                //     },
                // ],
            });
        });
    </script>
</x-layout>
