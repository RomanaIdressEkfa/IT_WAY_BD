@extends("backend.master")
@section("content_page")
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rGObF6jz9ATKxIep9tiCxS/Z9fNfexbBH8qO2ms2hJSg9uBoFv06C6uKfr5ccFQ8"
                crossorigin="anonymous">
            <title>Add Skill</title>
        </head>

        <body>

            <div class="container border border-light shadow p-4 rounded">
                <h3 class=" text-primary mb-4 text-center" style='font-weight:bold'>ADD SKILL</h3>
                <form action="{{ route("skill_details_store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="employee_id">
                                    <option selected>Employee Name:</option>
                                   @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="skill" class="form-label">Skill</label>
                                <input type="text" class="form-control" id="skill" name="skill" placeholder="Enter your skill">
                                @if ($errors->has("skill"))
                                    <p class="text-danger">{{ $errors->first("skill") }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mb-3 ">Submit</button>
            </div>

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
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            var formData = new FormData(this); // Create FormData object to send form data

            $.ajax({
                url: $(this).attr('action'), // Get the form action attribute for the URL
                type: $(this).attr('method'), // Get the form method attribute (POST in this case)
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response here
                    console.log(response);
                    // Optionally, you can redirect to another page or perform any other action on success
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection
