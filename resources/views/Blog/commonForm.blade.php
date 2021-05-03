<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <p>Title</p>
            <label for="t-text" class="sr-only">{{ $postType->title }} Title</label>
            <input id="post_title" value="{{ old('title') }}" type="text" name="title" placeholder="{{ $postType->title }} Title..." class="form-control" required>
        </div>




        @if($postType->editor == 1)
            <div class="form-group">
                <p> Description</p>
                <textarea name="description" rows="10" cols="100">{{ old('description') }}</textarea>
            </div>
        @endif

    </div>
    <div class="col-md-4">
        <div class="form-group">
            <p> Status</p>
            <label for="t-text" class="sr-only">Status</label>
            <select class="form-control  basic" name="status">
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
            </select>
        </div>

        @if($postType->feature_image == 1)
        <div class="form-group mt-3">
            <p>Feature Image</p>
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
        </div>


        @endif


        <input type="submit" name="txt" class="mt-4 btn btn-primary float-right">
    </div>
</div>

<hr>
@if($postType->feature_image == 1)
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <p>Image Alt Text</p>
            <label for="t-text" class="sr-only">Image Alt Text</label>
            <input id="alt_txt" value="" type="text" name="img_alt" placeholder="Image Alt Text" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <p>Image Title</p>
            <label for="t-text" class="sr-only">Image Title</label>
            <input id="img_title" value="" type="text" name="img_title" placeholder="Image Title" class="form-control">
        </div>
    </div>
</div>
    @endif

<div class="form-group">
    <p>Meta Keywords Or Tags</p>
    <label for="t-text" class="sr-only">Meta Keywords Or Tags</label>
    <select class="form-control tagging" multiple="multiple" name="meta_keyword[]">
        {{-- @foreach($keywords as $keyword)
        <option value="{{ $keyword }}">{{ $keyword }}</option>
       @endforeach --}}
    </select>
</div>

<div class="form-group">
    <p>Meta Description</p>
    <textarea name="meta_description"></textarea>
</div>
