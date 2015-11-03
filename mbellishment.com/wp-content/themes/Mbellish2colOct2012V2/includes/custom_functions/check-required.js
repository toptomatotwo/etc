    jQuery(document).ready(function(){
       jQuery("#extra").css("display","none");
        if (jQuery("#checkme").is(":checked")) { jQuery("#extra").show("slow"); }
       jQuery("#checkme").click(function(){ if (jQuery("#checkme").is(":checked")) { jQuery("#extra").show("slow"); } else { jQuery("#extra").hide("slow"); }
      });
    });