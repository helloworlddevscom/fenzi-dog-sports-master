if(window.jQuery){

	jQuery(document).ready(function(){

		function loadNewCourses(){
			jQuery('#fenzi_courses_items_container').hide();
			jQuery('#fenzi_courses_loading_container').show();
			setTimeout(()=>{
				jQuery('#fenzi_courses_items_container').show();
				jQuery('#fenzi_courses_loading_container').hide();
			}, 2000)
		}

		jQuery('.wp-block-hwd-fenzi-course-filter-term').click(function(){
			loadNewCourses();
		});

		jQuery('#fenzi_course_filter_category').change(function(){
			loadNewCourses();
		});

		jQuery('#fenzi_course_filter_instructor').change(function(){
			loadNewCourses();
		});

	});
}
