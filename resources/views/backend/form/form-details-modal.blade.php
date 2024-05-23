<div id="formDetailsModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Applications İnformation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="fs-15">
                    <!-- Striped Rows -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Data</th>
                        </thead>
                        <tbody>
                        @foreach($data as $datas)
                            <tr>
                                <td class="text-danger">Application No</td>
                                <td>asdasdas</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </h5>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
