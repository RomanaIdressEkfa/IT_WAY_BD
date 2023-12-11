@extends("backend.master")
@section("content_page")
    <div class="container border border-light shadow mt-2 rounded p-4">

        <a class="btn btn-primary btn-sm mt-2 mb-4 float-left bi bi-wallet2" href="{{ route("skill_details_index") }}">
            All Category List
        </a>
        {{-- <a target="_blank" class="btn btn-primary btn-sm mt-2 mb-2 ml-2 float-end bi bi-file-earmark-pdf-fill" href="{{ route("category_details_pdf", $category->id) }}">Export PDF</a> --}}
        <div>
            <h6 class="text-gray-500 mb-5 mt-3" style='font-weight:bold'>VIEW CATEGORY</h6>

        <h5 style="font-weight: bold">Skill:</h5>
        <p>{{ $skill->skill ?? "No Name skill" }}</p>
        </div>
    </div>
@endsection
