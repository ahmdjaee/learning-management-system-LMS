 <form
   class="modal-content"
   action="{{  @$editMode == true 
   ? route('instructor.course-content.update-chapter', @$chapter?->id)
   : route('instructor.course-content.store-chapter', $id) }}"
   method="post"
 >
   @csrf
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Chapter</h5>
     <button
       class="btn-close"
       data-bs-dismiss="modal"
       type="button"
       aria-label="Close"
     ></button>
   </div>
   <div class="modal-body">
     <div class="form-group">
       <label for="">Title</label>
       <input
         class="form-control"
         name="title"
         type="text"
         required
         value="{{ @$chapter?->title }}"
       >
     </div>
   </div>
   <div class="modal-footer">
     <button class="btn btn-primary ms-auto" type="submit">Save</button>
   </div>
 </form>
