<div class="modal fade" id="edit{{ $star->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit the  star</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Star.update', 'test') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">Fullname </label>
                    <input type="text" name="name" value="{{$star->name}}" class="form-control"  autofocus>
                    <input type="hidden" name="id" value="{{$star->id}}" class="form-control"  autofocus>
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description"  class="form-control" cols="30" rows="10" >{{$star->description}}</textarea>
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">Image:</label>
                     {{-- <input type="file" name="image" class="form-control" placeholder="image"> --}}
                     <div class="col-md-11 mg-t-5 mg-md-t-0">
                        <input type="file" accept="image/*"  name="image" >
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



