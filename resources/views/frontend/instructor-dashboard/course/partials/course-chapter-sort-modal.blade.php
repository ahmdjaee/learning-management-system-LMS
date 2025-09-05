 <form
   class="modal-content"
   action=""
   method="post"
 >
   @csrf
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Sort Chapter</h5>
     <button
       class="btn-close"
       data-bs-dismiss="modal"
       type="button"
       aria-label="Close"
     ></button>
   </div>
   <div class="modal-body">
     <div class="accordion-body">
       <ul class="item_list chapter-sortable-list">
         @foreach ($chapters as $chapter)
           <li data-course-id="{{ $id }}" data-chapter-id="{{ $chapter->id }}">
             <span>{{ $chapter->title }}</span>
             <div class="add_course_content_action_btn ">
               <a
                 class="arrow dragger mt-2"
                 href="javascript:;"
                 style="cursor: grab;"
               >
                 <i class="fas fa-arrows-alt"></i>
               </a>
             </div>
           </li>
         @endforeach
       </ul>
     </div>
   </div>
 </form>

 <script>
   const baseUrl = $("meta[name=base_url]").attr("content");
   const csrfToken = $("meta[name=csrf_token]").attr("content");

   $('.btn-close').on('click', function() {
     window.location.reload();
   });

   if ($(".chapter-sortable-list").length) {
     $(".chapter-sortable-list").sortable({
       item: "li",
    //    containment: "parent",
       cursor: "grab",
       handle: ".dragger",
       update: function(event, ui) {
         let orderIds = $(this).sortable("toArray", {
           attribute: "data-chapter-id",
         });

         let courseId = ui.item.data("course-id");

         $.ajax({
           url: baseUrl +
             `/instructor/course-content/${courseId}/sort-chapter`,
           method: "POST",
           data: {
             _token: csrfToken,
             order_ids: orderIds,
           },
           beforeSend: function() {},
           success: function(res) {
             notyf.success(res.message);
           },
           error: function(xhr) {
             const message = xhr.responseJSON.message;
             notyf.error(message);
           },
         });
       },
     });
   }
 </script>
