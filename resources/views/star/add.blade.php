<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a star</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Star.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">Fullname</label>
                    <input type="text" name="name" class="form-control"  autofocus>
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" ></textarea>
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">Image:</label>
                     {{-- <input type="file" name="image" class="form-control" placeholder="image"> --}}
                     <div class="col-md-11 mg-t-5 mg-md-t-0">
                        <input type="file" accept="image/*" name="image" onchange="loadFile(event)">
                        <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('extrajs')
<script>

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    }
</script>
@stop
