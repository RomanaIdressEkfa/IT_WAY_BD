@extends("backend.master")
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

                <form action="{{ route("employee_details_update", $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ $employee->name }}" class="form-control" id="name" name="name" placeholder="Enter your name">
                                @if ($errors->has("name"))
                                    <p class="text-danger">{{ $errors->first("name") }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" value="{{ $employee->email }}" class="form-control" id="email" name="email" placeholder="name@example.com">
                                @if ($errors->has("email"))
                                    <p class="text-danger">{{ $errors->first("email") }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" value="{{ $employee->phone_number }}" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number">
                                @if ($errors->has("phone_number"))
                                    <p class="text-danger">{{ $errors->first("phone_number") }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label ">Image:</label>
                                {{-- @if (isset($employee->image) && !empty($employee->image)) --}}
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($errors->has("image"))
                                    <p class="text-danger">{{ $errors->first("image") }}</p>
                                @endif
                                {{-- @endif --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your address">{{ $employee->address }}</textarea>
                                @if ($errors->has("address"))
                                    <p class="text-danger">{{ $errors->first("address") }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">

                            {{-- current image --}}
                            <div class="mb-3" id='currentImageDiv'>
                                <label>Current Image:</label> <br>
                                {{-- @if (isset($employee->image) && !empty($employee->image)) --}}
                                <img class="border border-1 rounded" style="width:100px;" src="{{ asset("images/employees/" . $employee->image) }}" alt="{{ $employee->name }}">
                                {{-- @endif --}}
                            </div>
                            {{-- uploaded image --}}
                            <div class="mb-3" id='imagePreviewDiv' style='display:none'>
                                <label>Uploaded Image:</label> <br>
                                {{-- @if (isset($employee->image) && !empty($employee->image)) --}}
                                <img id="imagePreview" class="border border-1 rounded" src="#" alt="Image Preview" style="display: none;width:100px;">
                                {{-- @endif --}}

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
