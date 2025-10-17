@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Latest Course By Category</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.latest-courses.store') }}"
            method="post"
          >
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                 <label class="form-label" for="#">Category 1</label>
                  <select
                    class="tom-select"
                    name="category_1"
                    type="text"
                  >
                    <option value=""> Please Select </option>
                    @foreach ($categories as $category)
                      @if ($category->subCategories->isNotEmpty())
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @selected($latestCourseSection?->category_1 == $subCategory->id)>
                              {{ $subCategory->name }}</option>
                          @endforeach
                        </optgroup>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-3">
                 <label class="form-label" for="#">Category 2</label>
                  <select
                    class="tom-select"
                    name="category_2"
                    type="text"
                  >
                    <option value=""> Please Select </option>
                    @foreach ($categories as $category)
                      @if ($category->subCategories->isNotEmpty())
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @selected($latestCourseSection?->category_2 == $subCategory->id)>
                              {{ $subCategory->name }}</option>
                          @endforeach
                        </optgroup>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-3">
                 <label class="form-label" for="#">Category 3</label>
                  <select
                    class="tom-select"
                    name="category_3"
                    type="text"
                  >
                    <option value=""> Please Select </option>
                    @foreach ($categories as $category)
                      @if ($category->subCategories->isNotEmpty())
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @selected($latestCourseSection?->category_3 == $subCategory->id)>
                              {{ $subCategory->name }}</option>
                          @endforeach
                        </optgroup>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-3">
                 <label class="form-label" for="#">Category 4</label>
                  <select
                    class="tom-select"
                    name="category_4"
                    type="text"
                  >
                    <option value=""> Please Select </option>
                    @foreach ($categories as $category)
                      @if ($category->subCategories->isNotEmpty())
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @selected($latestCourseSection?->category_4 == $subCategory->id)>
                              {{ $subCategory->name }}</option>
                          @endforeach
                        </optgroup>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-3">
                 <label class="form-label" for="#">Category 5</label>
                  <select
                    class="tom-select"
                    name="category_5"
                    type="text"
                  >
                    <option value=""> Please Select </option>
                    @foreach ($categories as $category)
                      @if ($category->subCategories->isNotEmpty())
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" @selected($latestCourseSection?->category_5 == $subCategory->id)>
                              {{ $subCategory->name }}</option>
                          @endforeach
                        </optgroup>
                      @endif
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn" type="reset">
                Reset
              </button>
              <button class="btn btn-primary" type="submit">
                <i class="ti ti-device-floppy me-2" style="font-size: 20px;"></i>
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
