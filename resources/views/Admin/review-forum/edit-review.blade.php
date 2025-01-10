@extends("Admin.layouts.app")

@section("content")

<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h3 class="page-title">{{ $title ?? '' }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('service.management') }}">
                                Review Management
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $title ?? '' }}
                        </li>
                    </ul>
                </div>
                <a href="{{ route('service.management') }}" class="btn btn-primary btn-lg btn-rounded">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card customShadow">
                    <form action="{{ route('edit.store.review',['id'=>$reviews->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <label for="" class="fw-bold">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Client Name"  value="{{ old('name',$reviews->name) }}">
                                </div>

                                <div class="col-lg-12 mb-2 form-group">
                                    <label for="" class="fw-bold">Description</label>
                                    <textarea name="review" class="form-control fw-bold" style="height: 140px !important;" placeholder="Enter a brief description of the product or service you are reviewing.">{{ $reviews->review }}</textarea>
                                </div>

                                <div class="col-lg-12 mb-3 form-group">
                                    <label for="" class="fw-bold">Socials <span class="text-danger fw-bold">(Please add the social on which you buy the product)</span></label>
                                    <div class="row">
                                        <div class="col-lg-6 mt-3">
                                            <label for="" class="fw-bold">Twitter</label>
                                            <input type="url" class="form-control fw-bold" name="twitter" id="twitter" value="{{ $reviews->twitter }}" placeholder="https://twitter.com/">
                                            <label for="" class="fw-bold">Instagram</label>
                                            <input type="url" class="form-control fw-bold" name="instagram" id="instagram" value="{{ $reviews->instagram }}" placeholder="https://www.instagram.com/">
                                            <label for="" class="fw-bold">GameJolt</label>
                                            <input type="url" class="form-control fw-bold" name="gamejolt" id="gamejolt" value="{{ $reviews->gamejolt }}" placeholder="https://gamejolt.com/">
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <label for="" class="fw-bold">Discord</label>
                                            <input type="url" class="form-control fw-bold" name="discord" id="discord" value="{{ $reviews->discord }}" placeholder="https://discord.com/">
                                            <label for="" class="fw-bold">Reddit</label>
                                            <input type="url" class="form-control fw-bold" name="reddit" id="reddit" value="{{ $reviews->reddit }}" placeholder="https://www.reddit.com/">
                                            <label for="" class="fw-bold">Tiktok</label>
                                            <input type="url" class="form-control fw-bold" name="tiktok" id="tiktok" value="{{ $reviews->tiktok }}" placeholder="https://www.tiktok.com/">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-2 form-group">
                                    <label for="" class="fw-bold">Video</label>
                                    <input type="file" name="video" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg btn-rounded" id="submitBtn" disabled>
                                    Edit Review
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const socialInputs = document.querySelectorAll('#twitter, #instagram, #gamejolt, #discord, #reddit, #tiktok');
        const submitBtn = document.getElementById('submitBtn');

        function checkIfAtLeastOneFieldFilled() {
            let isAnyFieldFilled = false;
            socialInputs.forEach(input => {
                if (input.value.trim() !== "") {
                    isAnyFieldFilled = true;
                }
            });

            submitBtn.disabled = !isAnyFieldFilled;
        }

        socialInputs.forEach(input => {
            input.addEventListener('input', checkIfAtLeastOneFieldFilled);
        });

        checkIfAtLeastOneFieldFilled();
    });
</script>
@endsection

