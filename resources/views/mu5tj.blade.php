<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">MU5-TJ</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="/mu5tj/create" class="btn btn-primary">Create</a>
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
                                    <th scope="col">No. Lot</th>
                                    <th scope="col">Kode Lini</th>
                                    <th scope="col">Kode Mesin Bakar</th>
                                    <th scope="col">Temperature</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $child)
                                    <tr>
                                        <td><a href="/mu5tj/{{$child->id}}/dimensi">{{$child->no_lot}}</a></td>
                                        <td>{{$child->kode_lini}}</td>
                                        <td>{{$child->kode_mesin_bakar}}</td>
                                        <td>{{$child->temperature}}</td>
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
    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('#myTable').DataTable();--}}
    {{--        });--}}
    {{--    </script>--}}
</x-layout>
