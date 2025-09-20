 <form
   class="modal-content "
   action="{{ @$editMode == true
    ? route('instructor.course-content.update-lesson', $lesson->id) 
    : route('instructor.course-content.store-lesson') 
   }}"
   method="post"
 >
   @csrf
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Lesson</h5>
     <button
       class="btn-close"
       data-bs-dismiss="modal"
       type="button"
       aria-label="Close"
     ></button>
   </div>
   <div class="modal-body ">
     <div class="row">
       <input
         name="course_id"
         type="hidden"
         value="{{ $courseId }}"
       >
       <input
         name="chapter_id"
         type="hidden"
         value="{{ $chapterId }}"
       >
       <div class="col-12 add_course_basic_info">
         <div class="form-group mb-3">
           <label for="">Title</label>
           <input
             class="form-control"
             name="title"
             type="text"
             value="{{ @$lesson?->title }}"
             required
           >
         </div>
       </div>
       <div class="col-md-6">
         <div class="add_course_basic_info_imput mb-3">
           <label for="">Source</label>
           <select class="form-control select_js storage" name="source">
             <option value=""> Please Select </option>
             @foreach (config('course.video_sources') as $key => $value)
               <option value="{{ $key }}" @selected(@$lesson?->storage == $key)>{{ $value }}
               </option>
             @endforeach
           </select>
         </div>
       </div>
       <div class="col-6">
         <div class="add_course_basic_info_imput upload-source {{ @$lesson?->storage != 'upload' ? 'd-none' : "" }}">
           <label for="#">Path</label>
           <div class="input-group">
             <span class="input-group-btn">
               <a
                 class="btn btn-primary"
                 id="lfm"
                 data-input="thumbnail"
               >
                 <i class="fa fa-picture-o"></i> Choose
               </a>
             </span>
             <input
               class="form-control source-input"
               id="thumbnail"
               name="file"
               type="text"
               value="{{ @$lesson?->file_path }}"
               oninput="
                document.querySelector('input[name=url]').value = '';
               "
               readonly
             >
           </div>
         </div>
         <div class="add_course_basic_info_imput eksternal-source {{ @$lesson?->storage == 'upload' ? 'd-none' : "" }}">
           <label for="#">Path</label>
           <input
             class="form-control"
             name="url"
             type="url"
             oninput="
             document.querySelector('input[name=file]').value = '';
             "
             value="{{ @$lesson?->file_path }}"
           >
         </div>

       </div>
       <div class="col-6">
         <div class="add_course_basic_info_imput mb-3">
           <label for="">File types</label>
           <select
             class="form-control select_js storage"
             name="file_type"
             required
           >
             <option value=""> Please Select </option>
             @foreach (config('course.file_types') as $key => $value)
               <option value="{{ $key }}" @selected(@$lesson?->file_type == $key)>{{ $value }}
               </option>
             @endforeach
           </select>
         </div>
       </div>

       <div class="col-6 add_course_basic_info">
         <div class="form-group mb-3">
           <label for="">Duration</label>
           <input
             class="form-control"
             name="duration"
             name="duration"
             type="text"
             value="{{ @$lesson?->duration }}"
             required
           >
         </div>
       </div>

       <div class="col-6">
         <div class="add_course_more_info_checkbox">
           <div class="form-check" style="width: 100px">
             <input
               class="form-check-input"
               id="preview"
               name="preview"
               type="checkbox"
               value="1"
               @checked(@$lesson?->is_preview == 1)
             >
             <label class="form-check-label" for="preview">Is Preview</label>
           </div>
         </div>
       </div>
       <div class="col-6">
         <div class="add_course_more_info_checkbox">
           <div class="form-check" style="width: 130px">
             <input
               class="form-check-input"
               id="downloadable"
               name="downloadable"
               type="checkbox"
               value="1"
               @checked(@$lesson?->downloadable == 1)
             >
             <label class="form-check-label" for="downloadable">Downloadable</label>
           </div>
         </div>
       </div>

       <div class="col-12 add_course_basic_info">
         <div class="form-group mb-3">
           <label for="">Description</label>
           <textarea
             class="form-control"
             name="description"
             required
             rows="4"
           >{{ @$lesson?->description }}</textarea>
         </div>
       </div>
     </div>
   </div>
   <div class="modal-footer">
     <button class="btn btn-primary ms-auto" type="submit">Save</button>
   </div>
 </form>

 <script>
   $('#lfm').filemanager('file');
 </script>
