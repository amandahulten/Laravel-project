@include ('header')
@include('errors')

<form action="/photos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class=" container col-md-6" style="max-height: 300px">
        <div class="form-group">
            <div class="form-group">
                <label for="image" class="form-label">Select a photo to upload:</label>
                <input class="form-control" type="file" name="image" onchange="preview()">
                <small>Max file size: 2MB.</small>
            </div>
            <div class="form-group">
                <label for="caption" class="form-label">Write a caption:</label>
                <textarea class="form-control" name="caption"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-6">Upload</button>

            </div>
        </div>
</form>
</div>
<div class="container col-md-6">
    <img id="frame" src="" class="img-fluid" style="height: 500px" />
</div>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
</script>
</div>
@include ('footer')
