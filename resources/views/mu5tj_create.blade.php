<x-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create MU5-TJ</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content row mx-1">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form>
                        <div class="mb-3">
                            <label for="no_lot" class="form-label">Nomor Lot</label>
                            <input class="form-control" id="no_lot" name="no_lot"
                                    required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_lini" class="form-label">Kode Lini</label>
                            <input class="form-control" id="kode_lini" name="kode_lini" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_mesin_bakar" class="form-label">Kode Mesin Bakar</label>
                            <input class="form-control" id="kode_mesin_bakar" name="kode_mesin_bakar" required>
                        </div>
                        <div class="mb-3">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" class="form-control" id="temperature" name="temperature" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
