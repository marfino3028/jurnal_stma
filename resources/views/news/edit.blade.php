<form method="POST" action="{{route('news.edit',$edit->id)}}"
    enctype="multipart/form-data" class="form">
    @csrf
    @method('PUT')
    <h2>Edit Berita</h2>
    



  <button name="proses" type="submit" value="ubah">Ubah</button>
  <a href="{{route('news.index')}}" class="btn btn-danger" data-dismiss="modal">Back</a>

  </form>