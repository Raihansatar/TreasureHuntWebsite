
// Paper Bootstrap Wizard Functions
searchVisible = 0;
transparent = true;

function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById('cash1');
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        $($wizard).find('.btn-sched').hide();
        $($wizard).find('.btn-next').hide()
        $($wizard).find('.btn-finish').hide();
        $($wizard).find('.btn-paynow').hide()
        $($wizard).find('.btn-form').show();
    } else {
        $($wizard).find('.btn-sched').hide();
        $($wizard).find('.btn-next').hide()
        $($wizard).find('.btn-finish').hide();
        $($wizard).find('.btn-paynow').hide()
        $($wizard).find('.btn-form').hide();
    }
  } 

        $(document).ready(function(){

            /*  Activate the tooltips      */
            $('[rel="tooltip"]').tooltip();

            // Code for the Validator
            var $validator = $('.wizard-card form').validate({
        		  rules: {
        		    firstname: {
        		      required: true,
        		      minlength: 3
        		    },
        		    lastname: {
        		      required: true,
        		      minlength: 3
        		    },
        		    email: {
        		      required: true
        		    }
                },
        	});

            // Wizard Initialization
          	$('.wizard-card').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next,.btn-sched',
                'previousSelector': '.btn-previous',

                onNext: function(tab, navigation, index) {
                	var $valid = $('.wizard-card form').valid();
                	if(!$valid) {
                		$validator.focusInvalid();
                		return false;
                	}
                },

                onInit : function(tab, navigation, index){

                  //check number of tabs and fill the entire row
                  var $total = navigation.find('li').length;
                  $width = 100/$total;

                  navigation.find('li').css('width',$width + '%');

                },

                onTabClick : function(tab, navigation, index){

                    var $valid = $('.wizard-card form').valid();

                    if(!$valid){
                        return false;
                    } else{
                        return true;
                    }

                },



                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;
                    var $wizard = navigation.closest('.wizard-card');

                    // If it's the last tab then hide the last button and show the finish instead
                    if($current >= $total) {
                        $($wizard).find('.btn-sched').hide();
                        $($wizard).find('.btn-next').hide();
                        // $($wizard).find('.btn-finish').show();
                        $($wizard).find('.btn-paynow').hide();
                        $($wizard).find('.btn-form').hide();    
                        $($wizard).find('.btn-previous').show();
                        $($wizard).find('.btn-backpage').hide();
                    }
                    else if($current == 1 ){
                        $($wizard).find('.btn-sched').hide();
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                        $($wizard).find('.btn-paynow').hide();
                        $($wizard).find('.btn-form').hide();
                        $($wizard).find('.btn-backpage').show();
                        // $($wizard).find('.btn-previous').show();
                    }
                    else if($current == 2 ){
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').hide();
                        $($wizard).find('.btn-backpage').hide();
                        $($wizard).find('.btn-previous').show();
                    }
                    else if($current == 3){
                        $($wizard).find('.btn-sched').hide();
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').hide();
                        $($wizard).find('.btn-paynow').hide();
                        $($wizard).find('.btn-form').hide();
                    }   
                    
                    else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }

                    //update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;

                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    //e.relatedTarget // previous tab

                    $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');

                }
	        });


                // Prepare the preview for profile picture
                $("#wizard-picture").change(function(){
                    readURL(this);
                });

                $('[data-toggle="wizard-radio"]').click(function(){
                    wizard = $(this).closest('.wizard-card');
                    wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                    $(this).addClass('active');
                    $(wizard).find('[type="radio"]').removeAttr('checked');
                    $(this).find('[type="radio"]').attr('checked','true');
                });

                $('[data-toggle="wizard-checkbox"]').click(function(){
                    if( $(this).hasClass('active')){
                        $(this).removeClass('active');
                        $(this).find('[type="checkbox"]').removeAttr('checked');
                    } else {
                        $(this).addClass('active');
                        $(this).find('[type="checkbox"]').attr('checked','true');
                    }
                });

                $('.set-full-height').css('height', 'auto');

            });



         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        function debounce(func, wait, immediate) {
        	var timeout;
        	return function() {
        		var context = this, args = arguments;
        		clearTimeout(timeout);
        		timeout = setTimeout(function() {
        			timeout = null;
        			if (!immediate) func.apply(context, args);
        		}, wait);
        		if (immediate && !timeout) func.apply(context, args);
        	};
        };


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-46172202-1', 'auto');
ga('send', 'pageview');
