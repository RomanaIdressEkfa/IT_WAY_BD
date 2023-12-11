@extends("backend.layouts.master")
@section("content_page")
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rGObF6jz9ATKxIep9tiCxS/Z9fNfexbBH8qO2ms2hJSg9uBoFv06C6uKfr5ccFQ8"
                crossorigin="anonymous">
            <title>Edit Employee</title>
        </head>

        <body>

            <div class="container border border-light shadow mt-2 rounded p-4">
                <h3 class=" text-primary mb-4 text-center" style='font-weight:bold'>EDIT EMPLOYEE</h3>

                <form action="{{ route("skill_details_update", $skill->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="skill" class="form-label">Skill</label>
                                <input type="text" class="form-control" id="skill" value="{{$skill->skill}}" name="skill" placeholder="Enter your skill">
                                @if ($errors->has("skill"))
                                    <p class="text-danger">{{ $errors->first("skill") }}</p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-e5STZUs8i4MKQE6P/wxBXzquZq1TsLFtrGBsH75qbyIbbV9EP5C7nyFOy2u7b3jF" crossorigin="anonymous">
            </script>
        </body>

    </html>
    <script>
        document.getElementById('image').addEventListener('change', function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Update the src attribute of the image element to show the preview
                    document.getElementById('imagePreview').src = e.target.result;
                    // Show the image preview
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('imagePreviewDiv').style.display = 'block';
                    document.getElementById('currentImageDiv').style.display = 'none';
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
