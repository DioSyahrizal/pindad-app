<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">MU5-TJ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">MU5-TJ</li>
                    </ol>
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
                            <table id="myTable" class="table">
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
                                        <td>{{$child->no_lot}}</td>
                                        <td>{{$child->kode_lini}}</td>
                                        <td>{{$child->kode_mesin_bakar}}</td>
                                        <td>{{$child->temperature}}</td>
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
            console.log("masuk pak e")
            $('#myTable').DataTable();
        });

    </script>
</x-layout>
